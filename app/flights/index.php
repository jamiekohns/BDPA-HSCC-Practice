<!DOCTYPE html>
<?php require __DIR__ . '/../init.php'; ?>
<?php $page_title = 'Flights' ?>
<?php include_once __DIR__ . '/../web-assets/tpl/app_header.php'; ?>
<?php include_once __DIR__ . '/../web-assets/tpl/app_nav.php'; ?>

<div class="container mb-4">
    <div class="row pt-4 mb-4">
        <div class="col"></div>
    </div>
    <div class="row">
        <div class="col col-md-4 col-sm-12">
            <div class="card">
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
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>

        <div class="col">
            <div style="height: 500px; overflow-y: scroll;" class="">
                <?php
            $result = <<<HEREDOC

        <div class="card mb-4">
                <div class="card-body pt-3">
                    <span class="badge badge-primary mb-3">Departing</span>

                    <ul class="list-inline mb-0">
                        <li class="h6 list-inline-item font-weight-normal">D12RT</li>
                        <li class="h6 list-inline-item float-right font-weight-normal">1h 50m</li>
                    </ul>
                    <ul class="list-inline mb-0">
                        <li class="h4 list-inline-item">4:00pm</li>
                        <li class="h4 list-inline-item ml-4">———</li>
                        <li class="h4 list-inline-item float-right">12:00am</li>
                    </ul>
                    <ul class="list-inline text-muted mb-2">
                        <li class="h6 list-inline-item font-weight-normal">ATL</li>
                        <li class="h6 list-inline-item font-weight-normal float-right">NY</li>
                    </ul>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Book</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a class="float-left stretched link mr-4" href="#" data-toggle="modal" data-target="#exampleModal">
                        Info
                    </a>
                    <a class="float-left stretched link" href="#" data-toggle="modal" data-target="#exampleModal">
                        Seats
                    </a>
                </div>
            </div>

HEREDOC;
 echo $result; echo $result; echo $result; echo $result; echo $result; echo $result; echo $result; ?>
        </div>
    </div>
</div>
<div class="col-sm">
    <div class="card"></div>
</div>

<?php include_once __DIR__ . '/../web-assets/tpl/app_footer.php'; ?>
