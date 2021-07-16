<?php
/*
A DB setup script to create contact table.

Example usage:
setup.php?action=test_db
setup.php?action=init_data
setup.php?action=create_data&count=1000

 */

// Define DB connection using env file
require_once '../../env.php';

// Main Script - process request
process_request();

// Script Functions
function process_request() {
    $action = $_GET['action'] ?? 'list_data';
    switch ($action) {
        case 'init_table':
            init_table();
            break;
        case 'create_data':
            create_data();
            break;
        default:
            test_db();
    }    
}

function connect_db() {
    return new PDO(DB_DSN, DB_USER, DB_PASSWORD);
}

function print_json($payload) {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    echo json_encode($payload);
}

function print_error($error) {
    print_json(['error' => $error]);
}

function test_db() {
    try {
        $sql = 'SELECT VERSION() AS mysql_version';
        $db = connect_db();
        $stmt = $db->query($sql);
        print_json($stmt->fetch(PDO::FETCH_ASSOC));
    } catch (PDOException $e) {
        print_error($e);
    }
}

function init_table() {
    try {
        $db = connect_db();
        $db->exec('DROP TABLE IF EXISTS contacts');
        $db->exec('
        CREATE TABLE contacts (
            id INT  NOT NULL AUTO_INCREMENT PRIMARY KEY,
            create_ts TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(200) NOT NULL,
            subject VARCHAR(500) NOT NULL,
            message TEXT NOT NULL
        )'
        );
        print_json(['message' => 'New table created']);
    } catch (PDOException $e) {
        print_error($e);
    }
}

function create_data() {    
    try {
        // Generate random tests data
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
