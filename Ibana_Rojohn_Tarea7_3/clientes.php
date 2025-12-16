<?php

include_once "utils.php";

header("Content-Type:application/json");

try {
    send_ok(get_customers());
} catch (Exception $e) {
    send_response(500, "Internal Server Error", $e->getMessage());
}

?>
