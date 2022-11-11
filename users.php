<?php 

include('layouts/header.php'); 
include('server/get_all_users.php');

?>

    <section id="users-section" class="my-5 py-5">
        <div class="container mt-5 py-5">
            <h3>Registered Users</h3>
            <hr>
        </div>

        <div class="container">
                <table class="table table-hover users-table">
                <caption>Users registered on Shoppe</caption>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Contact</th>
                        </tr>
                    </thead>

                    <?php 
                            $counter = 1;
                            while($row = $users->fetch_assoc()) { 
                    ?>

                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $counter++; ?></th>

                            <td>
                                <p><?php echo $row['user_name'] ?></p>
                            </td>

                            <td>
                                <p><?php echo $row['user_email'] ?></p>
                            </td>

                            <td>
                                <p><?php echo $row['user_address'] ?></p>
                            </td>

                            <td>
                                <p><?php 
                                        $contact = $row['user_contact'];
                                        echo "+".$contact[0]." (".substr($contact, 1, 3).") ".substr($contact, 4, 4)."-".substr($contact, 7);
                                    ?>
                                </p>
                            </td>

                        </tr>
                    </tbody>

                    <?php } ?>

                </table>
        </div>

    </section>

<?php include('layouts/footer.php'); ?>