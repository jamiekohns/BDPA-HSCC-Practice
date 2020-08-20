<?php
require '../../init.php';
?>
<?php
$page_title = 'Cancel Ticket'?>
<?php
include_once $_ENV['BASE_DIRECTORY'] . '/web-assets/tpl/app_header.php';
?>
<?php
include_once $_ENV['BASE_DIRECTORY'] . '/web-assets/tpl/app_nav.php';
?>
<?php

use Flights\Database\Tickets;
if(!isset($_GET['submit'])){
    header('location: ' . $_ENV['BASE_URL'] . '/dashboard/airline_attendant/view_customers.php');
} else {
    $user_id = $_GET['submit'];
}

if(isset($_POST['submit'])){
    //die(var_dump($_POST['submit']));
    $ticket = new Tickets();
    $ticket->cancel_tickets($_POST['submit']);
}
$ticket = new Tickets();

$tickets = $ticket->display_tickets($user_id);



?>

<?php
for($i = 0; $i<count($tickets); $i++):
?>
<div class="card mb-4">
    <div class="card-body pt-3">
        <span class="badge badge-$status_color font-weight-normal h6 mb-3"><?= $tickets[$i]['seat_assignment']?></span>
        <span class="text-muted float-right"></span>
        <ul class="list-inline mb-0">
            <li class="h6 list-inline-item font-weight-normal"><?= $tickets[$i]['flight_id']?></li>
            <li class="h6 list-inline-item float-right font-weight-normal"><?= $tickets[$i]['status_id']?></li>
        </ul>
        <ul class="list-inline mb-0">
            <li class="h4 list-inline-item"><?= $tickets[$i]['first_name'] . ' '. $tickets[$i]['middle_name'] . ' ' . $tickets[$i]['last_name'] ?></li>
            <li class="h5 list-inline-item font-weight-normal ml-3"></li>
            <li class="h4 list-inline-item float-right">$1265</li>
        </ul>
        <ul class="list-inline text-muted mb-2">
            <li class="h6 list-inline-item font-weight-normal"><?= $tickets[$i]['dob']?></li>
            <li class="h6 list-inline-item font-weight-normal float-right"><?=$tickets[$i]['phone_number']?> </li>
        </ul>
        <form method = 'POST' action = 'cancel_tickets.php?submit=<?=$user_id?>'>
            <button type='submit' name="submit" value='<?= $tickets[$i]['id']?>' class='btn btn-primary'> Cancel </button>
        </form>
        <!-- Modal -->
        <div class="modal fade" id="$flight_modal_id" tabindex="-1" role="dialog" aria-labelledby="$flight_modal_label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                    <ul class="list-group">
                            <li class="list-group-item"><h5 class="modal-title font-weight-heavy" id="$flight_modal_label">$departingTo 🡪 $landingAt</h5></li>
                        <li class="list-group-item font-weight-bold h4">$flightNumber</li>
                        <li class="list-group-item font-weight-bold h4">$$seatPrice</li>
                    </ul>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class='submit'>
                        <form method = 'POST' action = 'create_tickets.php'>
                            <input type='submit' value='<?= $tickets[$i]['id']?>' class='btn btn-primary'> Cancel </input>
                        </form>
                    </div>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <!-- <a class="float-left stretched link mr-4" href="#" data-toggle="modal" data-target="#$flight_modal_id">
            Details
        </a>
        <a class="float-left stretched link" href="#" data-toggle="modal" data-target="#$flight_modal_id">
            Seats
        </a> -->


    </div>
</div>
<?php
endfor;
 ?>
