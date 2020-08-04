<!DOCTYPE html>
<?php require __DIR__ . '/../init.php'; ?>
<?php $page_title = 'Flights' ?>
<?php include_once __DIR__ . '/../web-assets/tpl/app_header.php'; ?>
<?php include_once __DIR__ . '/../web-assets/tpl/app_nav.php'; ?>

<?php
    use Flights\RestRequest\ApiFlights;
?>
<?php

        $w = isset($_GET['w']);
        if ($w == 'search'){
            
            $rest = new ApiFlights();
            $response = $rest->search();
            $response = json_decode($response, true);
            var_dump($response['flights']);
        } else {
            $rest = new ApiFlights();
            $response = $rest->all();
            $response = json_decode($response, true);
            var_dump($response['flights']);
        }
?>
<div class="container mb-4">
    <div class="row pt-4 mb-4">
        <div class="col"></div>
    </div>
    <div class="row">
        <div class="col col-md-4 col-sm-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form class="form">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col">
                                    <input class="form-control" type="date" />
                                </div>
                                <div class="col">
                                    <input class="form-control" type="date" />
                                </div>
                            </div>
                        </div>
                    </form>
                    <h5 class="card-title">Details</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <!-- <ul class="list-group list-group-flush">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul> -->
                <div class="card-body">
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>

        <div class="col">
            <div style="height: 500px; overflow-y: scroll;" class="">
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
                        return "0:00" . $e;
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
                    $status = ucfirst($flight['status']) ?? "";
                    switch ($status) {
                        case '':
                    }
                    $arriveAtReciever = epochToTime($flight['arriveAtReciever'] ?? 0, 'h:ia'); //.ENV
                    $departFromSender = epochToTime($flight['departFromSender'] ?? 0, 'h:ia');
                    $departFromReciever = epochToTime($flight['departFromReciever'] ?? 0, 'h:ia');
                    $flight_time = epochToTime(1594151700108 - 159416003850, 'h:i');
                    $flight_modal_label = $flight_id . "_modal_label";
                    $flight_modal_id = $flight_id . "_modal_id";
                    $seatPrice = $flight['seatPrice'];
                    echo $departFromSender;
                    $output = <<<HEREDOC


        <div class="card mb-4">
                <div class="card-body pt-3">
                    <span class="badge badge-primary font-weight-heavy mb-3">$status</span>
                    <span class="text-muted float-right">$airline</span>
                    <ul class="list-inline mb-0">
                        <li class="h6 list-inline-item font-weight-normal">$flightNumber</li>
                        <li class="h6 list-inline-item float-right font-weight-normal">$flight_time</li>
                    </ul>
                    <ul class="list-inline mb-0">
                        <li class="h4 list-inline-item">$departFromSender</li>
                        <li class="h5 list-inline-item font-weight-normal text-muted m-0"><u>$type</u></li>
                        <li class="h4 list-inline-item float-right">$arriveAtReciever</li>
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
                                <ul class="list-group list-group-horizontal">
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
                                        <button type="button" class="btn btn-primary btn-lg">Select Flight</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a class="float-left stretched link mr-4" href="#" data-toggle="modal" data-target="#$flight_modal_id">
                        Details
                    </a>
                    <a class="float-left stretched link" href="#" data-toggle="modal" data-target="#$flight_modal_id">
                        Seats
                    </a>
                </div>
            </div>

HEREDOC;

    return $output;
}

foreach ($response['flights'] as $key => $value) {

    if ($key > 49) {
        break;
    }
    echo flight_card($value);

}



?>
        </div>
    </div>
</div>
<div class="col-sm">
    <div class="card"></div>
</div>

<?php include_once __DIR__ . '/../web-assets/tpl/app_footer.php'; ?>
