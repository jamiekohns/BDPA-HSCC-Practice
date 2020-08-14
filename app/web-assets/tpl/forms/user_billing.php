<div class="p-3 bg-white rounded shadow-sm border border-top-0 rounded-0">
    <form class="needs-validation" novalidate>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="firstName">Cardholder Name</label>
                <input type="text" class="form-control" id="cardholder_name" placeholder="John Doe" value="" required>
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                    Valid first name is required.
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="address">Billing Address</label>
                <input type="text" class="form-control" id="address_id" placeholder="1234 Main St" required>
                <div class="invalid-feedback">
                    Please enter your shipping address.
                </div>
            </div>
        </div>
        <div class="row">


            <div class="col col-md-2 ">
                <label for="card_number">Card Type</label>
                <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                    <label class="btn btn-light active">
                        <input type="radio" name="options" id="option1" checked> Credit
                    </label>
                    <label class="btn btn-light">
                        <input type="radio" name="options" id="option2"> Debit
                    </label>
                </div>
            </div>

            <div class="col-md-6">
                <label for="card_number">Card Number</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="card-addon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-credit-card-2-back" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M14 3H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                                <path d="M11 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zM1 9h14v2H1V9z"/>
                            </svg>

                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Card Number" id="card_number" aria-label="Card Number" aria-describedby="card-addon">
                </div>


                <div class="invalid-feedback">
                    Credit card number is required
                </div>

            </div>
            <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="date" class="form-control" min="2020" id="expiration_date" placeholder="" required>
                <div class="invalid-feedback">
                    Expiration date required
                </div>
            </div>
            <div class="col-md-1 mb-3">
                <label for="cc-cvv">CVC</label>
                <input type="text" class="form-control" id="cvc" placeholder="###" required>

                <div class="invalid-feedback">
                    Security code required
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mb-3">
                <label for="country">Country</label>
                <?php include 'countries.php'; ?>

                <div class="invalid-feedback">
                    Please select a valid country.
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <input type="text" class="form-control" name="state">
                <div class="invalid-feedback">
                    Please provide a valid state.
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" placeholder="" required>
                <div class="invalid-feedback">
                    Zip code required.
                </div>
            </div>
        </div>






        <button class="btn btn-primary btn-lg btn-block" type="submit">Save</button>
    </form>
</div>
