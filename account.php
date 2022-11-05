<?php

if(!isset($_SESSION['logged_in'])) {
    header('location: login.php');
    exit;
}

if(isset($_GET['logout'])) {
    if(isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        header('location: login.php');
        exit;
    }
}

?>

<?php include('layouts/header.php'); ?>

    <!-- Account -->
    <section class="my-5 py-5">
        <div class="row container mx-auto">
            
            <div class="text-center mt-3 pt-5 col-lg-6 col-12">
                <h3 class="font-weight-bold">Account Info</h3>
                <hr class="mx-auto">

                <div class="account-info">
                    <p>Name: <span style="color:#FB774B"><?php if(isset($_SESSION['user_name'])) { echo $_SESSION['user_name']; } ?></span></p>
                    <p>Email: <span style="color:#FB774B"><?php if(isset($_SESSION['user_email'])) { echo $_SESSION['user_email']; } ?></span></p>
                    <p><a href="#orders" id="order-btn">My Orders</a></p>
                    <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
                </div>
            </div>

            <div class="col-lg-6 col-12">
                <form id="account-form">
                    
                    <h3>Change password</h3>
                    <hr class="mx-auto">
                    
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="account-password" name="password" placeholder="New Password" required/>
                    </div>
                    
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" id="account-password-confirm" name="confirmPassword" placeholder="Re-enter Password" required/>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Update" class="btn" id="change-password-btn"/>
                    </div>

                </form>
            </div>

        </div>
    </section>

    <!-- Orders -->
    <section id="orders" class="orders container my-5 py-2">
        <div class="container mt-2">
            <h2 class="font-weight-bold text-center">My Orders</h2>
            <hr class="mx-auto">
        </div>

        <table class="mt-5 pt-5">

            <tr>
                <th>Product</th>
                <th>Date</th>
            </tr>

            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/imgs/f1.jpg"/>
                        <div>
                            <p class="mt-3">Product Name</p>
                        </div>
                    </div>
                </td>

                <td>
                    <span>11-02-2022</span>
                </td>
            </tr>

        </table>

        </div>

    </section>

<?php include('layouts/footer.php'); ?>