<div class="p-3 bg-white rounded shadow-sm border border-top-0 rounded-0">

    <div class="form-row">
        <div class="form-group col-md-1">
            <label for="">Title</label>
            <select name="title" id="title" class="custom-select">
                <option value="Select Option"></option>
                <option value="M.">M.</option>
                <option value="Mr.">Mr.</option>
                <option value="Ms.">Ms.</option>
                <option value="Mrs.">Mrs.</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="">First Name</label>
            <input type="" class="form-control" id="first_name">
        </div>
        <div class="form-group col-md-2">
            <label for="">Middle Name</label>
            <input type="" class="form-control" id="middle_name">
        </div>
        <div class="form-group col-md-4">
            <label for="">Last Name</label>
            <input type="" class="form-control" id="last_name">
        </div>
        <div class="form-group col-md-1">
            <label for="Suffix">Suffix</label>
            <input type="text" class="form-control" id="Suffix" name="suffix" placeholder="e.g. Jr.">
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
        <input type="text" class="form-control" id="phone_number" placeholder="This will be your emergency contact number">
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="country">Gender</label>
            <select class="custom-select d-block w-100" id="gender" required>
                <option value="">Choose...</option>
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
                <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth">
            </div>

        </div>

    </div>
    <button class="btn btn-primary btn-lg btn-block" type="submit">Save</button>

</div>
