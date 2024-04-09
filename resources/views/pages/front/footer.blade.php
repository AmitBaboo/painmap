
<footer class="clearfix footer" style="padding-bottom: 1em !important">
    <div class="container">
        <!-- Footer Top Start -->
        <div class="clearfix f-top">
            <!-- F-Widget Start -->
            <div class="clearfix f-widget">
                <div class="row">
                    <div class="col-sm-6 col-md-3 widget-block">
                        @if ($motto['title'] != '')
                            <h6>{{ $motto['title'] }}</h6>
                            <div class="medlife-block">
                                <p>
                                    {{ $motto['body'] }}
                                </p>
                            </div><!-- Medlife End -->
                        @endif



                        <b style="font-size: 18px;color:white">LEGAL</b>
                        <ul>
                            <li>
                                <a href="/policy/8">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="/policy/9">Cookie Policy</a>
                            </li>
                        </ul>

                        <br>
                        <footer class="main-footerx" style="color: #fff">
                            <strong>Copyright</strong> &copy; 2020 - {{ date('Y') }} <a
                                href="https://www.truephysio.co.uk/"><strong>TruePhysio</strong></a> <br> All rights
                            reserved.
                        </footer>
                    </div>
                    <!--/.col-sm-6 col-md-3-->
                    <div class="col-sm-6 col-md-3 widget-block">
                        <h6>PAGES</h6><!-- Medlife Start -->
                        <div class="clearfix pages-block">
                            <div class="col-xs-6 col-sm-6 col-md-6 padding">
                                <ul>
                                    <li>
                                        <a href="{{ url('/symptoms-checker') }}">Symptoms Checker</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('product') }}">Shop</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/faq') }}">FAQ's</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/advice') }}">Advice</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/article') }}">Therapist</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/contact') }}">Contact</a>
                                    </li>
                                </ul>
                            </div>
                            <!--/.col-xs-6 col-sm-6-->
                        </div><!-- Medlife End -->
                    </div>
                    <!--/.-->
                    <div class="col-sm-6 col-md-3 widget-block">
                        <h6>Recent articles</h6><!-- Medlife Start -->
                        <div class="recent-news-block">
                            <a class="view-all" href="/advice">VIEW ALL</a> <!-- News Block Start -->
                            @foreach ($latest_advice as $key => $item)
                                <div class="news-block">
                                    <a href="/article-details/{{ $item->id }}">{{ $item->title }}</a>
                                    <p><i aria-hidden="true" class="fa fa-clock-o"></i> {{ $item->created_at }}</p>
                                </div>
                            @endforeach
                        </div><!-- Medlife End -->
                    </div>
                    <!--/.col-sm-6 col-md-3-->
                    <div class="col-sm-6 col-md-3 widget-block">
                        <h6>Newsletter</h6><!-- Medlife Start -->
                        <div class="news-letter-block">
                            <p>Articles and product launches straight to your inbox</p>
                            <form id="subscribe_form" name="subscribe_form" novalidate="" target="_blank">
                                @csrf
                                <input class="email form-control" name="email_address" id="email_address"
                                    placeholder="Email address" required="" type="email" value="">
                                <button class="btn btn-default" id="mc-embedded-subscribe2" name="SEND"
                                    type="submit">Subscribe</button>
                                <div class="md__newsletter-message"></div>
                            </form>
                        </div><!-- Medlife End -->
                    </div>
                    <!--/.col-sm-6 col-md-3-->
                </div>
                <!--/.row-->
            </div><!-- F-Widget End -->
        </div><!-- Footer Top End -->
        <!-- Footer Bottom Start -->
        <div class="clearfix f-bottom">
            <p>Follow us on Social Media</p>
            <div class="clearfix f-social-icons">
                <ul>
                    @if (isset($social['fb']))
                        <li>
                            <a href="{{ $social['fb'] }}"><i aria-hidden="true" class="fa fa-facebook"></i></a>
                        </li>
                    @endif
                    @if (isset($social['twitter']))
                        <li>
                            <a href="{{ $social['twitter'] }}"><i aria-hidden="true" class="fa fa-twitter"></i></a>
                        </li>
                    @endif
                    @if (isset($social['insta']))
                        <li>
                            <a href="{{ $social['insta'] }}"><i aria-hidden="true" class="fa fa-instagram"></i></a>
                        </li>
                    @endif
                </ul>
            </div>

            <!--/.f-social-icons-->
        </div><!-- Footer Bottom End -->
    </div>
    <!--/.container-->
</footer><!-- Footer End -->






<!-- Modal Start -->
<!-- Login Modal Start -->
{{-- <div aria-hidden="true" class="modal fade login-modal" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Close Start -->
            <button class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> <!-- Close End -->
            <!-- Login Section Start -->
            <div class="clearfix login-block">
                <h6>SIGN IN YOUR ACCOUNT TO HAVE ACCESS TO DIFFERENT FEATURES</h6>
                <form>
                    <div class="form-group">
                        <label for="exampleInputtext1">Username</label> <input class="form-control" id="exampleInputtext1" placeholder="eg: james_smith" type="text">
                    </div>
                    <!--/.form-group-->
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label> <input class="form-control" id="exampleInputPassword1" placeholder="type password" type="password">
                    </div>
                    <!--/.form-group-->
                    <div class="checkbox">
                        <label><input type="checkbox"> REMEMBER ME</label>
                    </div>
                    <!--/.checkbox-->
                    <button class="btn btn-default" type="submit">Log in</button>
                    <div class="forgot-password">
                        <a href="#">FORGOT YOUR PASSWORD?</a>
                    </div>
                    <!--/.forgot-password-->
                </form>
            </div><!-- Login Section End -->
            <!-- Forgot Password Section Start -->
            <div class="clearfix forgot-password-block">
                <h6>FORGOT YOUR DETAILS?</h6>
                <form>
                    <div class="form-group">
                        <label for="exampleInputtext2">Username OR Email</label> <input class="form-control" id="exampleInputtext2" placeholder="eg: james_smith" type="text">
                    </div><button class="btn btn-default" type="submit">SEND MY DETAILS!</button>
                    <div class="forgot-password">
                        <a href="#">AAH, WAIT, I REMEMBER NOW!</a>
                    </div>
                </form>
            </div><!-- Forgot Password Section End -->
        </div>
        <!--/.modal-content-->
    </div>
    <!--/.modal-dialog-->
</div><!-- Login Modal End --> --}}


<!-- Modal -->
<div class="modal fade" id="exampleModalxxx" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
