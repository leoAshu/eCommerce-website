<?php 
include('layouts/header.php');

$myfile = fopen("contacts.txt", "r") or die("Unable to open file!");

$data = fread($myfile,filesize("contacts.txt"));

$data_arr = explode( ';', $data );

fclose($myfile);

?>

    <!-- Contact -->
    <section id="contact" class="container my-5 py-5">
        <div class="container text-center mt-5">
            <h3>Contact Us</h3>
            <hr class="mx-auto mb-4">
            <p class="w-50 mx-auto">
               Address:  <span><?php echo $data_arr[0] ?></span>
            </p>
            <p class="w-50 mx-auto">
                Email: <span><?php echo $data_arr[1] ?></span>
            </p>
            <p class="w-50 mx-auto">
                Phone: <span><?php echo $data_arr[2] ?></span>
            </p>
        </div>
    </section>

<?php include('layouts/footer.php'); ?>