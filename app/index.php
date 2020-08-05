<?php require __DIR__ . '/init.php'; ?>
<?php $page_title = 'Flights' ?>
<?php include_once __DIR__ . '/web-assets/tpl/app_header.php'; ?>
<?php include_once __DIR__ . '/web-assets/tpl/app_nav.php'; ?>

<?php
    use Flights\RestRequest\ApiFlights;
    use Flights\RestRequest\ApiInfo;
?>
<?php
        unset($_SESSION['airports'], $_SESSION['airlines']);

        if (!isset($_SESSION['airports']) || !$_SESSION['airports']) {
           $info = new ApiInfo();
           $airports = $info->airports();
           $airports = json_decode($airports, true);
           $_SESSION['airports'] = $airports['airports'];
        }

        if (!isset($_SESSION['airlines']) || !$_SESSION['airlines']) {
           $info = new ApiInfo();
           $airlines = $info->airlines();
           $airlines = json_decode($airlines, true);
           $_SESSION['airlines'] = $airlines['airlines'];
        }

        if (isset($_POST['submit'])){
            // isset($afterSearch) ?? NULL, isset($match) ?? NULL, isset($regexMatch) ?? NULL
            $match = [
                'type' => $_POST['type'] ?? NULL,
                'comingFrom' => $_POST['comingFrom'] ?? NULL,
                'landingAt' => $_POST['landingAt'] ?? NULL,
                'airline' => $_POST['airline'] ?? NULL
            ];

            $rest = new ApiFlights();
            $response = $rest->search(NULL, $match, NULL, NULL, NULL);
            $response = json_decode($response, true);
            var_dump($response);
            // var_dump($response['flights']);
        } else {
            $rest = new ApiFlights();
            $response = $rest->all();
            $response = json_decode($response, true);
            // var_dump($response['flights']);
        }
?>
<div class="container mb-4 mt-2">
    <div class="row pt-0 mb-4">
        <div class="col"></div>
    </div>
    <div class="row">
        <div class="col col-12 col-md-4 col-sm-12 mb-4">
            <div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Search Flights
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
          <form class="form" action="" method="POST">
              <div class="form-group">
                  <div class="form-row">

                      <div class="col col-6 mb-3">
                          <select class="custom-select mr-2" id="comingFrom" name="comingFrom">
                              <option selected>Location...</option>
                              <?php
                                  foreach ($_SESSION['airports'] as $row) {

                                      echo "<option value='" . $row['shortName'] . "'>" . $row['city'] . "</option>";

                                  }
                               ?>
                          </select>
                      </div>

                      <div class="col col-6 mb-3">
                          <select class="custom-select mrs-2" id="landingAt" name="landingAt">
                              <option selected>Location...</option>
                              <?php
                                  foreach ($_SESSION['airports'] as $row) {

                                      echo "<option value='" . $row['shortName'] . "'>" . $row['city'] . "</option>";

                                  }
                               ?>
                          </select>
                      </div>
                      <div class="col mb-3">
                          <select class="custom-select mr-2" id="type" name="type">
                              <option selected>Type</option>
                              <option value="arrival">Arrival</option>
                              <option value="departure">Departure</option>
                          </select>
                      </div>

                      <div class="col mb-3">
                          <select class="custom-select mr-2" id="airline" name="airline">
                              <option selected>Airline</option>
                              <?php
                                  foreach ($_SESSION['airlines'] as $row) {

                                      echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";

                                  }
                               ?>
                          </select>
                      </div>
                      <div class="col mb-3">
                          <select class="custom-select mr-2">
                              <option selected></option>
                              <option value="">...</option>
                              <option value="2">...</option>
                          </select>
                      </div>
                      <div class="col col-12">
                          <button type="submit" name="submit" value="1" class="btn btn-outline-primary w-100">Search Flights</button>
                      </div>
                  </div>
              </div>
          </form>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Search Flights by Id
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        <form class="form form-inline">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="e.g. U5946" aria-label="Id" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit">Go</button>
                </div>
            </div>
        </form>
      </div>
    </div>
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
                    $arriveAtReciever = epochToTime($flight['arriveAtReciever'] ?? 0, 'h:ia'); //.ENV
                    $departFromSender = epochToTime($flight['departFromSender'] ?? 0, 'h:ia');
                    $departFromReciever = epochToTime($flight['departFromReciever'] ?? 0, 'h:ia');
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
                        <li class="h5 list-inline-item font-weight-normal ">----</li>
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
                    <a class="float-left stretched link mr-4" href="#" data-toggle="modal" data-target="#$flight_modal_id">
                        Details
                    </a>
                    <span class="text-muted float-left mr-4">|</span>
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

<?php include_once __DIR__ . '/web-assets/tpl/app_footer.php'; ?>
