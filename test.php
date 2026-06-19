<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "filming"
);

if($conn){
    echo "Database Connected";
}else{
    echo mysqli_connect_error();
}