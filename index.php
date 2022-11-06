<?php 

session_start();

include('layouts/header.php'); 

?>

    <!-- Home -->
    <section id="home">
        <div class="container">
            <h5>NEW ARRIVALS</h5>
            <h1><span>Best Prices</span> This Season</h1>
            <p>Eshop offers the best products for the most affordable prices</p>
            <button onclick="window.location.href='shop.php'">Shop Now</button>
        </div>
    </section>


    <!-- New -->
    <section id="new" class="w-100">
        <div class="row p-0 m-0">

            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/products/p1.jpg"/>
                <div class="details">
                    <h2>Extremely Awesome Shoes</h2>
                    <button onclick="window.location.href='shop.php'" class="text-uppercase">Shop Now</button>
                </div>
            </div>

            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/products/p2.jpg"/>
                <div class="details">
                    <h2>Cool Glasses</h2>
                    <button onclick="window.location.href='shop.php'" class="text-uppercase">Shop Now</button>
                </div>
            </div>

            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/products/p3.jpg"/>
                <div class="details">
                    <h2>50% OFF Watches</h2>
                    <button onclick="window.location.href='shop.php'" class="text-uppercase">Shop Now</button>
                </div>
            </div>

        </div>
    </section>


    <!-- Most Visited -->
    <?php

    if(isset($_COOKIE['visited_products'])) {
        $data = json_decode($_COOKIE['visited_products'], true);
        
        usort($data, function($a, $b) {
            return (-1*$a['count']) <=> (-1*$b['count']);
        });
        
        if(count($data) > 5) {
            $data = array_slice($data, 0, 5);
        }
    ?>

    <!-- Most Visited -->
    <section id="featured" class="my-5 pb-5">
        <div class="contaner text-center mt-5 py-5">
            <h3>Frequently Visited</h3>
            <hr class="mx-auto">
            <p>Here you can check out your history of visited products</p>
        </div>
        <div class="row mx-auto container-fluid">

        <?php foreach($data as $key => $value) {  ?>

            <div class="product text-center col-lg-2 col-md-3  col-sm-12 mx-auto">
                <img class="img-fluid mb-3" src="assets/imgs/products/<?php echo $value['image']; ?>"/>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?php echo $value['name']; ?></h5>
                <h4 class="p-price">$<?php echo $value['price']; ?></h4>
                <a href="<?php echo "single_product.php?product_id=".$value['id']; ?>"><button class="buy-btn">Buy Now</button></a>
            </div>

        <?php } ?>

        </div>
    </section>

    <?php } ?>

    <!-- Brand -->
    <section id="brand">
        <div class="row container mx-auto">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brands/1.png"/>
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brands/2.png"/>
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brands/3.png"/>
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brands/4.png"/>
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
                <img class="img-fluid mb-3" src="assets/imgs/products/<?php echo $row['product_image']; ?>"/>
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
            <h4>END SEASON'S SALE</h4>
            <h1>Winter Collection <br> upto 30% OFF </h1>
            <button onclick="window.location.href='shop.php'" class="text-uppercase">Shop Now</button>
        </div>
    </section>

    <!-- Clothes -->
    <section id="featured" class="my-5">
        <div class="contaner text-center mt-5 py-5">
            <h3>Hoodies & Jackets</h3>
            <hr class="mx-auto">
            <p>Here you can check out our jacket collection</p>
        </div>
        <div class="row mx-auto container-fluid">

            <?php include('server/get_clothes.php'); ?>

            <?php while($row = $clothes_products->fetch_assoc()) { ?>

            <div class="product text-center col-lg-3 col-md-4  col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/products/<?php echo $row['product_image']; ?>"/>
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

<?php include('layouts/footer.php'); ?>    