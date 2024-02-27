<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Motorbikes Databse</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            flex-direction: column;
        }
    </style>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    
<div class="video-background">
  <div class="video-foreground">
    <iframe src="https://www.youtube.com/embed/HIvqw74pCFc?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&mute=1" autoplay; frameborder="0" allowfullscreen></iframe>
  </div>
</div>



<?php
    include("inc/connect.php");
    include("inc/nav.php");
    $query = 'SELECT products.productCode, products.productDescription, products.productName, products.buyPrice, products.quantityInStock, products.imageURL, orderdetails.quantityOrdered, orderdetails.priceEach, orderdetails.orderNumber
    FROM products, orderdetails
    WHERE products.productCode = orderdetails.productCode;
    ';
    $products = mysqli_query($connect, $query);



?>


<div class="container">
<h2 class="display-5 mt-4 mb-4 text-light">Motorbikes cards</h2>
<div class="row">
<div class="col-md-12 d-flex flex-wrap justify-content-between">


<?php



foreach($products as $product) {

    if($product['buyPrice'] < '50') {
        $Class = 'low';
        $available = 'few units left';
    } else {
        $Class = 'high';
        $available = 'good availability';
    }


    echo '
    <div class="card mb-5 '. $Class .'" style="width: 18rem;">
    
        <img src="' . $product['imageURL'] . '" class="card-img-top" alt="'. $product['productName'] .'"/>
        <div class="card-body">
            <h4 class="card-title">'.$product['productName'] .'</h4>
            <p class="card-text">' . $product['productDescription'] . '</p>
            <p class="card-text">Quantity ordered: ' . $product['quantityOrdered'] . '</p>
            <p class="card-text">Price each: ' . $product['priceEach'] . '</p>
            <p class="card-text">Order Number: ' . $product['orderNumber'] . '</p>
        </div>
        <div class="card-footer"><h5><i class="fa-solid fa-triangle-exclamation"></i>   '. $available .' <i class="fa-solid fa-triangle-exclamation"></i></h5></div>
    </div>';
}

?>


</div>
    </div>
    </div>





    <script src="https://kit.fontawesome.com/934566fbc5.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>

