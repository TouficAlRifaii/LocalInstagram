<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Header: X-Requested-With");

session_start();
echo json_encode($_SESSION);
echo true;