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
            <h2 class="Shoppe">Shoppe</h2>

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
                        <a style="color:#000" href="cart.php"><i class="fas fa-shopping-bag"></i></a>
                        <a style="color:#000" href="account.php"><i class="fas fa-user"></i></a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Home -->
    <section id="home">
        <div class="container">
            <h5>NEW ARRIVALS</h5>
            <h1><span>Best Prices</span> This Season</h1>
            <p>Eshop offers the best products for the most affordable prices</p>
            <button>Shop Now</button>
        </div>
    </section>


    <!-- Shoppe -->
    <section id="Shoppe" class="container">
        <div class="row">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/Shoppe1.png"/>
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/Shoppe2.png"/>
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/Shoppe3.png"/>
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/Shoppe4.png"/>
        </div>
    </section>


    <!-- New -->
    <section id="new" class="w-100">
        <div class="row p-0 m-0">

            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/p1.jpg"/>
                <div class="details">
                    <h2>Extremely Awesome Shoes</h2>
                    <button class="text-uppercase">Shop Now</button>
                </div>
            </div>

            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/p2.jpg"/>
                <div class="details">
                    <h2>Cool Glasses</h2>
                    <button class="text-uppercase">Shop Now</button>
                </div>
            </div>

            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/p3.jpg"/>
                <div class="details">
                    <h2>50% OFF Watches</h2>
                    <button class="text-uppercase">Shop Now</button>
                </div>
            </div>

        </div>
    </section>

    <!-- Featured -->
    <section id="featured" class="my-5 pb-5">
        <div class="contaner text-center mt-5 py-5">
            <h3>Featured</h3>
            <hr class="mx-auto">
            <p>Here you can check out our featured products</p>
        </div>
        <div class="row mx-auto container-fluid">

        <?php include('server/get_featured_products.php'); ?>

        <?php while($row = $featured_products->fetch_assoc()) { ?>

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
                <a href="<?php echo "single_product.php?product_id=".$row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>
            </div>

        <?php } ?>
        </div>
    </section>

    <!-- Banner -->
    <section id="banner" class="my-5 py-5">
        <div class="container">
            <h4>MID SEASON'S SALE</h4>
            <h1>Fall Collection <br> upto 30% OFF </h1>
            <button class="text-uppercase">Shop Now</button>
        </div>
    </section>

    <!-- Clothes -->
    <section id="featured" class="my-5">
        <div class="contaner text-center mt-5 py-5">
            <h3>Dresses & Clothes</h3>
            <hr class="mx-auto">
            <p>Here you can check out our apparel collection</p>
        </div>
        <div class="row mx-auto container-fluid">

            <?php include('server/get_clothes.php'); ?>

            <?php while($row = $clothes_products->fetch_assoc()) { ?>

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
                <a href="<?php echo "single_product.php?product_id=".$row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>
            </div>

            <?php } ?>
            
        </div>
    </section>

    <!-- Shoes -->

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
</body>
</html>