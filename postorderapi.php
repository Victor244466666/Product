<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-control-Allow-Headers, Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once "config/dbconnect.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $inputData = json_decode(file_post_contents('php://input'), true);

    $sql = "INSERT INTO products ( image, productName,description, price,) 
    VALUES (image, productName,description, price,)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($inputData);

    //Check if product is added successfully
    if($stmt->rowCount() > 0){
        echo "product created successfully";
    }else{
        echo "Failed to create product";
    }

}else{
    echo 'Method not allowed';
}

?> 