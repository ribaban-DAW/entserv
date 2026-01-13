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

    function convert_to_celsius($temperature) {
        // https://es.farnell.com/convertidor-temperatura
        return ($temperature - 32) * 5 / 9;
    }

    header("Content-Type:application/json");

    $temperature = $_GET["temperature"] ?? null;
    if (is_null($temperature)) {
        return send_response(400, "rarete");
    }

    $res = [
        "celsius" => convert_to_celsius(floatval($temperature)),
    ];
    
    send_ok($res);
?>
