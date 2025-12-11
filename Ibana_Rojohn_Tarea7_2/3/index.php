<?php
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

    $op = null;
    $n1 = null;
    $n2 = null;

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $op = $_GET["op"] ?? null;
    } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data = json_decode(file_get_contents("php://input"), true);
        $op = $data["op"];
        if (is_null($op)) {
            return send_response(400, "op not defined");
        }
    } else {
        return send_response(400, "invalid method");
    }

    header("Content-Type:application/json");

    $res = 0;
    switch ($op) {
        case "ip":
            $res = $_SERVER["REMOTE_ADDR"];
            break;
        case "port":
            $res = $_SERVER["REMOTE_PORT"];
            break;
        default:
            return send_response(400, "invalid op, it must be [ip, port]");
    }

    send_ok($res);
?>
