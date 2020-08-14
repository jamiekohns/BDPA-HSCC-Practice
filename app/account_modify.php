<?php

require __DIR__ . '/init.php';

use Flights\Database\User;

$page_title = 'Flights';
include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_nav.php';



$user = new User();
$users = $user->search($_POST["search"]);

?>


</div>

<div class="container mt-3">
    <h2>Admin Account Modifier</h2>
    <p>Type the name of the user that you want to edit/delete</p>
<form method="post">
    <input name="search" class="form-control" id="myInput" type="text" placeholder="Search..">
    <input type="submit" value="search">
</form>
    <br>
    <table id="myTable" class="table table-striped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
                <?php
                foreach ($users as $user):
                 ?>
                <tr>
                    <td><?php echo $user['id'] ?></td>
                    <td><?php echo $user['first_name'] ?></td>
                    <td><?php echo $user['last_name'] ?></td>
                    <td><?php echo $user['email_address'] ?></td>
                    <td>
                        <a href="account_modify.php?edit=<?php echo $user['id']; ?>"
                            class ="btn btn-info">Edit</a>
                            <a href="account_modify.php?delete=<?php echo $user['id']; ?>"
                                class ="btn btn-danger">Delete</a>
                            </td>

                        </tr>
                    <?php
                 endforeach;
                 ?>
                </tbody>
            </table>
        </div>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>


    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_footer.php'; ?>