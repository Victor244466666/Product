<?php
require "config/dbconnect.php";
$sql = "SELECT * FROM product";
$preparedstmt = $pdo->prepare($sql);
$preparedstmt->execute();
$products = $preparedstmt->fetchAll(PDO::FETCH_ASSOC);
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
    
   <div class="container">
  
  <div>
       <table class="table table-bordered">
           <tr>
               <th>id</th>
               <th>productName</th>
               <th>description</th>
               <th>price</th>
           </tr> 
           <tr>
               <td>1</td>
               <td>Ear pod</td>
               <td></td>
               <td>Male</td>
    
            </tr>
           <?php foreach($products as $poduct) { ?>
            <tr>
               <td><?php echo $product['id']?></td>
               <td><?php echo $product['productName']?></td>
               <td><?php echo $product['description']?></td>
               <td><?php echo $product['price']?></td>
               <td><a href="productDetails.php?id=<?php echo $employee["id"];?>" class="btn btn-success">View</a></td> 
           </tr>
         <?php }?>
    
       </table>
       </div>
       </div>
</body>
</html>