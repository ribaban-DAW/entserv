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
    
    $op = isset($_GET["op"]) ? strtolower($_GET["op"]) : null;
    if (is_null($op)) {
        return send_response(400, "op not defined");
    }

    $n1 = isset($_GET["n1"]) ? $_GET["n1"] : null;
    if (is_null($n1)) {
        return send_response(400, "n1 not defined");
    }

    $n2 = isset($_GET["n2"]) ? $_GET["n2"] : null;
    if (is_null($n2)) {
        return send_response(400, "n2 not defined");
    }

    if (!is_numeric($n1) || !is_numeric($n2)) {
        return send_response(400, "n must be a number");
    }

    $res = 0;
    switch ($op) {
        case "sum":
            $res = $n1 + $n2;
            break;
        case "dif":
            $res = $n1 - $n2;
            break;
        case "mul":
            $res = $n1 * $n2;
            break;
        case "div":
            if ($n2 == "0") {
                return send_response(400, "can't divide by 0");
            }
            $res = $n1 / $n2;   
            break;
        default:
            return send_response(400, "invalid op, it must be [sum, dif, mul, div]");
    }

    send_ok($res);
?>
