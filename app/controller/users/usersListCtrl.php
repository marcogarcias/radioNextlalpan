<?php
require_once '../../../app/model/users/UsersMd.php';

$usersMd = new UsersMd();
$a_users = $usersMd->getUsers();
?>