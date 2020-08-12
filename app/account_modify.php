<?php

require __DIR__ . '/init.php';

use Flights\Database\User;

$page_title = 'Flights';
include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_nav.php';

session_start();

$mysqli = new mysqli("localhost", "root", "", "flights") OR die("Error: " .mysqli_error($mysqli));
$result = $mysqli->query("SELECT id, first_name, last_name, email_address FROM users");

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM users WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been Deleted!";
    $_SESSION['msg_type'] = "danger!";

    header("location: account_modify.php");

}
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
                foreach ($user as $users) {
                 ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['first_name'] ?></td>
                    <td><?php echo $row['last_name'] ?></td>
                    <td><?php echo $row['email_address'] ?></td>
                    <td>
                        <a href="account_modify.php?edit=<?php echo $row['id']; ?>"
                            class ="btn btn-info">Edit</a>
                            <a href="account_modify.php?delete=<?php echo $row['id']; ?>"
                                class ="btn btn-danger">Delete</a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>


    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_footer.php'; ?>
