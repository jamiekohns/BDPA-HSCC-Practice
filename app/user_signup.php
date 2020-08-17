
<?php require 'init.php';?>
<?php $page_title = 'Create New User' ?>
<?php include_once 'web-assets/tpl/app_header.php'; ?>
<?php include_once 'web-assets/tpl/app_nav.php'; ?>
<?php
use Flights\Database\User;
use Flights\RestRequest\ApiInfo;

if(isset($_SESSION['user']) || isset($_COOKIE['user']) ){
    header('location: user_dashboard.php');
}

$error = '';
$make_user = new User();

if(isset($_POST['submit'])){
    if($_POST['captcha'] !== $_POST['captcha_key']){
        $error = 'Invalid Captcha Please Try Again';
    } elseif($_POST['first_name'] == NULL){
        $error = 'Please Enter Your First Name';
    } elseif ($_POST['last_name'] == NULL){
        $error = 'Please Enter Your Last Name';
    } elseif ($_POST['password'] == NULL){
        $error = 'Please Enter Your Password';
    }elseif ($_POST['password2'] !== $_POST['password']){
        $error = 'The Two Passwords Do Not Match';
    }elseif ($_POST['dob'] == NULL){
        $error = 'Please Enter Your Date Of Birth';
    }elseif ($_POST['phone'] == NULL){
        $error = 'Please Enter Your Phone Number';
    }elseif ($_POST['email'] == NULL){
        $error = 'Please Enter Your Email Address';
    }elseif ($_POST['security_question_1'] == NULL){
        $error = 'Please Enter Your Security Questions';
    }elseif ($_POST['security_answer_1'] == NULL){
        $error = 'Please Answer Your Security Questions';
    }elseif ($_POST['security_question_2'] == NULL){
        $error = 'Please Enter Your Security Questions';
    }elseif ($_POST['security_answer_2'] == NULL){
        $error = 'Please Answer Your Security Questions';
    }elseif ($_POST['security_question_3'] == NULL){
        $error = 'Please Enter Your Security Questions';
    }elseif ($_POST['security_answer_3'] == NULL){
        $error = 'Please Answer Your Security Questions';
    } else {
        $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $phone = intval($_POST['phone']);

        $make_user->create_user($_POST['first_name'], $_POST['last_name'], $password_hash, $_POST['title'], $_POST['middle_name'],
        $_POST['suffix'], $_POST['dob'], $_POST['gender'], $phone, $_POST['email'], $_POST['security_question_1'], $_POST['security_question_2'],
        $_POST['security_question_3'], $_POST['security_answer_1'], $_POST['security_answer_2'], $_POST['security_answer_3'],
        1, $_POST['address'], $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['country'], 1);
        $password_hash = NULL;
        header('location: login.php');
    }
}

?>
<div class="jumbotron bg-light">
    <div class="container mx-auto">
        <h1 class="text-center mb-4"> Create an Account </h1>
        <?php
        if ($error) {
            echo '<div class="alert alert-danger">'.$error.'</div>';
        }
        ?>
        <form class= action="user_signup.php" method="post">
            <div class="p-3 bg-white rounded shadow-sm border border-top-0 rounded-0">
<div class="form-row">
<div class="form-group col-md-1">
    <label for="title">Title</label>
    <select name="title" id="title" class="custom-select">
        <option value="Select Option">Select Option</option>
        <option value="M.">M.</option>
        <option value="Mr.">Mr.</option>
        <option value="Ms.">Ms.</option>
        <option value="Mrs.">Mrs.</option>
    </select>
</div>
<div class="form-group col-md-4">
        <label for="">First Name</label>
    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
</div>
<div class="form-group col-md-2">
    <label for="">Middle Name</label>
    <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name">
</div>
<div class="form-group col-md-4">
    <label for="">Last Name</label>
    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
</div>
<div class="form-group col-md-1">
    <label for="Suffix">Suffix</label>
    <input type="text" class="form-control" id="Suffix" name="suffix" placeholder="Optional">
</div>
</div>


<div class="form-row">
<div class="form-group col-md-3">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="address" name="address" placeholder="Please Enter Your Address">
</div>

<div class="form-group col-md-2">
    <label for="city">City</label>
    <input type="text" class="form-control" id="city" name="city" placeholder="Please Enter Your City">
</div>

