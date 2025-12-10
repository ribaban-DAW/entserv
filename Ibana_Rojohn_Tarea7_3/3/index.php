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

    header("Content-Type:application/json");
    
    $op = isset($_REQUEST["op"]) ? strtolower($_REQUEST["op"]) : null;
    if (is_null($op)) {
        return send_response(400, "op not defined");
    }

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
