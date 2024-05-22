<?php

    session_start();

    $con = mysqli_connect("localhost", "root", "", "testing");

    if(mysqli_connect_error()){
        echo "
            <script>
                alert('cannot connect to database');
                window.location.href = 'mycart.php';
            </script>
        ";
        exit();
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $Full_Name = $_POST['Full_Name'];
        $Mobile_No = $_POST['Mobile_No'];
        $Address = $_POST['Address'];
        $Pay_Mode = $_POST['Pay_Mode'];

        if(isset($_POST['purchase'])){

            // Store th user information

            $query1 ="INSERT INTO `order_manager`(`Full_Name`, `Mobile_No`, `Address`, `Pay_Mode`) VALUES ('$Full_Name','$Mobile_No','$Address','$Pay_Mode')";

            // Store the order which is order by user

            if(mysqli_query($con, $query1)){

                $Order_Id = mysqli_insert_id($con);
                
                $query2  = "INSERT INTO `user_orders`(`order_id`, `Item_Name`, `Price`, `Quantity`) VALUES (?,?,?,?)";

               // Prepared statement for getting user order details
               
                $stmt = mysqli_prepare($con, $query2);

               if($stmt){

                    // Add the in question mark

                    mysqli_stmt_bind_param($stmt, "isii", $Order_Id, $Item_Name, $Price, $Quantity);

                    foreach ($_SESSION['cart'] as $key => $value) {
                        $Item_Name = $value['Item_Name'];
                        $Price = $value['Price'];
                        $Quantity = $value['Quantity'];

                        mysqli_stmt_execute($stmt);
                    }

                    unset($_SESSION['cart']);

                    echo "
                        <script>
                            alert('Order Placed');
                            window.location.href = 'index.php';
                        </script>
                    ";

               }else{
                    echo "
                        <script>
                            alert('SQL Query Prepare Error');
                            window.location.href = 'mycart.php';
                        </script>
                    ";  
               }

            }else{
                echo "
                    <script>
                        alert('SQL Error');
                        window.location.href = 'mycart.php';
                    </script>
                ";
            }
        }
        
    }
?>        