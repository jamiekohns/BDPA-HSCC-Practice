
<?php
use Flights\Database\Tickets;


$ticket = new Tickets();

//die(var_dump($_SESSION['user_information']['id']));
if(isset($_SESSION['user_information']['id'])){
$tickets = $ticket->display_tickets($_SESSION['user_information']['id']);
} elseif (isset($_COOKIE['user_information']['id'])) {
    $tickets = $ticket->display_tickets($_COOKIE['user_information']['id']);
}



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
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer bg-light">
                        <p style="align:left;" class="modal-text h3"></p>
                        <form>
                            <button type="button" class="btn btn-primary btn-lg">Book Flight</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="btn btn-white p-1 text-primary text-center align-middle" style="width: 30px; height: 30px;" href= "<?= $_ENV['BASE_URL'] ?>/ticket_add.php" >+</a>
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
