@extends('frontend.main')
@section('content')

 <div class="content-wrapper">

                <!-- Breadcrumb Start -->
                <div class="breadcrumb-wrap"  style="background-color: darkgreen;">
                    <div class="container">
                        <div class="breadcrumb-title">
                            <h2>Frequently Asked Questions</h2>
                            <ul class="breadcrumb-menu list-style">
                                <li><a href="{{url('/')}}">Home </a></li>
                                <li>FAQ</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Breadcrumb End -->

                <!-- FAQ Section start -->
                <section class="faq-wrap pt-100 pb-75">
                    <div class="container">
                        <div class="row gx-5">
                            <div class="col-lg-6">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                aria-expanded="true" aria-controls="collapseOne">
                                                <span>
                                                    <i class="ri-arrow-down-s-line plus"></i>
                                                    <i class="ri-arrow-up-s-line minus"></i>
                                                </span>
                                                Who is a value chain actor?
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="single-product-text">
                                                    <p>A value chain actor is a ...</p>
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                <span>
                                                    <i class="ri-arrow-down-s-line plus"></i>
                                                    <i class="ri-arrow-up-s-line minus"></i>
                                                </span>
                                                What is a value chain organisation?
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse "
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>A value chain organisation is a ..</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                <span>
                                                    <i class="ri-arrow-down-s-line plus"></i>
                                                    <i class="ri-arrow-up-s-line minus"></i>
                                                </span>
                                               What is a Climate Smart Agriculture (CSA) innovation?
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>It is </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="accordion" id="accordionExample_two">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading_One">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse_One"
                                                aria-expanded="false" aria-controls="collapse_One">
                                                <span>
                                                    <i class="ri-arrow-down-s-line plus"></i>
                                                    <i class="ri-arrow-up-s-line minus"></i>
                                                </span>
                                                What is a Going Green (GG) innovation?
                                            </button>
                                        </h2>
                                        <div id="collapse_One" class="accordion-collapse collapse"
                                            aria-labelledby="heading_one" data-bs-parent="#accordionExample_two">
                                            <div class="accordion-body">
                                                <div class="single-product-text">
                                                    <p>A GG</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading_Two">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse_Two"
                                                aria-expanded="false" aria-controls="collapse_Two">
                                                <span>
                                                    <i class="ri-arrow-down-s-line plus"></i>
                                                    <i class="ri-arrow-up-s-line minus"></i>
                                                </span>
                                               When would the ASDSP II Project be ending?
                                            </button>
                                        </h2>
                                        <div id="collapse_Two" class="accordion-collapse collapse "
                                            aria-labelledby="heading_Two" data-bs-parent="#accordionExample_two">
                                            <div class="accordion-body">
                                                <p>The ASDSP Project...</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading_Three">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse_Three"
                                                aria-expanded="false" aria-controls="collapse_Three">
                                                <span>
                                                    <i class="ri-arrow-down-s-line plus"></i>
                                                    <i class="ri-arrow-up-s-line minus"></i>
                                                </span>
                                               How can I register to be a beneficiary of the project?
                                            </button>
                                        </h2>
                                        <div id="collapse_Three" class="accordion-collapse collapse"
                                            aria-labelledby="heading_Three" data-bs-parent="#accordionExample_two">
                                            <div class="accordion-body">
                                                <p>Registration process...</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading_four">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse_four"
                                                aria-expanded="true" aria-controls="collapse_four">
                                                <span>
                                                    <i class="ri-arrow-down-s-line plus"></i>
                                                    <i class="ri-arrow-up-s-line minus"></i>
                                                </span>
                                               How can I track progress of the project as a value chain actor?
                                            </button>
                                        </h2>
                                        <div id="collapse_four" class="accordion-collapse collapse "
                                            aria-labelledby="heading_four" data-bs-parent="#accordionExample_two">
                                            <div class="accordion-body">
                                                <div class="single-product-text">
                                                    <p>Lorem ipsum dolor sit amet consec tetur adipisicing elit. Quisquam sit laborum est aliquam. Dicta fuga soluta eius exercitationem porro modi. Exercitationem eveniet aliquam repudiandae sequi.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading_five">
                                            <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse_five"
                                            aria-expanded="true" aria-controls="collapse_five">
                                                <span>
                                                    <i class="ri-arrow-down-s-line plus"></i>
                                                    <i class="ri-arrow-up-s-line minus"></i>
                                                </span>
                                                How can my produce benefit from the market linkags that the project is offering?
                                            </button>
                                        </h2>
                                        <div id="collapse_five" class="accordion-collapse collapse "
                                            aria-labelledby="heading_five" data-bs-parent="#accordionExample_two">
                                            <div class="accordion-body">
                                                <div class="single-product-text">
                                                    <p>Lorem ipsum dolor sit amet consec tetur adipisicing elit. Quisquam sit laborum est aliquam. Dicta fuga soluta eius exercitationem porro modi. Exercitationem eveniet aliquam repudiandae sequi.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- FAQ Section end -->

            </div>


@stop