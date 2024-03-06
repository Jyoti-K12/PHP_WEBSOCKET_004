<?php
$host = '127.0.0.1';
$port = 80811;

$socket = socket_create(AF_INET, SOCK_STREAM, 0);

if ($socket === false) {
    echo "Failed to create socket: " . socket_strerror(socket_last_error()) . "\n";
    exit;
}

// Connect to the server
$result = socket_bind($socket, $host, $port) or die('Not Bind');  //for Server Side
socket_listen($socket, 5) or die("Failed to listen on socket: " . socket_strerror(socket_last_error()) . "\n");

// Accept incoming connections and handle them
while (true) {
    $clientSocket = socket_accept($socket) or die('Failed to accept incoming connection');

    echo $data = socket_read($clientSocket, 1024);

    //socket_write($clientSocket, "Received: $data", strlen("Received: $data"));

    socket_close($clientSocket);
}
socket_close($socket);











/************* 
    Meaning Socket Create params:
    ------------------------------
    - AF_INET: This specifies the address family (IPv4).

    - SOCK_STREAM: This specifies the type of communication (in this case, a stream-oriented connection, typically TCP).

    - 0: This parameter specifies the protocol. When set to 0, it typically lets the system choose the appropriate protocol for the given address family and socket type.

 */
/*
Socket Error:
------------------
- socket_last_error() retrieves the last error occurred on the socket.

- socket_strerror() converts the error code returned by socket_last_error() into a human-readable error message.

These functions are used in conjunction with various socket functions, such as socket_create(), socket_connect(), socket_write(), socket_read(), etc., to handle errors that may occur during socket operations.
*/


/*
- socket_bind() is used on the server side to bind a socket to a local address and port.

- socket_connect() is used on the client side to establish a connection to a remote server.
 
*/
