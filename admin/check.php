<?php

require_once '../config/class.database.php';

$db = new Database();

if (!$db->isLoggedIn())
{
    header('Location: index.php');
}
