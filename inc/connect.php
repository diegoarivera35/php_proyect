<?php
$connect = mysqli_connect("localhost","root","root","classicmodels");
if(mysqli_connect_error()) {
        die('Connection error: '. mysqli_connect_error());
    }