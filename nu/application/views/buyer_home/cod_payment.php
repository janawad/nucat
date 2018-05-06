  <div class="container">
            <header class="page-header">
                <h1 class="page-title">Checkout Order</h1>
            </header>
            <p class="checkout-login-text">Sign in or Register to your TheBox profile to faster order checkout.</p>
            <div class="row row-col-gap" data-gutter="80">
               
                <div class="col-md-6">
                    <h3 class="widget-title">Billng Details</h3>
                    <form>
                        <div class="form-group">
                            <label>First &amp; Last Name</label>
                            <input class="form-control" type="text" />
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" />
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input class="form-control" type="text" />
                        </div>
                        <div class="checkbox">
                            <label>
                                <input class="i-check" type="checkbox" id="create-account-checkbox" />Create TheBox Profile</label>
                        </div>
                        <div id="create-account" class="hide">
                            <p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="text" />
                            </div>
                            <div class="form-group">
                                <label>Repeat Password</label>
                                <input class="form-control" type="text" />
                            </div>
                            <hr />
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <input class="form-control" type="text" />
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>City</label>
                                    <input class="form-control" type="text" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Zip/Postal</label>
                                    <input class="form-control" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input class="form-control" type="text" />
                        </div>
                        <div class="checkbox">
                            <label>
                                <input class="i-check" type="checkbox" id="shipping-address-checkbox" />Ship to a Different Address</label>
                        </div>
                        <div id="shipping-address" class="hide">
                            <div class="form-group">
                                <label>Shipping Country</label>
                                <input class="form-control" type="text" />
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Shipping City</label>
                                        <input class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Zip/Postal</label>
                                        <input class="form-control" type="text" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Shipping Address</label>
                                <input class="form-control" type="text" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                <?php echo anchor('#','Confirm Order','class="btn btn-primary"')?>
                </div>
               
            </div>
        </div>