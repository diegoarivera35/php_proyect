<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Motorbikes databse</title>
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

<?php
    include("inc/connect.php");
    include("inc/nav.php");
    $query = 'SELECT productCode, productDescription, productName, imageURL
    FROM products';
    $result = mysqli_query($connect, $query);

    
    if (!$result) {
        die("Query failed: " . mysqli_error($connect));
    }
?>


<div class="container">
<h1 class="display-5 mt-4 mb-4">Motorbikes Catalog</h1>
    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th scope="col">Motorbike</th>
                <th scope="col">View More</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            while ($product = mysqli_fetch_assoc($result)) {
                echo '
                <tr>
                    <td><h4 class="card-title">'.$product['productName'].'</h4></td>
                    <td> 
                        <form method="GET" action="details.php">
                            <input type="hidden" name="productCode" value="'.$product['productCode'].'">
                            <button type="submit" name="details" class="btn btn-sm btn-warning">
                            Details <i class="fa-solid fa-circle-info"></i>
                            </button>
                        </form>
                    </td>
                </tr>';
            }

            
            mysqli_free_result($result);

            
            mysqli_close($connect);
            ?>
        </tbody>
    </table>
</div>


<script src="https://kit.fontawesome.com/934566fbc5.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
