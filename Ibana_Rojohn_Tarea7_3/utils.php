<?php

require_once "db.php";

function send_response($status, $status_message, $data = null) {
    header("HTTP/1.1 $status $status_message");
    
    $response['status'] = $status;
    $response['status_message'] = $status_message;
    if (!is_null($data)) {
        $response['data'] = $data;
    }
    
    echo json_encode($response);
}

function send_ok($data) {
    send_response(200, "OK", $data);
}

function get_customers() {
    $conn = getDBConnection();
    $stmt = $conn->query("SELECT * FROM customers");
    
    $results =  $stmt->fetchall(PDO::FETCH_ASSOC);
    if (!$results) {
        return null;
    }
    
    return $results;
}

function get_customer($customerNumber = null) {
    if (is_null($customerNumber)) {
        return null;
    }
    
    $conn = getDBConnection();

    $select = " SELECT *";
    $from = " FROM customers";
    $where = " WHERE customerNumber = :customerNumber";

    $query = $select . $from . $where;
    $stmt = $conn->prepare($query);
    $stmt->execute([
        ":customerNumber" => $customerNumber,
    ]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        return null;
    }
    
    return $result;
}

?>
