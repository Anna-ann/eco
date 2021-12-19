<?php
require "libs/rb-mysql.php";
R::setup( 'mysql:host=localhost;dbname=ecomachine',
    'root', 'root' );

session_start();
?>
