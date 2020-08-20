<?php require '../init.php';?>
<?php $page_title = 'Dashboard'; ?>
<?php include_once '../web-assets/tpl/app_header.php'; ?>
<?php include_once '../web-assets/tpl/app_nav.php'; ?>
<?php
use Flights\Database\User;
use Flights\Database\UserLog;

if(!isset($_SESSION['user']) && !isset($_COOKIE['user']) ){
    header('location: '. $_ENV['BASE_URL'] . '/login.php');
}

if($_SESSION['type'] == 2 || $_COOKIE['type'] == 2||$_SESSION['type'] == 3 || $_COOKIE['type'] == 3){
    header('location: '. $_ENV['BASE_URL'] . '/dashboard/admin');
}


if(isset($_SESSION['user'])){
    $user_name = $_SESSION['user'];
} elseif (isset($_COOKIE['user'])){
    $user_name = $_COOKIE['user'];
}
?>
<?php
$user = new User();
$userLog = new UserLog;
$user->user_info($_SESSION['user']);

$lastUserLog = $userLog->getLastUserLog($_SESSION['user_info']['id']);
// var_dump($_SESSION);
?>
<?php
    if(isset($_POST['w']) && $_POST['w'] == 'update_profile'){
        echo '<div class="alert alert-success m-0">Profile Update Successful</div>';
        $user->user_info($_SESSION['email']);
    }
?>

<div class="jumbotron mb-0" style="background-image: url(/web-assets/images/placeholder-bg-1.png); background-size: 1500px auto;">
    <div class="container">
        <h1 class="display-3"><?php echo 'Hello, ' . $user_name; ?></h1>
        <p class="h4 font-weight-light">This is your private dashboard. Here you can edit your personal information and view your flights.</p>
        <hr class="my-4">
        <p>
            <a class="text-secondary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                Session Info
            </a>
        </p>
        <div class="collapse" id="collapseExample">

            <div class="container">
                <p class="lead text-left">Last login timestamp: <?=$lastUserLog['last_login_datetime']?></p>
                <p class="lead text-left">Ip Address: <?=$lastUserLog['last_login_ip']?></p>
            </div>
        </div>

    </div>
</div>
<div class="jumbotron bg-light pt-0 mx-auto">
    <ul class="ml-4 nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active h6 mb-0" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link h6 mb-0" id="billing-tab" data-toggle="tab" href="#billing" role="tab" aria-controls="billing" aria-selected="true">Billing</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link h6 mb-0" id="trips-tab" data-toggle="tab" href="#trips" role="tab" aria-controls="trips" aria-selected="false">Trips</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link h6 mb-0" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
        </li>
    </ul>
    <div class=" ml-4 tab-content" id="myTabContent">
        <div class="tab-pane fade show active mt-0 pt-0" id="profile" role="tabpanel" aria-labelledby="profile-tab">

            <?php include_once '../web-assets/tpl/forms/user_profile.php'; ?>

        </div>
        <div class="tab-pane fade" id="billing" role="tabpanel" aria-labelledby="trips-tab">
            <?php include_once '../web-assets/tpl/forms/user_billing.php'; ?>
        </div>
        </div>
        <div class="tab-pane fade" id="trips" role="tabpanel" aria-labelledby="trips-tab">...</div>
        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">..H.</div>
    </div>
</div> <!-- /container -->

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_footer.php'; ?>
