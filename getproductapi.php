<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-control-Allow-Headers, Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once "config/dbconnect.php";

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(($_GET['id'])) {
        $GET = filter_var_array($_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id = $GET['id'];

        $sql= 'SELECT * FROM product WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($product) {
            echo json_encode($product);
        }else {
            echo 'product not found';
        }
    }else{
        $sql = "SELECT * FROM product";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $product= $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($product) {
            echo json_encode($product);
        }else {
            echo 'No product Found.';
        }
    }
}else{
    echo 'Method not allowed'; 
}
?>