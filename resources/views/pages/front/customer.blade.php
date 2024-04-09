<div aria-hidden="true" class="modal fade login-modal" role="dialog" id="customer-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Close Start -->
            <button class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> <!-- Close End -->
            <!-- Login Section Start -->
            <div class="login-block clearfix">
                <h6>ADD CUSTOMER</h6>
                <form action="{{ url('/customers') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="fullName">Full Name</label>
                                <input class="form-control" name="full_name" id="fullName" placeholder="eg: James" type="text" :value="old('first_name')" required autofocus autocomplete="first_name">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="emailAddress">Email Address</label>
                                <input class="form-control" name="email" id="emailAddress" placeholder="eg: jamessmith@domain.com" type="text" required autocomplete="email">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="contactNumber">Contact Number</label>
                                <input class="form-control" name="contact_number" id="contactNumber" placeholder="eg: +44 7911 123456" type="text" required autocomplete="contact_number">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="postCode">Post Code</label>
                                <input class="form-control" name="post_code" id="postCode" placeholder="eg: SW1W 0NY" type="text" required autocomplete="post_code">
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-default" type="submit">Add Customer</button>
                </form>
            </div><!-- Register Section End -->
            <!-- Forgot Password Section Start -->
        </div>
        <!--/.modal-content-->
    </div>
    <!--/.modal-dialog-->
</div><!-- Login Modal End -->
<!-- Video Modal Start -->