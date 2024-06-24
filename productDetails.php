<?php
include_once "config/dbconnect.php";
if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql="SELECT * FROM product WHERE id=? ";
    $prepare=$pdo->prepare($sql);
    $prepare->execute([$id]);
    $product=$prepare-> fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div>
        <h1>PRODUCT DETAILS</h1>
        <?php if($product) {?>
            <p>ID: <?php echo $product["id"];?></p>
            <p>NAME: <?php echo $product["productName"];?></p>
            <p>DESCRIPTION: <?php echo $product["description"];?></p>
            <p>PRICE: <?php echo $product["price"];?></p>
        <?php }?> 
        <a href="products.php" class="btn btn-danger">Back</a>   
    </div>
</body>
</html>