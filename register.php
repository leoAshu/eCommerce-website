<?php

$result = 'NONE';

session_start();

include('server/connection.php');

if($_SESSION['logged_in']) {
    header('location: account.php');
    exit;
}

if(isset($_POST['register'])) {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $phone = '1'.$_POST['phone'];
    $address = $_POST['address'];

    if($password != $confirmPassword) {
        
        // Password and Confirm Password doesn't match
        header('location: register.php?error=Passwords dont match!');

    } else if(strlen($password) < 6) {
        
        // Password length is less than 6 characters
        header('location: register.php?error=Password must be atleast 6 characters!');
    
    } else {

        // insert into local db
        // Check if user email exists
        $stmt = $conn->prepare("SELECT count(*) FROM users where user_email = ?");
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $stmt->bind_result($num_rows);
        $stmt->store_result();
        $stmt->fetch();

        if($num_rows != 0) {

            header('location: register.php?error=Email already exists!');

        } else {

            $stmt1 = $conn->prepare("INSERT INTO users (user_name, user_email, user_contact, user_address, user_password) VALUES (?,?,?,?,?)");
            $stmt1->bind_param('sssss', $name, $email, $phone, $address, md5($password));
                        
            if($stmt1->execute()) {

                // Account created successfully
                $_SESSION['user_id'] = $stmt1->insert_id;
                $_SESSION['user_email'] = $email;
                $_SESSION['user_name'] = $name;
                $_SESSION['logged_in'] = true;
                header('location: account.php?success=Registration Successful!');

            } else {

                // Account not created
                header('location: register.php?error=Registration Failed!');
            }
        }

        // insert into remote db
        // $ch = curl_init();

        // curl_setopt($ch, CURLOPT_URL,"https://ashutoshojha.ml/server/register_user.php");
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS,
        //             "register=Register&name=".$name."&email=".$email."&password=".md5($password)."&confirmPassword=".md5($confirmPassword)."&phone=".$phone."&address=".$address);

        // // In real life you should use something like:
        // // curl_setopt($ch, CURLOPT_POSTFIELDS, 
        // //          http_build_query(array('postvar1' => 'value1')));

        // // Receive server response ...
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // // $server_output
        // $result = curl_exec($ch);

        // curl_close ($ch);

    }
}

include('layouts/header.php');

?>

    <!-- Registration -->
    <section class="my-5 py-5">
        
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Register:  <?php echo $result; ?></h2>
            <hr class="mx-auto">
        </div>

        <div class="mx-auto container">
            <form id="reg-form" method="POST" action="register.php">
                <p style="color: red;"><?php if(isset($_GET['error'])) { echo $_GET['error']; } ?>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="reg-name" name="name" placeholder="Name" required/>
                </div>
                
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" id="reg-email" name="email" placeholder="Email" required/>
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" id="reg-phone" name="phone" placeholder="Phone" pattern="[1-9]{1}[0-9]{9}" required/>
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" id="reg-address" name="address" placeholder="Address" required/>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="reg-password" name="password" placeholder="Password" required/>
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" id="reg-confirm-password" name="confirmPassword" placeholder="Confirm Password" required/>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn" id="reg-btn" name="register" value="Register"/>
                </div>


                <div class="form-group">
                    <a id="login-url" href="login.php" class="btn">Already have an account? Login</a>
                </div>

            </form>
        </div>

    </section>

<?php include('layouts/footer.php'); ?>