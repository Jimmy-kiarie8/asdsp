@extends('frontend.main')
@section('content')

 <!-- Content Wrapper Start -->
            <div class="content-wrapper">

                

                 <!-- Contact Us section Start -->
                 <section class="contact-us-wrap ptb-100">
                    <div class="container">
                        
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8">
                                <div class="section-title style1 text-center mb-40">
                                    <span>Leave a Message<img src="{{asset('/siteassets/assets/img/section-shape.png')}}" alt="Image"></span>
                                    
                                </div>
                                <div class="contact-form">
                                    <form class="form-wrap" id="contactForm">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" name="name" placeholder="Name*" id="name"
                                                        required data-error="Please enter your name">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <input type="email" name="email" id="email" required
                                                        placeholder="Email*" data-error="Please enter your email">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <input type="email" name="phone" id="phone" required
                                                        placeholder="Phone*" data-error="Please enter your phone">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="form-group v1">
                                                    <textarea name="message" id="message" placeholder="Your Message.." cols="30" rows="10" required data-error="Please enter your message"></textarea>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="form-check checkbox">
                                                        <input
                                                            name="gridCheck"
                                                            value="I agree to the terms and privacy policy."
                                                            class="form-check-input"
                                                            type="checkbox"
                                                            id="gridCheck"
                                                            required
                                                        >
                                                        <label class="form-check-label" for="gridCheck">
                                                            I agree to the <a class="link style1" href="terms-of-service.html">Terms &amp; Conditions</a> and <a class="link style1" href="privacy-policy.html">Privacy Policy</a>
                                                        </label>
                                                        <div class="help-block with-errors gridCheck-error"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn style1 w-100 d-block">Send Message</button>
                                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="section-title style1 text-center mb-40">
                                    <span>Contact Us<img src="assets/img/section-shape.png" alt="Image"></span>
                                    
                                </div>
                                <div class="contact-item-wrap">
                                    <div class="contact-item">
                                        <h3>Our Address</h3>
                                        <p>6<sup>th</sup> Floor, Hill Plaza Building Ngong Road , Nairobi, Kenya</p>
                                    </div>
                                    <div class="contact-item">
                                        <h3>Postal Address</h3>
                                        <a href="#">P.O. Box 30028-00100 Kenya</a>
                                       
                                    </div>
                                    <div class="contact-item">
                                        <h3>Email Address</h3>
                                        <a href="mailto:
info.asdsp@kilimo.go.ke">
info.asdsp@kilimo.go.ke</a>
                                    </div>
                                    <div class="contact-item">
                                        <h3>Call</h3>
                                        <a href="tel:300 323 3456">300 323 3456</a>
                                        <a href="tel:tel:+254724256157">+254724256157</a>
                                    </div>
                                    <div class="contact-item">
                                        <h3>Follow us</h3>
                                        <ul class="social-profile style2 list-style">
                                            <li>
                                                <a href="https://facebook.com">
                                                    <i class="ri-facebook-fill"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://twitter.com">
                                                    <i class="ri-twitter-fill"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://instagram.com">
                                                    <i class="ri-instagram-line"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://linkedin.com">
                                                    <i class="ri-linkedin-fill"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Contact Us section End -->

            </div>
            <!-- Content wrapper end -->


@stop