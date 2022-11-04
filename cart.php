<?php 



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
                        <a href="account.html"><i class="fas fa-user"></i></a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>


    <!-- Cart -->
    <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bold">Your Cart</h2>
            <hr>
        </div>

        <table class="mt-5 pt-5">

            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>

            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/imgs/f1.jpg"/>
                        <div>
                            <p>Light Gray Backpack</p>
                            <small><span>$</span>199.49</small>
                            <br>
                            <a class="remove-btn" href="#">Remove</a>
                        </div>
                    </div>
                </td>
                <td>
                    <input type="number"  value="1"/>
                    <a class="edit-btn" href="#">Edit</a>
                </td>
                <td>
                    <span>$</span>
                    <span class="product-price">199.49</span>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/imgs/f1.jpg"/>
                        <div>
                            <p>Light Gray Backpack</p>
                            <small><span>$</span>199.49</small>
                            <br>
                            <a class="remove-btn" href="#">Remove</a>
                        </div>
                    </div>
                </td>
                <td>
                    <input type="number"  value="1"/>
                    <a class="edit-btn" href="#">Edit</a>
                </td>
                <td>
                    <span>$</span>
                    <span class="product-price">199.49</span>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/imgs/f1.jpg"/>
                        <div>
                            <p>Light Gray Backpack</p>
                            <small><span>$</span>199.49</small>
                            <br>
                            <a class="remove-btn" href="#">Remove</a>
                        </div>
                    </div>
                </td>
                <td>
                    <input type="number"  value="1"/>
                    <a class="edit-btn" href="#">Edit</a>
                </td>
                <td>
                    <span>$</span>
                    <span class="product-price">199.49</span>
                </td>
            </tr>

        </table>

        <div class="cart-total">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>$199.49</td>
                </tr>

                <tr>
                    <td>Total</td>
                    <td>$698.49</td>
                </tr>
            </table>
        </div>

        <div class="checkout-container">
            <button class="btn checkout-btn">Checkout</button>
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
</body>
</html>