<?php
require_once('users.php');

print "<pre>";
print_r($_POST);
print "</pre>";

$m = new users();
$egn = $_POST['egn'];
$fname = $_POST['fname'];
$family = $_POST['family'];
$city = $_POST['city'];
$m->adduser($egn,$fname, $family,$city);

echo 'Added a user successfully!';

//https://unisvyat.com/product-category/womens/dress/
