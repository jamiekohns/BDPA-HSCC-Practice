
<?php
// echo $_SESSION['user_info']['first_name'] ?? NULL;
$old_title = $_SESSION['user_info']['title'] ?? NULL;;
$old_first_name = $_SESSION['user_info']['first_name'] ?? NULL;
$old_middle_name = $_SESSION['user_info']['middle_name'] ?? NULL;
$old_last_name  = $_SESSION['user_info']['last_name'] ?? NULL;
$old_suffix = $_SESSION['user_info']['suffix'] ?? NULL;
$old_phone_number = $_SESSION['user_info']['phone_number'] ?? NULL;
$old_gender = $_SESSION['user_info']['gender'] ?? NULL;
$old_dob = $_SESSION['user_info']['dob'] ?? NULL;
$old_country = $_SESSION['user_info']['country'] ?? NULL; //FIX THIS


$error    = '';
$positive = '';
?>
<div class="p-3 bg-white rounded shadow-sm border border-top-0 rounded-0">
    <form action="" method="POST">
        <div class="form-row">
            <div class="form-group col-md-1">
                <label for="">Title</label>
                <select name="title" id="title" class="custom-select">
                    <option value="<?=$old_title?>"><?=$old_title?></option>
                    <option value="M.">M.</option>
                    <option value="Mr.">Mr.</option>
                    <option value="Ms.">Ms.</option>
                    <option value="Mrs.">Mrs.</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="">First Name</label>
                <input type="" class="form-control" id="first_name" value="<?=$old_first_name?>" placeholder="John">
            </div>
            <div class="form-group col-md-2">
                <label for="">Middle Name</label>
                <input type="" class="form-control" id="middle_name" value="<?=$old_middle_name?>" placeholder="Optional">
            </div>
            <div class="form-group col-md-4">
                <label for="">Last Name</label>
                <input type="" class="form-control" id="last_name" value="<?=$old_last_name?>" placeholder="Doe">
            </div>
            <div class="form-group col-md-1">
                <label for="Suffix">Suffix</label>
                <input type="text" class="form-control" id="Suffix" name="suffix" value="<?=$old_suffix?>" placeholder="e.g. Jr.">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Country</label>
            <div>
                <?php include_once '../web-assets/tpl/forms/countries.php'?>
                <div class="invalid-feedback">
                    Please select a valid country.
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" value="<?=$old_phone_number?>" placeholder="This will be your emergency contact number">
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="country">Gender</label>
                <select class="custom-select d-block w-100" id="gender" required>
                    <option value="<?=$old_gender?>"><?=$old_gender?></option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                    <option value="O">Other</option>
                </select>
                <div class="invalid-feedback">
                    Please select a gender.
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="state">Date Of Birth</label>
                <div class="form-group ">
                    <input type="date" class="form-control" id="dob" name="dob" value="<?=$old_dob?>" placeholder="Date of Birth">
                </div>

            </div>

        </div>
        <input type="hidden" name="w" value="update_profile">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Save</button>
    </form>
</div>
