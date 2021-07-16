<?php
/*
A DB contacts script to create DB table and add sample data for contact form.
A simple REST API that manage "contact" CRUD data record

Example usage:
http://localhost/learn-php/data-api/contacts.php
http://localhost/learn-php/data-api/contacts.php?offset=20
http://localhost/learn-php/data-api/contacts.php?action=get_data&id=1
http://localhost/learn-php/data-api/contacts.php?action=delete_data&id=1
curl \
  -d '{"id":"1", "name":"tester","email":"tester@localhost.com","subject": "Update test","message":"Just a test."}' \
  -H 'Content-Type: application/json' \
  http://localhost/learn-php/data-api/contacts.php?action=update_data

 */

// Define DB connection using env file
require_once '../../env.php';

// Main Script - process request
process_request();

// Script Functions
function process_request() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        create_data();
    } else if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        delete_data();
    } else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        update_data();
    } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        list_data();
    } else {
        print_error('Unknown request method ' . $_SERVER['REQUEST_METHOD']);
    }
}

function connect_db() {
    return new PDO(DB_DSN, DB_USER, DB_PASSWORD);
}

function print_json($payload) {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    echo json_encode($payload, JSON_PRETTY_PRINT);
}

function print_error($error) {
    print_json(['error' => $error]);
}

function list_data() {
    try {
        // List and paginate data
        $offset = $_GET['offset'] ?? 0;
        $limit = $_GET['limit'] ?? 20;
        // We will not get message field for listing
        $sql = 'SELECT id, create_ts, name, email, subject FROM contacts ORDER BY create_ts LIMIT ?, ?';
        $db = connect_db();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(1, $offset, PDO::PARAM_INT);
        $stmt->bindValue(2, $limit + 1, PDO::PARAM_INT); // We want one extra so we can determine 'has_more' flag.
        $stmt->execute();
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $has_more = false;
        if (count($items) > $limit) {
            $has_more = true;
            array_pop($items);
        }

        $stmt = $db->query('SELECT COUNT(*) FROM contacts');
        $stmt->execute();
        $total_items = $stmt->fetchColumn();

        $result = [
            'items' => $items,
            'total_items' => intval($total_items),
            'offset' => intval($offset),
            'limit' => intval($limit),
            'has_more' => $has_more
        ];
        print_json($result);
    } catch (PDOException $e) {
        print_error($e);
    }
}

function delete_data() {
    try {
        $id = $_GET['id'] ?? 0;
        $sql = 'DELETE FROM contacts WHERE id = ?';
        $db = connect_db();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->rowCount();
        if ($result > 0)
            print_json(['message' => "Record id $id has been deleted"]);
        else
            print_error("Record id $id not found.");
    } catch (PDOException $e) {
        print_error($e);
    }
}

function get_data() {
    try {
        $id = $_GET['id'] ?? 0;
        // Get all fields, including message
        $sql = 'SELECT * FROM contacts WHERE id = ?';
        $db = connect_db();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0)
            print_json($result[0]);
        else
            print_error("Record id $id not found.");
    } catch (PDOException $e) {
        print_error($e);
    }
}

function update_data() {
    try {
        $body = file_get_contents('php://input');
        $data = json_decode($body, true); // true = parse into array instead of object
        $id = $data['id'];
        $sql = 'UPDATE contacts SET name = ?, email = ?, message = ? WHERE id = ?';
        $db = connect_db();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(1, $data['name']);
        $stmt->bindValue(2, $data['email']);
        $stmt->bindValue(2, $data['subject']);
        $stmt->bindValue(3, $data['message']);
        $stmt->bindValue(4, $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->rowCount();
        if ($result > 0)
            print_json(['message' => "Record id $id has been updated"]);
        else
            print_error("Record id $id not found.");
    } catch (PDOException $e) {
        print_error($e);
    }
}

function create_data() {
    try {
        $count = $_GET['count'] ?? 10;
        $request_id = $_GET['request_id'] ?? time();
        $name = $_GET['name'] ?? 'tester';
        $email = $_GET['email'] ?? '@localhost.com';
        $subject = $_GET['subject'] ?? 'Test#' . $request_id;
        $message = $_GET['message'] ?? 'Just a test.';

        $sql = 'INSERT INTO contacts(name, email, subject, message) VALUES (?, ?, ?, ?)';
        $db = connect_db();
        $stmt = $db->prepare($sql);
        for ($i = 0; $i < $count; $i++) {
            $stmt->bindValue(1, $name . $i);
            $stmt->bindValue(2, $name . $i . $email);
            $stmt->bindValue(3, $subject);
            $stmt->bindValue(4, $message);
            $success = $stmt->execute();
            if (!$success)
                throw new PDOException("Failed to execute SQL: $sql");
        }
        $result = ['request_id' => $request_id,
            'count' => $count,
            'name' => $name,
            'message' => $message
        ];
        print_json($result);
    } catch (PDOException $e) {
        print_error($e);
    }
}