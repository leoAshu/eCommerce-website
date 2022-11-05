<?php 

if(isset($_GET['product_id'])) {

    include('server/get_single_product.php');

} else {
    header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/css/style.css"/>
</head>
<body>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white py-3 fixed-top">
        <div class="container">

            <img class="logo" src="assets/imgs/logo.png"/>
            <h2 class="brand">Brand</h2>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="shop.html">Products</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">News</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a href="cart.php"><i class="fas fa-shopping-bag"></i></a>
                        <a href="account.php"><i class="fas fa-user"></i></a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Single Product -->
    <section class="container single-product my-5 pt-5">
        <div class="row mt-5">

            <?php while($row = $product->fetch_assoc()) { ?>
                    
                <!-- Product Image -->
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <img class="img-fluid w-100 pb-1" src="assets/imgs/<?php echo $row['product_image']; ?>" id="mainImg"/>
                    <div class="small-img-group">
                        <div class="small-img-col">
                            <img class="small-img" src="assets/imgs/<?php echo $row['product_image']; ?>" width="100%"/>
                        </div>
                        <div class="small-img-col">
                            <img class="small-img" src="assets/imgs/<?php echo $row['product_image2']; ?>" width="100%"/>
                        </div>
                        <div class="small-img-col">
                            <img class="small-img" src="assets/imgs/<?php echo $row['product_image3']; ?>" width="100%"/>
                        </div>
                        <div class="small-img-col">
                            <img class="small-img" src="assets/imgs/<?php echo $row['product_image4']; ?>" width="100%"/>
                        </div>
                    </div>
                </div>

                <!-- Product Details -->
                <div class="col-lg-6 col-12">
                    <h6>Men/Shoes</h6>
                    <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
                    <h2>$<?php echo $row['product_price']; ?></h2>

                    <form method="POST" action="cart.php">
                        <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>"/>
                        <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>"/>
                        <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>"/>
                        <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>"/>
                        <input type="number" name="product_quantity" value="1"/>
                        <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>
                    </form>

                    <h4 class="mt-5 mb-5">Product details</h4>
                    <span><?php echo $row['product_description']; ?></span>
                </div>

            <?php } ?>

        </div>
    </section>

    <!-- Related Products -->
    <section id="related-products" class="my-5 pb-5">
        <div class="contaner text-center mt-5 py-5">
            <h3>Related Products</h3>
            <hr class="mx-auto">
        </div>
        <div class="row mx-auto container-fluid">

            <?php include('server/get_related_products.php'); ?>

            <?php while($row = $related_products->fetch_assoc()) { ?>

            <div class="product text-center col-lg-3 col-md-4  col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>"/>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                <h4 class="p-price">$<?php echo $row['product_price']; ?></h4>
                <button class="buy-btn">Buy Now</button>
            </div>

            <?php } ?>

        </div>
    </section>

    <!-- Footer -->
    <footer class="mt-5 py-5">
        <div class="row container mx-auto pt-5">
            
            <div class="footer-one col-lg-4 col-md-8 col-sm-12">
                <img class="logo" src="assets/imgs/logo-dark.png"/>
                <p class="pt-3">We provide the best products for the most affordable prices.</p>
            </div>
            
            <div class="footer-one col-lg-4 col-md-8 col-sm-12">
                <h5 class="pb-2">Featured</h5>
                <ul class="text-uppercase">
                    <li><a href="#">Men</a></li>
                    <li><a href="#">Women</a></li>
                    <li><a href="#">Boys</a></li>
                    <li><a href="#">Girls</a></li>
                    <li><a href="#">New Arrivals</a></li>
                </ul>
            </div>

            <div class="footer-one col-lg-4 col-md-8 col-sm-12">
                <h5 class="pb-2">Contact Us</h5>
                <div>
                    <h6 class="text-uppercase">Address</h6>
                    <p>1265 N Capitol Ave, Berryessa, San Jose</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Phone</h6>
                    <p>669 499 6135</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Email</h6>
                    <p>info@email.com</p>
                </div>
            </div>

        </div>

        <div class="copyright mt-5">
            <div class="row container mx-auto">
                <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                    <img src="assets/imgs/payment.png"/>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-12 mb-4 text-nowrap">
                    <p>eCommerce @ 2025 All Rights Reserved</p>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>

    </footer>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
    <script>
        
        var mainImg = document.getElementById("mainImg");
        var smallImg = document.getElementsByClassName("small-img");

        for(let i=0; i<smallImg.length; i++) {
            smallImg[i].onclick = function() {
                mainImg.src = smallImg[i].src;
            }
        }


    </script>
</body>
</html>