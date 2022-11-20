<?php

session_start();
session_destroy();
$_SESSION = array();
echo json_encode($_SESSION);