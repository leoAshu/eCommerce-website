<?php 

include('layouts/header.php'); 
include('server/get_other_users.php');

?>

    <section id="users-section" class="my-5 py-5">
        <div class="container mt-5 py-5">
            <h3>Registered Users</h3>
            <hr>
        </div>

        <?php include('server/get_all_users.php'); ?>

    </section>

    <section>
        <?php echo $contents; ?>
    </section>

<?php include('layouts/footer.php'); ?>