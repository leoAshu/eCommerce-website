<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_featured=1 LIMIT 5");

$stmt->execute();

$featured_products = $stmt->get_result();

echo '<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>';

echo '<style>
    
    h1 {
        font-family: "Poppins", sans-serif;
        font-size: 2.5rem;
        font-weight: 700;
    }
    
    h2 {
        font-family: "Poppins", sans-serif;
        font-size: 1.8rem;
        font-weight: 600;
    }
    
    h3 {
        font-family: "Poppins", sans-serif;
        font-size: 1.5rem;
        font-weight: 800;
    }
    
    h4 {
        font-family: "Poppins", sans-serif;
        font-size: 1.2rem;
        font-weight: 600;
    }
    
    h5 {
        font-family: "Poppins", sans-serif;
        font-size: 1rem;
        font-weight: 400;
    }
    
    h6 {
        font-family: "Poppins", sans-serif;
        color: #D8D8D8;
    }
    
    button {
        font-family: "Poppins", sans-serif;
        font-size: 0.8rem;
        font-weight: 900;
        outline: none;
        border: none;
        background-color: #1D1D1D;
        color: aliceblue;
        padding: 13px 30px;
        text-transform: uppercase;
        cursor: pointer;
        transition: 0.5s ease;
    }
    
    button:hover {
        font-family: "Poppins", sans-serif;
        background-color: coral;
    }

    .product {
        cursor: pointer;
        margin-bottom: 2rem;
    }

    .product img {
        transition: 0.3s all;
    }
    
    .product:hover img {
        opacity: 0.7;
    }
    
    .product .buy-btn {
        background-color: #FB774B;
        transform: translateY(50px);
        opacity: 0;
        transition: 0.3s all;
    }
    
    .product:hover .buy-btn{
        transform: translateY(0px);
        opacity: 1;
    }
    
    hr {
        width: 30px;
        height: 3px !important;
        opacity: 1 !important;
        background-color: #FB774B;
        color: #FB774B;
    }
    
    .star {
        padding: 10px 0;
    }
    
    .star i {
        font-size: 0.9rem;
        color: goldenrod;
    }
</style>';

echo '</head>';



echo '<section id="featured" class="my-5 pb-5">
        <div class="contaner text-center mt-5 py-5">
            <h3>Featured</h3>
            <hr class="mx-auto">
            <p>Check out the featured products on Shoppe</p>
        </div>
        <div class="row mx-auto container-fluid">';

        while($row = $featured_products->fetch_assoc()) {

            echo '<div class="product text-center col-lg-2 col-md-4  col-sm-12 mx-auto">
                <img class="img-fluid mb-3" src="/images/shoppe_products/'; echo $row['product_image']; echo '"/>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">';echo $row['product_name']; echo'</h5>
                <h4 class="p-price">$'; echo $row['product_price']; echo '</h4>
                <a href="'; echo "http://ashutoshojha.ml/single_product.php?product_id=".$row['product_id']; echo'"><button class="buy-btn">Buy Now</button></a>
            </div>';

        }
        
        echo '</div>
    </section>'
?>