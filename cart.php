<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
    body{
        background-color: #D3D3D3;
    }
    .container{
        background-color: #fff;
    }
</style>
<body>
    <div class="container rounded mt-5"><br>
        <h2 class="">Shoping Cart</h2> <h6 class="text-right text-muted">Price</h6>
        <hr>
        <?php 
        include_once 'forms/connection.php';
					$order_id = $_SESSION['order_id'];
					$sql = "select * from order_items where order_id ='$order_id'";
					$res = mysqli_query($con,$sql);
					$gtotal =0;
					if(mysqli_num_rows($res)>0)
					{
					while( $row  = mysqli_fetch_assoc($res))
						{
						$product_id = $row['product_id'];
					$p_sql = "select * from product where id ='$product_id'";
					$product_res = mysqli_query($con,$p_sql);
					$product =	mysqli_fetch_assoc($product_res);
					$gtotal = $gtotal+ $row['product_amount'];
					?>
        <div class="row">
            <div class="col-md-3">
               <img src="../Yummy/assets/img/chefs/chefs-1.jpg" height="150px" width="150px" class="rounded ml-3 text-center">
            </div>
            <div class="col-md-9">
               <h5 class="text-justify m-3"><?php echo $row['menu_name']; ?></h5>
               <p class="ml-3">hkjhkjhbk</p>
               <p class="ml-3">
                    <small><s>jhgghkk</s></small>
                    <span class="badge badge-danger ">50% off</span><br>
                    <span>gj</span>
                </p>
                <p class="text-center text-muted">
                    <a href="#" class="badge badge-light">Delete</a>
                    <a href="#" class="badge badge-light">Save Later</a>
                </p>
            </div>
        </div>
        <?php }
                    }
                    ?>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <p class="text-right">
                    Subtotal(0): $<span class="font-weight-bold">3,897.00</span>
                </p>
            </div>
        </div>
    </div>
</body>
</html>