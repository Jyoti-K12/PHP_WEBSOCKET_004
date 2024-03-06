<?php
$host = '127.0.0.1';
$port = 80811;

$socket = socket_create(AF_INET, SOCK_STREAM, 0);

if ($socket === false) {
    echo "Failed to create socket: " . socket_strerror(socket_last_error()) . "\n";
    exit;
}


$result = socket_connect($socket, $host, $port) or die('Not Connect'); //for Client Side


$static_msg = "Hello Guys";

socket_write($socket, $static_msg, strlen($static_msg));

// Read the server's response
$response = socket_read($socket, 1024) or die("Failed to read from socket: " . socket_strerror(socket_last_error()) . "\n");
echo "Server response: $response\n";

// Close the socket
socket_close($socket);
