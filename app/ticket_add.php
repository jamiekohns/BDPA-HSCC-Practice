<?php require __DIR__  . '/init.php'; ?>
<?php $page_title = 'Flights' ?>
<?php include_once $_ENV['BASE_DIRECTORY'] . '/web-assets/tpl/app_header.php'; ?>
<?php include_once $_ENV['BASE_DIRECTORY'] . '/web-assets/tpl/app_nav.php'; ?>
<?php use Flights\Database\Tickets; ?>
<?php
if(!isset($_SESSION['user'])){
    header('location: ' . $_ENV['BASE_URL']);
}
?>
<div class="container">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Add Tickets</h6>
        <form action="ticket_add.php" method="post" class="needs-validation" novalidate>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="">First Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="">Ticket Id</label>
                    <input type="text" class="form-control" id="ticket" name="ticket" required>
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                </div>
            </div>
        <button type="submit" class="btn btn-primary" name="submit"> Search </button>
        </div>
    </div>
<?php
for($i = 0; $i<count($ticket_info); $i++):
?>
<div class="card mb-3 mx-auto" style="width: 1200px;">
    <div class="card-body pt-4">
        <span class="badge badge-$status_color font-weight-normal h6 mb-3"><?= $ticket_info[$i]['seat_assignment']?></span>
        <span class="text-muted float-right"></span>
        <ul class="list-inline mb-0">
            <li class="h6 list-inline-item font-weight-normal"><?= $ticket_info[$i]['flight_id']?></li>
            <li class="h6 list-inline-item float-right font-weight-normal"><?= $ticket_info[$i]['status_id']?></li>
        </ul>
        <ul class="list-inline mb-0">
            <li class="h4 list-inline-item"><?= $ticket_info[$i]['first_name'] . ' '. $ticket_info[$i]['middle_name'] . ' ' . $ticket_info[$i]['last_name'] ?></li>
            <li class="h5 list-inline-item font-weight-normal ml-3"></li>
            <li class="h4 list-inline-item float-right">$1265</li>
        </ul>
        <ul class="list-inline text-muted mb-2">
            <li class="h6 list-inline-item font-weight-normal"><?= $ticket_info[$i]['dob']?></li>
            <li class="h6 list-inline-item font-weight-normal float-right"><?=$ticket_info[$i]['phone_number']?> </li>
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
if($message !== NULL){
    echo '<div class="bg-danger md-5 p-3 mx-auto w-75">
            <h5 class="text-white">' . $message . '</h5>
            </div';
}
 ?>