<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php
include("inc/nav.php");

?>

<div class="container">


    <?php
        // Retrieve the product code from the URL
        $productCode = $_GET['productCode'];
        
        include("inc/connect.php");
        
        
        
        // Query to fetch product details based on the product code
        $query = "SELECT * FROM products WHERE productCode = ?";
        $stmt = mysqli_prepare($connect, $query);
        mysqli_stmt_bind_param($stmt, "s", $productCode);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        // Display product details if found
        if (mysqli_num_rows($result) > 0) {
            $product = mysqli_fetch_assoc($result);
            ?>



<div class="card">
    <div class="card-header">
        Product Details
    </div>
    <div class="card-body">
        <h5 class="card-title"><?php echo $product['productName']; ?></h5>
        <p class="card-text"><?php echo $product['productDescription']; ?></p>
        <p class="card-text">Price: $<?php echo $product['buyPrice']; ?></p>
        <p class="card-text">Quantity in Stock: <?php echo $product['quantityInStock']; ?></p>
        <!-- Add more details as needed -->
    </div>
</div>
<?php
        } else {
            echo "Product not found.";
        }
        
        // Close database connection
        mysqli_stmt_close($stmt);
        mysqli_close($connect);
        ?>
        <br>
        <a href="index.php" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Back to Product List</a>
    </div>
</div>
    <script src="https://kit.fontawesome.com/934566fbc5.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>