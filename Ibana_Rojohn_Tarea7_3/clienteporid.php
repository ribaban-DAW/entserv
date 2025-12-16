<?php

include_once "utils.php";

header("Content-Type:application/json");

$id = isset($_GET["id"]) ? $_GET["id"] : null;

try {
    send_ok(get_customer($id));
} catch (Exception $e) {
    send_response(500, "Internal Server Error", $e->getMessage());
}

?>
