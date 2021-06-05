<?php require __DIR__  . '/init.php'; ?>
<?php $page_title = 'Ticket Confirmation' ?>
<?php include_once $_ENV['BASE_DIRECTORY'] . '/web-assets/tpl/app_header.php'; ?>
<?php include_once $_ENV['BASE_DIRECTORY'] . '/web-assets/tpl/app_nav.php'; ?>
<?php use Flights\Database\Tickets; ?>
<?php

if(!isset($_GET['confirmation_id'])){
    header('location: ' .$_ENV['BASE_URL'] . '/index.php');
}

$ticket = new Tickets();

$message = null;
if($ticket->check_confirmation_id($_GET['confirmation_id'])){
    $message = 'Your confirmation id is ' . $_GET['confirmation_id'];
    $color = 'bg-success';
} else{
    $message = 'The ticket is not valid. This may be an error. Your account will not be charged';
    $color = 'bg-danger';
}

?>
<html>
    <body>
        <div class="container">
            <div class="text-center <?= $color ?> my-3 p-3 ">
                <h4 class="text-white pb-2 mb-0 "> <?= $message ?> </h6>
            </div>
            <div class="text-center my-3 p-3">
                <a class="btn btn-secondary" href= <?= $_ENV['BASE_URL'] ?> > Home </a>
        </div>
    </body>
</html>