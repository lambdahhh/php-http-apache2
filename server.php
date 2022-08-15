<?php
declare(strict_types=1);

$socket = stream_socket_server('tcp://0.0.0.0:8083', $errno, $errstr);

if (!$socket) {
    die("$errstr ($errno)");
}

$env = getenv();
ksort($env);
$envs = print_r($env, true);

while($connect = stream_socket_accept($socket, -1)) {
    $request = fread($connect, 100000);

    $response = <<<TEXT
HTTP/1.1 200 OK
Content-type: text/plain; charset=UTF-8
Connection: close

HELLO, WORLD!
=====ENV=====
$envs
=============
TEXT;

    fwrite($connect, $response);
    fclose($connect);

}

fclose($socket);
