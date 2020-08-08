<?php require $_SERVER['DOCUMENT_ROOT'] . '/init.php'; ?>
<?php $page_title = 'Flights' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_header.php'; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_nav.php'; ?>

<?php
    use Flights\RestRequest\ApiFlights;
    use Flights\RestRequest\ApiInfo;
?>
<?php

if (!isset($_SESSION['airports']) || !$_SESSION['airports']) {
    $info = new ApiInfo();
    $airports = $info->airports();
    if (isset($airports['error'])){
        $_SESSION['airports'] = [];
    } else {
        $_SESSION['airports'] = $airports['airports'];
    }
}


if (!isset($_SESSION['airlines']) || !$_SESSION['airlines']) {
    $info = new ApiInfo();
    $airlines = $info->airlines();
    if (isset($airlines['error'])){
        $_SESSION['airlines'] = [];
    } else {
        $_SESSION['airlines'] = $airlines['airlines'];
    }
}


if (isset($_POST['submit'])){
    $validFields = [
        'type',
        'comingFrom',
        'landingAt',
        'airline',
    ];
    $match = [];
    foreach ($validFields as $field) {
        if (isset($_POST[$field]) && !empty($_POST[$field])) {
            $match[$field] = $_POST[$field];
        }
    }
    $rest = new ApiFlights();
    $response = $rest->search(null, $match, null, null, null);
} else {
    $rest = new ApiFlights();

    $response = $rest->all();
}
?>
<div class="jumbotron sticky-top mb-0 pb-4 rounded-0">
    <div class="container">
    <h1 class="display-4">Search All Flights</h1>
    <p class="lead">Your journey awaits.</p>
  </div>
    <div class="container mb-4 mt-2">

        <div class="row">
            <div class="col col-12 mb-4">




                                <form class="form" action="" method="POST">
                                    <div class="form-group">
                                        <div class="form-row">

                                            <div class="col col-6 mb-3">
                                                <select class="custom-select mr-2" id="comingFrom" name="comingFrom">
                                                    <option value="">From</option>
                                                    <?php
                                                    foreach ($_SESSION['airports'] as $row) {

                                                        echo "<option value='" . $row['shortName'] . "'>" . $row['city'] . "</option>";

                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col col-6 mb-3">
                                                <select class="custom-select mrs-2" id="landingAt" name="landingAt">
                                                    <option value="">To</option>
                                                    <?php
                                                    foreach ($_SESSION['airports'] as $row) {

                                                        echo "<option value='" . $row['shortName'] . "'>" . $row['city'] . "</option>";

                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col col-6 mb-3">
                                                 <input class="form-control mrs-2" type="date">
                                            </div>
                                            <div class="col col-6 mb-3">
                                                 <input class="form-control mrs-2" min="2020-07-08" type="date">
                                            </div>
                                            <!-- <div class="col mb-3">
                                            <select class="custom-select mr-2">
                                            <option></option>
                                            <option value="">...</option>
                                            <option value="2">...</option>
                                        </select>
                                    </div> -->

                                    <div class="col">
                                        <div class="collapse" id="collapseExample">
                                            <div class="card card-body bg-light px-0">
                                                <div class="col col-4 mb-3">
                                                    <select class="custom-select" id="type" name="type">
                                                        <option value="">Type</option>
                                                        <option value="arrival">Arrival</option>
                                                        <option value="departure">Departure</option>
                                                    </select>
                                                </div>

                                                <div class="col col-8 mb-3">
                                                    <select class="custom-select" id="airline" name="airline">
                                                        <option value="">Airline</option>
                                                        <?php
                                                        foreach ($_SESSION['airlines'] as $row) {

                                                            echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";

                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col col-12 px-0 mx-0 mt-2">
                                            <button type="submit" name="submit" value="1" class="btn btn-outline-primary col-6">Search Flights</button>
                                            <a class="col-6 text-muted mx-0" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                More options
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
</div>





    </div>

</div>
</div>
<div style="z-index: 2000;" class="col col-12 bg-light pt-4 mt-0 pt-0 rounded-top">

                <?php
                /*airline": "Delta",
            "comingFrom": "SCA",
            "landingAt": "CHF",
            "departingTo": "F1A",
            "flightNumber": "D1759",
            "flight_id": "5f04f0607a927fab9cfbddfd",
            "bookable": false,
            "arriveAtReceiver": 1594160038503,
            "departFromSender": 1594151700108,
            "departFromReceiver": 1594160938503,
            "status": "past",
            "gate": null,
            "seatPrice": 123.45
        },*/
                function epochToTime(int $epoch, string $format){
                    try {
                        $dt = new DateTime("@$epoch"); // convert UNIX timestamp to PHP DateTime
                        $t = ltrim($dt->format($format), '0'); // trim off all leading zeroes
                        return $t; // !!! PHP date !!!
                    } catch (\Exception $e){
                        die($e->getMessage());
                    }
                }

                function flight_card(array $flight){
                    $type = ucfirst($flight['type']);
                    $airline = $flight['airline'] ?? "";
                    $comingFrom = $flight['comingFrom'] ?? "";
                    $landingAt = $flight['landingAt'] ?? "";
                    $departingTo = $flight['departingTo'] ?? "";
                    $flightNumber = $flight['flightNumber'] ?? "";
                    $flight_id = $flight['flight_id'] ?? "";
                    $bookable = $flight['bookable'] ?? "";
                    if ($bookable == false){
                        $submit_button = 'btn btn-secondary float-right disabled';
                        echo $bookable;
                    } elseif ($bookable == true){
                        $submit_button = 'btn btn-success float-right';
                    }
                    $status = ucfirst($flight['status']) ?? "";
                    $arriveAtReceiver = epochToTime($flight['arriveAtReceiver'] ?? 0, 'h:ia'); //.ENV
                    $departFromSender = epochToTime($flight['departFromSender'] ?? 0, 'h:ia');
                    $departFromReceiver = epochToTime($flight['departFromReceiver'] ?? 0, 'h:ia');
                    $flight_time = epochToTime(1594151700108 - 159416003850, 'h:i');
                    $flight_modal_label = $flight_id . "_modal_label";
                    $flight_modal_id = $flight_id . "_modal_id";
                    $seatPrice = $flight['seatPrice'];
                    switch ($status) {
                        case 'Past':
                            $status_color = 'secondary';
                            break;
                        case 'Scheduled':
                            $status_color = 'info';
                            break;
                        case 'Cancelled':
                            $status_color = 'light';
                            break;
                        case 'Delayed':
                            $status_color = 'danger';
                            break;
                        case 'On time':
                            $status_color = 'primary';
                            break;
                        case 'Landed':
                            $status_color = 'success';
                            break;
                        case 'Boarding':
                            $status_color = 'warning';
                            break;
                        case 'Arrived':
                            $status_color = 'danger';
                            break;
                        default: $status_color = "white";
                    }
                    $output = <<<HEREDOC
            <div class="card mb-4">
                <div class="card-body pt-3">
                    <span class="badge badge-$status_color font-weight-normal h6 mb-3">$status</span>
                    <span class="text-muted float-right"></span>
                    <ul class="list-inline mb-0">
                        <li class="h6 list-inline-item font-weight-normal">$flightNumber</li>
                        <li class="h6 list-inline-item float-right font-weight-normal">$type</li>
                    </ul>
                    <ul class="list-inline mb-0">
                        <li class="h4 list-inline-item">$departFromSender</li>
                        <li class="h5 list-inline-item font-weight-normal ml-3"></li>
                        <li class="h4 list-inline-item float-right">$arriveAtReceiver</li>
                    </ul>
                    <ul class="list-inline text-muted mb-2">
                        <li class="h6 list-inline-item font-weight-normal">$comingFrom</li>
                        <li class="h6 list-inline-item font-weight-normal float-right">$landingAt</li>
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

                    <a class="$submit_button" href="/booking?flight_id=$flight_id">Book for $$seatPrice</a>
                </div>
            </div>

HEREDOC;

    return $output;
}

if (isset($response['error'])){
    echo "<div class='alert alert-danger'>". $response['error'] ."</div>";
} else {
    foreach ($response['flights'] ?? [] as $key => $value) {

        if ($key > 49) {
            break;
        }
        echo flight_card($value);

    }
}

?>

    </div>
</div>
<div class="col-sm">
    <div class="card"></div>
</div>
</div>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_footer.php'; ?>
