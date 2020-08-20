<?php require '../../init.php';?>
<?php $page_title = 'Modify User' ?>
<?php include_once '../../web-assets/tpl/app_header.php'; ?>
<?php include_once '../../web-assets/tpl/app_nav.php'; ?>
<?php
use Flights\Database\User;

$page_title = 'Flights';
include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_nav.php';



$user = new User();
$users = $user->customer_search($_POST["search"]??NULL);


?>


</div>

<div class="container mt-3">
    <h2>Customer Viewer</h2>
    <p>Type the name of the customer that you want to cancel or view</p>
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
                        <a href="view_customers.php?edit=<?php echo $user['id']; ?>"
                            class ="btn btn-info">Cancel Ticket</a>

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
