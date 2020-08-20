<<<<<<< Updated upstream
<?php require __DIR__  . '/init.php'; ?>
=======
<?php require __DIR__ . '/init.php'; ?>
>>>>>>> Stashed changes
<?php $page_title = 'Flights' ?>
<?php include_once $_ENV['BASE_DIRECTORY'] . '/web-assets/tpl/app_header.php'; ?>
<?php include_once $_ENV['BASE_DIRECTORY'] . '/web-assets/tpl/app_nav.php'; ?>

<?php
    use Flights\RestRequest\ApiFlights;
    use Flights\RestRequest\ApiInfo;
    use Flights\TimeHelper;
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
    $match = [];

    if (isset($_POST['dateFrom'])){
        $match['departFromSender']['$gt'] = TimeHelper::dateToTimeStamp($_POST['dateFrom']);
    }
    // if (isset($_POST['dateTo'])){
    //     $match['departFromSender']['$lt'] = TimeHelper::dateToTimeStamp($_POST['dateTo']);
    // }

    $validFields = [
        'type',
        'comingFrom',
        'landingAt',
        'airline',
        'flightNumber',
        'status',
    ];

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
<div class="jumbotron sticky-top mb-0 pb-3 rounded-0" style="background-image: url(/web-assets/images/placeholder-bg-1.png); background-size: 1500px auto;">
    <div class="container">
        <h1 class="display-4">Anywhere. Anytime.</h1>
        <p class="lead">Search All Flights</p>
    </div>
    <div class="container mb-4 mt-2">

        <div class="row">
            <div class="col col-12 mb-4">

                <form class="form" action="" method="POST">
                    <div class="form-group">
                        <div class="form-row">

                            <div class="col col-6 mb-3">
                                <select class="custom-select mr-2" id="comingFrom" name="comingFrom"> <!--add btn btn-primary for cool hover effect!!-->
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
                                <input class="form-control mrs-2" name="dateFrom" type="date" placeholder="Departing">
                            </div>
                            <div class="col col-6 mb-3">
                                <input class="form-control mrs-2" name="dateTo" type="date" placeholder="Returning">
                            </div>
                            <!-- <div class="col mb-3">
                            <select class="custom-select mr-2">
                            <option></option>
                            <option value="">...</option>
                            <option value="2">...</option>
                        </select>
                    </div> -->

                        <div class="collapse" id="collapseExample">
                            <div class="form-row mx-1 mb-2">
                                <div class="input-group">
                                    <select  class="custom-select bg-light text-dark border-0" id="airline" name="airline">
                                        <option value="">Airline</option>
                                        <?php
                                        foreach ($_SESSION['airlines'] as $row) {

                                            echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <select class="custom-select bg-light text-dark border-0" id="type" name="type">
                                        <option value="">Type</option>
                                        <option value="arrival">Arrival</option>
                                        <option value="departure">Departure</option>
                                    </select>
                                    <select class="custom-select bg-light text-dark border-0 rounded-right mr-2" id="status" name="status">
                                        <option value="">Status</option> <!-- see Requirement 2 -->
                                        <option value="arrived">Arrived</option>
                                        <option value="boarding">Boarding</option>
                                        <option value="cancelled">Cancelled</option>
                                        <option value="delayed">Delayed</option>
                                        <option value="departed">Departed</option>
                                        <option value="landed">Landed</option>
                                        <option value="on time">On time</option>
                                        <option value="past">Past</option>
                                        <option value="scheduled">Scheduled</option>
                                    </select>

                                    <div class="form-check form-check-inline mt-1">
                                        <input type="checkbox" class="form-check-input" id="showPastFlights" name="showPastFlights" value="1">
                                        <label class="form-check-label" for="showPastFlights">Show past flights</label>
                                    </div>
                                <div class="input-group-prepend rounded-left">
                                      <div class="input-group-text">Flight #</div>
                                    </div>
                                    <input type="text"  class="form-control" placeholder="e.g. U5946" name="flightNumber" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" />
                                </div>
                            </div>



                        </div>
                        <div class="col col-12 px-0 mx-0 mt-2">
                            <button type="submit" name="submit" value="1" class="btn btn-outline-primary col-6 ml-1">Search Flights</button>
                            <a class="col-6 text-muted mx-0" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Show all options
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
    <!-- <table class="table table-hover"> We could switch to using tables like the one below to display flights
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table> -->

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

                // getHoursBetween() takes in two UNIX Epoch Dates ($t1, $t2) and returns the hours between the two times (as an integer). Pretty nifty eh?
                // size order of the numbers does not matter
                // for example, getHoursBetween(21600000, 54000000); would return 9 hrs.

                function getHoursBetween($t1, $t2) {
                    // var_dump($t1, $t2);

                    $output = abs($t1 - $t2);
                    $output = $output * (2.7777778 * pow(10,-7));
                    $output = round($output, 0);

                    return($output);
                }
                // getHoursBetween(21600000, 54000000);


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
                    $arriveAtReceiver = epochToTime($flight['arriveAtReceiver'] ?? 0, 'g:ia F jS  2020'); //.ENV
                    $departFromSender = epochToTime($flight['departFromSender'] ?? 0, 'g:ia F jS  2020');
                    $departFromReceiver = epochToTime($flight['departFromReceiver'] ?? 0, 'g:ia F jS  2020');
                    $flight_time = getHoursBetween($flight['arriveAtReceiver'] ?? 0, $flight['departFromSender'] ?? 0);
                    $flight_modal_label = $flight_id . "_modal_label";
                    $flight_modal_id = $flight_id . "_modal_id";
                    $seatPrice = $flight['seatPrice'];

                    if ($bookable == false) {
                        $submit_button = 'btn btn-secondary float-right disabled';
                        echo $bookable;
                    }

                    elseif ($bookable == true) {
                        if (!in_array($status, array('Cancelled','Past','Departed'), true)) {

                            if (getHoursBetween($flight['departFromSender'] ?? 0, time()) > 36) {
                            $submit_button = 'btn btn-success float-right';
                            }

                        } else {
                            $submit_button = 'btn btn-secondary float-right disabled';
                        }
                    }

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
                    <span class="text-muted float-right">$flight_time hrs</span>
                    <ul class="list-inline mb-0">
                        <li class="h6 list-inline-item font-weight-normal">$flightNumber $airline</li>
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

                    <a class="$submit_button" href="$_ENV[BASE_URL]/booking?flight_id=$flight_id&status=$status">Book for $$seatPrice</a>
                </div>
            </div>

HEREDOC;

    return $output;
}
$showPastFlights = isset($_POST['showPastFlights']) ?? 0;
if (isset($response['error'])){
    echo "<div class='alert alert-danger'>". $response['error'] ."</div>";
} else {
    foreach ($response['flights'] ?? [] as $key => $value) {

        if ($key > 49) {
            break;
        }
        if ($showPastFlights == 1){
            echo flight_card($value);
        } else {
            if ($value['status'] !== 'past') {
                echo flight_card($value);
            }
        }


    }
}

?>

    </div>
</div>
<div class="col-sm">
    <div class="card"></div>
</div>
</div>
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
<?php include_once $_ENV['BASE_DIRECTORY'] . '/web-assets/tpl/app_footer.php'; ?>
