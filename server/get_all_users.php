<?php

include('connection.php');

$stmt = $conn->prepare("SELECT user_name, user_email, user_contact, user_address FROM users");

$stmt->execute();

$users = $stmt->get_result();

echo '<div class="container">
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
                    </thead>';

                    $counter = 1;
                    while($row = $users->fetch_assoc()) { 

                        echo '<tbody>
                        <tr>
                            <th scope="row">'.$counter++.'</th>

                            <td>
                                <p>'.$row['user_name'].'</p>
                            </td>

                            <td>
                                <p>'.$row['user_email'].'</p>
                            </td>

                            <td>
                                <p>'.$row['user_address'].'</p>
                            </td>

                            <td>
                                <p>';
                                        $contact = $row['user_contact'];
                                        echo "+".$contact[0]." (".substr($contact, 1, 3).") ".substr($contact, 4, 4)."-".substr($contact, 7);
                                echo '</p>
                            </td>

                        </tr>
                    </tbody>';

                    }

                echo '</table>
        </div>';