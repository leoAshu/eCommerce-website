<?php 

session_start();

include('server/get_all_products.php'); 

include('layouts/header.php');

?>

    <!-- Products List -->
    <section id="featured" class="my-5 py-5">
        <div class="container mt-5 py-5">
            <h3>Our Products</h3>
            <hr>
            <p>Here you can check out our products</p>
        </div>
        <div class="row mx-auto container">

        <?php while($row = $products->fetch_assoc()) { ?>
            
            <div onclick="window.location.href='<?php echo "single_product.php?product_id=".$row['product_id']; ?>';" class="product text-center col-lg-3 col-md-4  col-sm-12">
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
            
            <!-- Pagination -->
            <nav aria-label="Page navigation">
               <ul class="pagination mt-5">

                    <li class="page-item <?php if($page_no <= 1) { echo 'disabled'; } ?>">
                        <a class="page-link" href="<?php if($page_no <= 1) { echo '#'; } else { echo "?page_no=".($page_no-1); } ?>">Prev</a>
                    </li>
                    
                    <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
                    <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>

                    <?php if($page_no >= 3) { ?>
                        <li class="page-item"><a class="page-link" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="<?php echo "?page_no=".($page_no+1); ?>"><?php echo $page_no; ?></a></li>
                    <?php } ?>

                    <li class="page-item <?php if($page_no >= $total_pages) { echo 'disabled'; } ?>">
                        <a class="page-link" href="<?php if($page_no >= $total_pages) { echo '#'; } else { echo "?page_no=".($page_no+1); } ?>">Next</a>
                    </li>
               </ul>
            </nav>

        </div>

    </section>

<?php include('layouts/footer.php'); ?>