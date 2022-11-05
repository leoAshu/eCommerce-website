<?php 

session_start();

if(isset($_POST['add_to_cart'])) {

    if(isset($_SESSION['cart'])) {
        // cart has products

        $products_array_ids = array_column($_SESSION['cart'], "id");

        if(!in_array($_POST['product_id'], $products_array_ids)) {
        
            $product_array = array(
                'id' => $_POST['product_id'],
                'name' => $_POST['product_name'],
                'image' => $_POST['product_image'],
                'price' => $_POST['product_price'],
                'quantity' => $_POST['product_quantity']
            );

            $_SESSION['cart'][$_POST['product_id']] = $product_array;

        } else {
            echo '<script>alert("Product was already added to cart!")</script>';
            // echo '<script>window.location="index.php";</script>';
        }

    } else {
        // first product
        $id = $_POST['product_id'];
        $name = $_POST['product_name'];
        $image = $_POST['product_image'];
        $price = $_POST['product_price'];
        $quantity = $_POST['product_quantity'];

        $product_array = array(
            'id' => $id,
            'name' => $name,
            'image' => $image,
            'price' => $price,
            'quantity' => $quantity
        );

        $_SESSION['cart'][$id] = $product_array;
    }
    calculateTotal();
} else if(isset($_POST['remove_product'])) {
    
    $id = $_POST['product_id'];
    unset($_SESSION['cart'][$id]);

    if(count($_SESSION['cart']) == 0) {
        unset($_SESSION['cart']);
    }
    calculateTotal();

} else if(isset($_POST['update_quantity'])) {

    $id = $_POST['product_id'];
    $quantity = $_POST['product_quantity'];

    $_SESSION['cart'][$id]['quantity'] = $quantity;
    calculateTotal();
}


function calculateTotal() {
    $total = 0;
    foreach($_SESSION['cart'] as $key => $value) {
        $product = $_SESSION['cart'][$key];
        $total += ($product['quantity'] * $product['price']);
    }
    $_SESSION['total'] = $total;
}

?>

<?php include('layouts/header.php'); ?>

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

            <?php if(isset($_SESSION['cart'])) {
                foreach($_SESSION['cart'] as $key => $value) { 
            ?>

            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/imgs/<?php echo $value['image']; ?>"/>
                        <div>
                            <p><?php echo $value['name']; ?></p>
                            <small><span>$</span><?php echo $value['price']; ?></small>
                            <br>
                            <form method="POST" action="cart.php">
                                <input type="hidden" name="product_id" value="<?php echo $value['id']; ?>"/>
                                <input type="submit" name="remove_product" class="remove-btn" value="Remove"/>
                            </form>
                        </div>
                    </div>
                </td>
                <td>

                    <form method="POST" action="cart.php">
                        <input type="hidden" name="product_id" value="<?php echo $value['id']; ?>"/>
                        <input type="number" name="product_quantity" value="<?php echo $value['quantity']; ?>"/>
                        <input type="submit" class="update-btn" name="update_quantity" value="Update"/>
                    </form>

                </td>
                <td>
                    <span>$</span>
                    <span class="product-price"><?php echo $value['quantity'] * $value['price']; ?></span>
                </td>
            </tr>

            <?php 
                    } 
                }

            ?>

        </table>

        <?php if(isset($_SESSION['cart'])) { ?>

        <div class="cart-total">
            <table>
                <!-- <tr>
                    <td>Subtotal</td>
                    <td>$<?php echo $_SESSION['total']; ?></td>
                </tr> -->

                <tr>
                    <td>Total</td>
                    <td>$<?php echo $_SESSION['total']; ?></td>
                </tr>
            </table>
        </div>

        <div class="checkout-container">
            <button class="btn checkout-btn">Checkout</button>
        </div>

        <?php } ?>

    </section>


<?php include('layouts/footer.php'); ?>