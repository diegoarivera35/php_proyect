<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            flex-direction: column;
        }
    </style>
</head>
<body>
    



<?php
    include("inc/connect.php");
    include("inc/nav.php");
    $query = 'SELECT products.productCode, products.productDescription, products.productName, products.buyPrice, products.quantityInStock, products.imageURL, orderdetails.quantityOrdered, orderdetails.priceEach, orderdetails.orderNumber
    FROM products, orderdetails
    WHERE products.productCode = orderdetails.productCode;
    ';
    $products = mysqli_query($connect, $query);



?>

<h1 class="display-5 mt-4 mb-4">Products Catalog</h1>
<div class="container">
<div class="row">
<div class="col-md-12 d-flex flex-wrap justify-content-between">


<?php



foreach($products as $product) {

    if($product['buyPrice'] < '50') {
        $bgClass = 'bg-danger';
        $available = 'few units left';
    } else {
        $bgClass = 'bg-success';
        $available = 'good availability';
    }


    echo '
    <div class="card mb-5 '. $bgClass .'" style="width: 18rem;">
    <h4>'. $available .'</h4>
        <img src="' . $product['imageURL'] . '" class="card-img-top" alt="'. $product['productName'] .'"/>
        <div class="card-body">
            <h5 class="card-title">'.$product['productName'] .'</h5>
            <p class="card-text">' . $product['productDescription'] . '</p>
            <p class="card-text">' . $product['quantityOrdered'] . '</p>
            <p class="card-text">' . $product['priceEach'] . '</p>
            <p class="card-text">' . $product['orderNumber'] . '</p>
            <a href="' . $product['productName'] . '" class="btn btn-primary">Click me</a>
        </div>
        <div class="card-footer"></div>
    </div>';
}

?>


</div>
    </div>
    </div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>

