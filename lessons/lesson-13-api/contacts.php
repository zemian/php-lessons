<?php
/*
 * API to perform CRUD operation on contacts data
 */

// NOTE: We did not add validation in this lesson here, but if you do add it, ensure you
// do not escape HTML characters on all inputs, that's because you should allow the JS
// client, such as VueJS, to escape the HTML input instead.

// Define DB connection using env file
require_once '../../env.php';

// Main Script - process request
process_request();

// Script Functions
function process_request() {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'] ?? 0;
            get_data($id);
            return;
        } else {
            // List and paginate data
            $offset = $_GET['offset'] ?? 0;
            $limit = $_GET['limit'] ?? 20;
            list_data($offset, $limit);
        }
    } else if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        $id = $_GET['id'] ?? 0;
        delete_data($id);
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $body = file_get_contents('php://input');
        $data = json_decode($body, true);
        create_data($data);
    } else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        $body = file_get_contents('php://input');
        $data = json_decode($body, true);
        update_data($data);
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

function print_error($error, $status_code = 500) {
    http_response_code($status_code);
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    print_json(['error' => $error]);
}

function list_data($offset, $limit) {
    try {
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

function get_data($id) {
    try {
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
            print_error("Record id $id not found.", 404);
    } catch (PDOException $e) {
        print_error($e);
    }
}

function delete_data($id) {
    try {
        $sql = 'DELETE FROM contacts WHERE id = ?';
        $db = connect_db();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->rowCount();
        if ($result > 0)
            print_json(['message' => "Record id $id has been deleted"]);
        else
            print_error("Record id $id not found.", 404);
    } catch (PDOException $e) {
        print_error($e);
    }
}

function update_data($data) {
    try {
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
            print_error("Record id $id not found.", 404);
    } catch (PDOException $e) {
        print_error($e);
    }
}

function create_data($data) {
    try {
        $sql = 'INSERT INTO contacts(name, email, subject, message) VALUES (?, ?, ?, ?)';
        $db = connect_db();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(1, $data['name']);
        $stmt->bindValue(2, $data['email']);
        $stmt->bindValue(3, $data['subject']);
        $stmt->bindValue(4, $data['message']);
        $result = $stmt->execute();
        if ($result) {
            $data['id'] = $db->lastInsertId();
            print_json($data);
        } else {
            print_error("Failed to insert data");
        }
    } catch (PDOException $e) {
        print_error($e);
    }
}