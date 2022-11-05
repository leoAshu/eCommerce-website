<?php 

include('layouts/header.php');

if(isset($_GET['product_id'])) {

    include('server/get_single_product.php');

    $row = $product->fetch_assoc();

    if(isset($_COOKIE['visited_products'])) {
        
        $data = json_decode($_COOKIE['visited_products'], true);
        
        if (array_key_exists($_GET['product_id'], $data)) {
            
            $data[$_GET['product_id']]['count'] += 1;
            setcookie('visited_products', json_encode($data), time()+3600);

        } else {
            $p = [
                'id' => $_GET['product_id'],
                'name' => $row['product_name'],
                'image' => $row['product_image'],
                'price' => $row['product_price'],
                'count' => 1
            ];
            $data[$_GET['product_id']] = $p;

            setcookie('visited_products', json_encode($data), time()+3600);
        }
    } else {
        $p = [
            'id' => $_GET['product_id'],
            'name' => $row['product_name'],
            'image' => $row['product_image'],
            'price' => $row['product_price'],
            'count' => 1
        ];

        $data = [
            $_GET['product_id'] => $p
        ];

        setcookie('visited_products', json_encode($data), time()+3600);
    }

} else {
    header('location: index.php');
}

?>

    <!-- Single Product -->
    <section class="container single-product my-5 pt-5">
        <div class="row mt-5">
                    
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
    
    <script>
        
        var mainImg = document.getElementById("mainImg");
        var smallImg = document.getElementsByClassName("small-img");

        for(let i=0; i<smallImg.length; i++) {
            smallImg[i].onclick = function() {
                mainImg.src = smallImg[i].src;
            }
        }


    </script>

<?php include('layouts/footer.php'); ?>