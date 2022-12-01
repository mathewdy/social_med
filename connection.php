<?php

$conn = new mysqli("localhost", "root", "", "chat_system");

if($conn == FALSE){
    echo "not connected";
}else{
    echo $conn->error;
}

?>