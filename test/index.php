<?php
require '../vendor/autoload.php';

$tinder = new \Pecee\Http\Service\Tinder('1562221677425845', 'EAAGm0PX4ZCpsBAEWbJHNtOWYHHooTO12vp0ZBpbEUUGoeN3i4T4lueOsuzRF0UZCDPqzneH0t6rYZC7PLYFZB9chuh4QIsX7GzjjQZCz7tEcVWnOq833wPqScPHLLMR7vxDXOjGjFhMZBJguH89lUpL4PqbbtYwtEyBZBoaiMgjdxQZDZD');

var_dump($tinder->getUser());

?>
