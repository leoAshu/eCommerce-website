<?php 

include('connection.php');

if(isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    
    $phone = $_POST['phone'];
    $address = $_POST['address'];


    // Check if user email exists
    $stmt = $conn->prepare("SELECT count(*) FROM users where user_email = ?");
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $stmt->bind_result($num_rows);
    $stmt->store_result();
    $stmt->fetch();

    if($num_rows != 0) {
        
        echo 'Email already exists';

    } else {
            
        $stmt1 = $conn->prepare("INSERT INTO users (user_name, user_email, user_contact, user_address, user_password) VALUES (?,?,?,?,?)");
        $stmt1->bind_param('sssss', $name, $email, $phone, $address, $password);
                    
        if($stmt1->execute()) {

            // Account created successfully
            echo 'Success';

        } else {

            // Account not created
            echo 'Failed';
        }
    }

} else {
    echo 'POST not set';
}

?>