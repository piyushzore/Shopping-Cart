<?php
    include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3">
                <form action="manageCart.php" method="POST">
                    <div class="card">
                        <img src="img/product-4.jpg" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Shirt</h5>
                            <p class="card-text">$250 </p>
                            <button type="submit" name="Add_To_Cart" class="btn btn-primary">Add To Cart</button>
                            <input type="hidden" name="Item_Name" value="Shirt">
                            <input type="hidden" name="Price" value="250">
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-3">
                <form action="manageCart.php" method="POST">
                    <div class="card">
                        <img src="img/product-5.jpg" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Shirt-2</h5>
                            <p class="card-text">$290 </p>
                            <button type="submit" name="Add_To_Cart" class="btn btn-primary">Add To Cart</button>
                            <input type="hidden" name="Item_Name" value="Shirt-2">
                            <input type="hidden" name="Price" value="250">
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-3">
                <form action="manageCart.php" method="POST">
                    <div class="card">
                        <img src="img/product-8.jpg" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Shirt-3</h5>
                            <p class="card-text">$150 </p>
                            <button type="submit" name="Add_To_Cart" class="btn btn-primary">Add To Cart</button>
                            <input type="hidden" name="Item_Name" value="Shirt-3">
                            <input type="hidden" name="Price" value="250">
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-3">
                <form action="manageCart.php" method="POST">
                    <div class="card">
                        <img src="img/product-9.jpg" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Shirt-4</h5>
                            <p class="card-text">$350 </p>
                            <button type="submit" name="Add_To_Cart" class="btn btn-primary">Add To Cart</button>
                            <input type="hidden" name="Item_Name" value="Shirt-4">
                            <input type="hidden" name="Price" value="250">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>