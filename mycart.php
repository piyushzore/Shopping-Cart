<?php
    include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>

    <div class="container">
        <div class="row">

        <!-- Heading -->

            <div class="col-lg-12 text-center border rounded bg-light my-5">
                <h1>MY CART</h1>
            </div>

            <div class="col-lg-9">

                <!----- Table ------>
                <table class="table">
                    <thead class="text-center border rounded">
                        <tr>
                        <th scope="col">Serial NO.</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Item Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>

                        <!-- Remove -->
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                    <!-- PHP Code Start -->
                        <?php

                            if(isset($_SESSION['cart'])){

                                foreach ($_SESSION['cart'] as $key => $value) {

                                    // Increase Serial number
                                    $sr = $key + 1;

                                    echo "
                                        <tr>
                                            <th>$sr</th>
                                            <td>$value[Item_Name]</td>
                                            <td> $$value[Price]<input type='hidden' class='iprice' value='$value[Price]'></td>
                                            <td>
                                                <form action='manageCart.php' method='POST'>
                                                    <input class='text-center iquantity' name='Mod_Quantity' onchange='this.form.submit();' type='number' value='$value[Quantity]' min='1' max='10'>
                                                    <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                                                </form>    
                                            </td>
                                            <td class='itotal'></td>
                                            <td>
                                                <form action='manageCart.php' method='POST'>
                                                    <button name='Remove_Item' class='btn btn-sm btn-outline-danger'>REMOVE</button>
                                                    <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                                                </form>
                                            </td>
                                        </tr>
                                    ";
                                }
                            }
                        ?>

                        <!-- PHP Code End -->

                    </tbody>
                </table>
            </div>


            <!------- Total Price ------>

            <div class="col-lg-3">
                <div class="border bg-light rounded p-4">
                    <h4>Total Price: </h4>

                    <!-- Total Price Of All Item -->
                    
                    <h5 class="text-end" id="gtotal"></h5>
                    <br>

                    <!-- If Items exist then show form -->

                    <?php
                        if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){
                    ?>

                    <form action="purchase.php" method="POST">

                        <div class="form-group mb-3">
                            <label>Full Name</label>
                            <input type="text" name="Full_Name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Mobile Number</label>
                            <input type="text" name="Mobile_No" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Address</label>
                            <input type="text" name="Address" class="form-control" required>
                        </div>
                        
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Pay_Mode" value="COD" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Cash On Delivery    
                            </label>
                        </div>
                        <button class="btn btn-primary btn-block" name="purchase">Make Purchase</button>
                    </form>

                    <?php
                        }
                    ?>

                    <!-- If block end -->

                </div>
            </div>

        </div>
    </div>

    <!-------- Script ------->

    <script>
        var gt = 0;
        var iprice = document.getElementsByClassName('iprice');
        var iquantity = document.getElementsByClassName('iquantity');
        var itotal = document.getElementsByClassName('itotal');
        var gtotal = document.getElementById('gtotal');

        function subTotal(){
            gt = 0;
            for(i=0; i<iprice.length; i++){
                itotal[i].innerText = "$" + (iprice[i].value) * (iquantity[i].value);

                gt = gt + (iprice[i].value) * (iquantity[i].value);
            }

            gtotal.innerText = "$"+ gt;
        }

        subTotal();

    </script>
    
</body>
</html>