<div class="form-group col-md-2">
    <label for="state">State</label>
    <input type="text" class="form-control" id="state" name="state" placeholder="Please Enter Your State">
</div>

<div class="form-group col-md-3">
    <label for="country">Country</label>
    <input type="text" class="form-control" id="country" name="country" placeholder="Please Enter Your Country">
</div>

<div class="form-group col-md-2">
    <label for="zip">Zip/Postal Code</label>
    <input type="text" class="form-control" id="zip" name="zip" placeholder="Please Enter Your Zip/Postal Code">
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
    <label for="phone">Phone Number</label>
    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Please Enter Your Phone Number">
</div>
<div class="form-group col-md-6">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Please Enter Your Email Address">
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
    <label for="gender">Gender</label>
    <select class="custom-select" name="gender" id="gender">
        <option value="Select Option">Gender</option>
        <option value="M">Male</option>
        <option value="F">Female</option>
        <option value="O">Other</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label for="dob">Date of Birth</label>
    <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth">
</div>
</div>



<div class="form-row">
<div class="col-md-4">

<div class="form-group">
    <label for="security_question_1">Security Question 1</label>
    <input type="text" class="form-control" id="security_question_1" name="security_question_1" placeholder="Enter a Security Question(This Can Be Used to Access Your Account)">
</div>
<div class="form-group">
    <label for="security_answer_1">Security Answer 1</label>
    <input type="text" class="form-control" id="security_answer_1" name="security_answer_1" placeholder="Answer the Security Question Above">
</div>
</div>





<div class="col-md-4">
<div class="form-group">
    <label for="security_question_2">Security Question 2</label>
    <input type="text" class="form-control" id="security_question_2" name="security_question_2" placeholder="Enter a Security Question(This Can Be Used to Access Your Account)">
</div>

<div class="form-group">
    <label for="security_answer_2">Security Answer 2</label>
    <input type="text" class="form-control" id="security_answer_2" name="security_answer_2" placeholder="Enter the Answer to The Security Question Above">
</div>
</div>

<div class="col-md-4">
<div class="form-group">
    <label for="security_question_3">Security Question 3</label>
    <input type="text" class="form-control" id="security_question_3" name="security_question_3" placeholder="Enter a Security Question(This Can Be Used to Access Your Account)">
</div>

<div class="form-group">
    <label for="security_answer_3">Security Answer 3</label>
    <input type="text" class="form-control" id="security_answer_3" name="security_answer_3" placeholder="Enter the Answer to The Security Question Above">
</div>
</div>
</div>



<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Please Enter Your Password">
</div>
<div class="form-group">
    <label for="password">Confirm Password</label>
    <input type="password" class="form-control" id="password2" name="password2" placeholder="Please Confirm Your Password">
</div>




<div class="form-group">
    <label for="Captcha">Captcha</label>
    <div class="img-thumbnail" style="overflow: hidden; background-image: url(/web-assets/images/captcha-noise.png);opacity: 0.64;">
        <?php
        $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $captcha_key = substr(str_shuffle($permitted_chars), 0, 6);

        function getColor(){
            $rand_color = "#".substr(md5(rand()), 0, 6);
            return $rand_color;
        }


        ?>
        <p class="h3 font-weight-bold user-select-none text-center" style="
        font-size: <?php echo mt_rand(2, 3) . 'em;';?>
        letter-spacing: <?php echo mt_rand(3, 15) ?>px;
        transform:
        rotateX(<?php echo mt_rand(0,50) . 'deg'; ?>)
        rotate(<?php echo mt_rand(-12,12) . 'deg'; ?>)
        skewX(<?php echo mt_rand(-50,50) . 'deg'; ?>);
        text-shadow: <?php echo mt_rand(0,5) . 'px '; ?>
        <?php echo mt_rand(0,5) . 'px' . getColor() . ';';?> color: rgba(<?php echo mt_rand(0, 100) . ',' . mt_rand(0, 100) . ',' . mt_rand(0, 100) . ',' . 1; ?>
        ">
        <?php echo $captcha_key;?>

    </p>
</div>
<input type="hidden" name="captcha_key" value="<?php echo $captcha_key; ?>"></input>
<input type="text" class="form-control" id="captcha" name="captcha" placeholder="Enter the text as shown. (No spaces)">
</div>
<button type="submit" name="submit" class="btn btn-primary w-100">Create Account</button>
</form>
</div>
