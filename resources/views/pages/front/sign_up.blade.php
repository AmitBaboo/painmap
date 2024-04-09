<div aria-hidden="true" class="modal fade login-modal register-modal" role="dialog" id="register-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Close Start -->
            <button class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span><span
                    class="sr-only">Close</span></button> <!-- Close End -->
            <!-- Login Section Start -->
            <div class="login-block clearfix">
                <h6>SIGN UP AS PHYSIO THERAPIST</h6>
                <form id="register-form" action="/register-therapist" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="companyName">Company Name</label>
                        <input class="form-control" name="full_name" id="companyName" placeholder="eg: TruePhysio"
                            type="text" :value="old('full_name')" required autofocus autocomplete="full_name" />
                        <span></span>
                    </div>


                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="contactNumber">Contact Number</label>
                                <input class="form-control" name="contact_number" id="contactNumber"
                                    placeholder="eg: +44 7911 123456" type="text" required
                                    autocomplete="contact_number">
                                <span></span>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="postCode">Post Code</label>
                                <input class="form-control" name="post_code" id="postCode" placeholder="eg: SW1W 0NY"
                                    type="text" required autocomplete="post_code">
                                <span></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="emailAddress">Email Address</label>
                        <input class="form-control" name="email" id="emailAddress"
                            placeholder="eg: jamessmith@domain.com" type="text" required autocomplete="email">
                        <span></span>
                    </div>

                    <!--/.form-group-->
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" name="password" id="password"
                                    placeholder="Type your password" type="password" required
                                    autocomplete="new-password">
                                <span></span>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="confirmPassword">Confirm Password</label>
                                <input class="form-control" name="password_confirmation" id="confirmPassword"
                                    placeholder="Confirm password" type="password" required autocomplete="new-password">
                                <span></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-8 mb-2">
                            <div class="g-recaptcha brochure__form__captcha"
                                data-sitekey="{{ config('app.site_key') }}"></div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <button class="btn btn-default" type="submit">Sign Up</button>
                        </div>
                    </div>

                </form>
                <span id='robot'></span>
            </div><!-- Register Section End -->
            <!-- Forgot Password Section Start -->
        </div>
        <!--/.modal-content-->
    </div>
    <!--/.modal-dialog-->
</div><!-- Login Modal End -->
<!-- Video Modal Start -->
