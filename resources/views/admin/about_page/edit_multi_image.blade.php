@extends('admin.admin_master')
@section('admin_content')
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js') }}"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="text-center">Update Multi image</h4>
                            <hr>
                            <form method="post" action="{{ route('update.multi.image') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $editImage->id }}">
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">About Multi Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" placeholder="" name="multi_image"
                                            id="images">
                                    </div>
                                </div>
                                {{-- end row --}}
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label"> </label>

                                    <div class="col-sm-10">
                                        <img id="showImage" name="image" class="rounded avatar-lg" alt="200x200"
                                            src="{{ asset($editImage->multi_image) }}" data-holder-rendered="true">
                                    </div>
                                </div>{{-- end row --}}

                                <div class="row mb-3">
                                    <button class="btn btn-info" type="submit">Update Multi Image
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#images').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result); //attr=attribute
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection

{{-- <!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Rasalina - Personal Portfolio HTML Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/default.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
    </head>
    <body>

        <!-- preloader-start -->
        <div id="preloader">
            <div class="rasalina-spin-box"></div>
        </div>
        <!-- preloader-end -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
        <header>
            <div id="sticky-header" class="menu__area transparent-header">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="mobile__nav__toggler"><i class="fas fa-bars"></i></div>
                            <div class="menu__wrap">
                                <nav class="menu__nav">
                                    <div class="logo">
                                        <a href="index.html" class="logo__black"><img src="assets/img/logo/logo_black.png" alt=""></a>
                                        <a href="index.html" class="logo__white"><img src="assets/img/logo/logo_white.png" alt=""></a>
                                    </div>
                                    <div class="navbar__wrap main__menu d-none d-xl-flex">
                                        <ul class="navigation">
                                            <li><a href="index.html">Home</a></li>
                                            <li class="active"><a href="about.html">About</a></li>
                                            <li><a href="services-details.html">Services</a></li>
                                            <li class="menu-item-has-children"><a href="#">Portfolio</a>
                                                <ul class="sub-menu">
                                                    <li><a href="portfolio.html">Portfolio</a></li>
                                                    <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"><a href="#">Our Blog</a>
                                                <ul class="sub-menu">
                                                    <li><a href="blog.html">Our News</a></li>
                                                    <li><a href="blog-details.html">News Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">contact me</a></li>
                                        </ul>
                                    </div>
                                    <div class="header__btn d-none d-md-block">
                                        <a href="contact.html" class="btn">Contact me</a>
                                    </div>
                                </nav>
                            </div>
                            <!-- Mobile Menu  -->
                            <div class="mobile__menu">
                                <nav class="menu__box">
                                    <div class="close__btn"><i class="fal fa-times"></i></div>
                                    <div class="nav-logo">
                                        <a href="index.html" class="logo__black"><img src="assets/img/logo/logo_black.png" alt=""></a>
                                        <a href="index.html" class="logo__white"><img src="assets/img/logo/logo_white.png" alt=""></a>
                                    </div>
                                    <div class="menu__outer">
                                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                    </div>
                                    <div class="social-links">
                                        <ul class="clearfix">
                                            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                            <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                                            <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                            <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                            <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="menu__backdrop"></div>
                            <!-- End Mobile Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header-area-end -->

        <!-- main-area -->
        <main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb__wrap">
                <div class="container custom-container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-10">
                            <div class="breadcrumb__wrap__content">
                                <h2 class="title">About me</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">About Me</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="breadcrumb__wrap__icon">
                    <ul>
                        <li><img src="assets/img/icons/breadcrumb_icon01.png" alt=""></li>
                        <li><img src="assets/img/icons/breadcrumb_icon02.png" alt=""></li>
                        <li><img src="assets/img/icons/breadcrumb_icon03.png" alt=""></li>
                        <li><img src="assets/img/icons/breadcrumb_icon04.png" alt=""></li>
                        <li><img src="assets/img/icons/breadcrumb_icon05.png" alt=""></li>
                        <li><img src="assets/img/icons/breadcrumb_icon06.png" alt=""></li>
                    </ul>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- about-area -->
            <section class="about about__style__two">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about__image">
                                <img src="assets/img/images/about_img.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about__content">
                                <div class="section__title">
                                    <span class="sub-title">01 - About me</span>
                                    <h2 class="title">I have transform your ideas into remarkable digital products</h2>
                                </div>
                                <div class="about__exp">
                                    <div class="about__exp__icon">
                                        <img src="assets/img/icons/about_icon.png" alt="">
                                    </div>
                                    <div class="about__exp__content">
                                        <p><span>20+ Years Experience</span> In this game, Means <br> Product Designing</p>
                                    </div>
                                </div>
                                <p class="desc">I love to work in User Experience & User Interface designing. Because I love to solve the design problem and find easy and better solutions to solve it. I always try my best to make good user interface with the best user experience. I have been working as a UX Designer</p>
                                <a href="about.html" class="btn">Download my resume</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="about__info__wrap">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button"
                                            role="tab" aria-controls="about" aria-selected="true">About</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="skills-tab" data-bs-toggle="tab" data-bs-target="#skills" type="button"
                                            role="tab" aria-controls="skills" aria-selected="false">Skills</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="awards-tab" data-bs-toggle="tab" data-bs-target="#awards" type="button"
                                            role="tab" aria-controls="awards" aria-selected="false">awards</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="education-tab" data-bs-toggle="tab" data-bs-target="#education" type="button"
                                            role="tab" aria-controls="education" aria-selected="false">education</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                                        <p class="desc">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of lorem ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the lorem ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated lorem ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
                                        <ul class="about__exp__list">
                                            <li>
                                                <h5 class="title">User experience design - (Product Design)</h5>
                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to unseery.</p>
                                            </li>
                                            <li>
                                                <h5 class="title">Web and user interface design - Development</h5>
                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of lorem ipsum.</p>
                                            </li>
                                            <li>
                                                <h5 class="title">Interaction design - Animation</h5>
                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="skills" role="tabpanel" aria-labelledby="skills-tab">
                                        <div class="about__skill__wrap">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="about__skill__item">
                                                        <h5 class="title">Communication</h5>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"><span class="percentage">70%</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="about__skill__item">
                                                        <h5 class="title">Brain Storming</h5>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"><span class="percentage">90%</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="about__skill__item">
                                                        <h5 class="title">Resourcefulness</h5>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><span class="percentage">50%</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="about__skill__item">
                                                        <h5 class="title">Figma</h5>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"><span class="percentage">65%</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="about__skill__item">
                                                        <h5 class="title">Analytical Abilities</h5>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"><span class="percentage">80%</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="about__skill__item">
                                                        <h5 class="title">Skeatch</h5>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"><span class="percentage">45%</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="about__skill__item">
                                                        <h5 class="title">User Research</h5>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width: 55%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"><span class="percentage">55%</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="about__skill__item">
                                                        <h5 class="title">Adobe Tools</h5>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><span class="percentage">85%</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="awards" role="tabpanel" aria-labelledby="awards-tab">
                                        <div class="about__award__wrap">
                                            <div class="row justify-content-center">
                                                <div class="col-md-6 col-sm-9">
                                                    <div class="about__award__item">
                                                        <div class="award__logo">
                                                            <img src="assets/img/images/awards_01.png" alt="">
                                                        </div>
                                                        <div class="award__content">
                                                            <h5 class="title">Best ux designer award in 2002</h5>
                                                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-9">
                                                    <div class="about__award__item">
                                                        <div class="award__logo">
                                                            <img src="assets/img/images/awards_02.png" alt="">
                                                        </div>
                                                        <div class="award__content">
                                                            <h5 class="title">BBA final examination 2001</h5>
                                                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-9">
                                                    <div class="about__award__item">
                                                        <div class="award__logo">
                                                            <img src="assets/img/images/awards_03.png" alt="">
                                                        </div>
                                                        <div class="award__content">
                                                            <h5 class="title">User research award 2020</h5>
                                                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-9">
                                                    <div class="about__award__item">
                                                        <div class="award__logo">
                                                            <img src="assets/img/images/awards_04.png" alt="">
                                                        </div>
                                                        <div class="award__content">
                                                            <h5 class="title">Dsigning award 2021</h5>
                                                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                                        <div class="about__education__wrap">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="about__education__item">
                                                        <h3 class="title">DPR Engineering Dhaka University</h3>
                                                        <span class="date">2004 – 2016</span>
                                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                                                        alteration in some form, by injected humour.</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="about__education__item">
                                                        <h3 class="title">Product Designer at google</h3>
                                                        <span class="date">2021 – Present</span>
                                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,There are many variations of passages of Lorem Ipsum available.</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="about__education__item">
                                                        <h3 class="title">Computer Science - england</h3>
                                                        <span class="date">2008 – 2012</span>
                                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,There are many variations of passages of Lorem Ipsum available.</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="about__education__item">
                                                        <h3 class="title">Pro product design with udemey</h3>
                                                        <span class="date">2016 - 2020</span>
                                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                                                        alteration in some form, by injected humour.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- about-area-end -->

            <!-- services-area -->
            <section class="services__style__two">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8">
                            <div class="section__title text-center">
                                <span class="sub-title">02 - my Services</span>
                                <h2 class="title">Provide awesome service</h2>
                            </div>
                        </div>
                    </div>
                    <div class="services__style__two__wrap">
                        <div class="row gx-0">
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="services__style__two__item">
                                    <div class="services__style__two__icon">
                                        <img src="assets/img/icons/services_light_icon01.png" alt="">
                                    </div>
                                    <div class="services__style__two__content">
                                        <h3 class="title"><a href="services-details.html">Business Strategy</a></h3>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority.</p>
                                        <a href="services-details.html" class="services__btn"><i class="far fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="services__style__two__item">
                                    <div class="services__style__two__icon">
                                        <img src="assets/img/icons/services_light_icon02.png" alt="">
                                    </div>
                                    <div class="services__style__two__content">
                                        <h3 class="title"><a href="services-details.html">Visual Design</a></h3>
                                        <p>Strategy is a forward-looking plan for your brand’s behavior.Strategy is a forward-looking plan.</p>
                                        <a href="services-details.html" class="services__btn"><i class="far fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="services__style__two__item">
                                    <div class="services__style__two__icon">
                                        <img src="assets/img/icons/services_light_icon03.png" alt="">
                                    </div>
                                    <div class="services__style__two__content">
                                        <h3 class="title"><a href="services-details.html">Product Design</a></h3>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority.</p>
                                        <a href="services-details.html" class="services__btn"><i class="far fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="services__style__two__item">
                                    <div class="services__style__two__icon">
                                        <img src="assets/img/icons/services_light_icon05.png" alt="">
                                    </div>
                                    <div class="services__style__two__content">
                                        <h3 class="title"><a href="services-details.html">Animation</a></h3>
                                        <p>Strategy is a forward-looking plan for your brand’s behavior.Strategy is a forward-looking plan.</p>
                                        <a href="services-details.html" class="services__btn"><i class="far fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="services__style__two__item">
                                    <div class="services__style__two__icon">
                                        <img src="assets/img/icons/services_light_icon06.png" alt="">
                                    </div>
                                    <div class="services__style__two__content">
                                        <h3 class="title"><a href="services-details.html">Marketing</a></h3>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority.</p>
                                        <a href="services-details.html" class="services__btn"><i class="far fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="services__style__two__item">
                                    <div class="services__style__two__icon">
                                        <img src="assets/img/icons/services_light_icon05.png" alt="">
                                    </div>
                                    <div class="services__style__two__content">
                                        <h3 class="title"><a href="services-details.html">Brand strategy</a></h3>
                                        <p>Strategy is a forward-looking plan for your brand’s behavior.Strategy is a forward-looking plan.</p>
                                        <a href="services-details.html" class="services__btn"><i class="far fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="services__style__two__item">
                                    <div class="services__style__two__icon">
                                        <img src="assets/img/icons/services_light_icon04.png" alt="">
                                    </div>
                                    <div class="services__style__two__content">
                                        <h3 class="title"><a href="services-details.html">Graphic Design</a></h3>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority.</p>
                                        <a href="services-details.html" class="services__btn"><i class="far fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="services__style__two__item">
                                    <div class="services__style__two__icon">
                                        <img src="assets/img/icons/services_light_icon07.png" alt="">
                                    </div>
                                    <div class="services__style__two__content">
                                        <h3 class="title"><a href="services-details.html">Visual Design</a></h3>
                                        <p>Strategy is a forward-looking plan for your brand’s behavior.Strategy is a forward-looking plan.</p>
                                        <a href="services-details.html" class="services__btn"><i class="far fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- services-area-end -->

            <!-- testimonial-area -->
            <section class="testimonial testimonial__style__two">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-11">
                            <div class="testimonial__wrap">
                                <div class="section__title text-center">
                                    <span class="sub-title">06 - Client Feedback</span>
                                    <h2 class="title">Some happy clients feedback</h2>
                                </div>
                                <div class="testimonial__two__active">
                                    <div class="testimonial__item">
                                        <div class="testimonial__icon">
                                            <i class="fas fa-quote-left"></i>
                                        </div>
                                        <div class="testimonial__content">
                                            <p>We are motivated by the satisfaction of our clients. Put your trust in us &share in our H.Spond Asset Management is made up of a team of expert, committed and experienced people with a passion for financial markets. Our goal is to achieve continuous.</p>
                                            <div class="testimonial__avatar">
                                                <span>WPBakery/ uSA</span>
                                                <div class="testi__avatar__img">
                                                    <img src="assets/img/images/testi_avatar01.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial__item">
                                        <div class="testimonial__icon">
                                            <i class="fas fa-quote-left"></i>
                                        </div>
                                        <div class="testimonial__content">
                                            <p>We are motivated by the satisfaction of our clients. Put your trust in us &share in our H.Spond Asset Management is made up of a team of expert, committed and experienced people with a passion for financial markets. Our goal is to achieve continuous.</p>
                                            <div class="testimonial__avatar">
                                                <span>Adobe Photoshop</span>
                                                <div class="testi__avatar__img">
                                                    <img src="assets/img/images/testi_avatar02.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial__arrow"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial__two__icons">
                    <ul>
                        <li><img src="assets/img/icons/testi_shape01.png" alt=""></li>
                        <li><img src="assets/img/icons/testi_shape02.png" alt=""></li>
                        <li><img src="assets/img/icons/testi_shape03.png" alt=""></li>
                        <li><img src="assets/img/icons/testi_shape04.png" alt=""></li>
                        <li><img src="assets/img/icons/testi_shape05.png" alt=""></li>
                        <li><img src="assets/img/icons/testi_shape06.png" alt=""></li>
                    </ul>
                </div>
            </section>
            <!-- testimonial-area-end -->

            <!-- blog-area -->
            <section class="blog blog__style__two">
                <div class="container">
                    <div class="row gx-0 justify-content-center">
                        <div class="col-lg-4 col-md-6 col-sm-9">
                            <div class="blog__post__item">
                                <div class="blog__post__thumb">
                                    <a href="blog-details.html"><img src="assets/img/blog/blog_post_thumb01.jpg" alt=""></a>
                                    <div class="blog__post__tags">
                                        <a href="blog.html">Story</a>
                                    </div>
                                </div>
                                <div class="blog__post__content">
                                    <span class="date">13 january 2021</span>
                                    <h3 class="title"><a href="blog-details.html">Facebook design is dedicated to what's new in design</a></h3>
                                    <a href="blog-details.html" class="read__more">Read mORe</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-9">
                            <div class="blog__post__item">
                                <div class="blog__post__thumb">
                                    <a href="blog-details.html"><img src="assets/img/blog/blog_post_thumb02.jpg" alt=""></a>
                                    <div class="blog__post__tags">
                                        <a href="blog.html">Social</a>
                                    </div>
                                </div>
                                <div class="blog__post__content">
                                    <span class="date">13 january 2021</span>
                                    <h3 class="title"><a href="blog-details.html">Make communication Fast and Effectively.</a></h3>
                                    <a href="blog-details.html" class="read__more">Read mORe</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-9">
                            <div class="blog__post__item">
                                <div class="blog__post__thumb">
                                    <a href="blog-details.html"><img src="assets/img/blog/blog_post_thumb03.jpg" alt=""></a>
                                    <div class="blog__post__tags">
                                        <a href="blog.html">Work</a>
                                    </div>
                                </div>
                                <div class="blog__post__content">
                                    <span class="date">13 january 2021</span>
                                    <h3 class="title"><a href="blog-details.html">How to increase your productivity at work - 2021</a></h3>
                                    <a href="blog-details.html" class="read__more">Read mORe</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog__button text-center">
                        <a href="blog.html" class="btn">more blog</a>
                    </div>
                </div>
            </section>
            <!-- blog-area-end -->

            <!-- contact-area -->
            <section class="homeContact">
                <div class="container">
                    <div class="homeContact__wrap">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="section__title">
                                    <span class="sub-title">07 - Say hello</span>
                                    <h2 class="title">Any questions? Feel free <br> to contact</h2>
                                </div>
                                <div class="homeContact__content">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                                    <h2 class="mail"><a href="mailto:Info@webmail.com">Info@webmail.com</a></h2>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="homeContact__form">
                                    <form action="#">
                                        <input type="text" placeholder="Enter name*">
                                        <input type="email" placeholder="Enter mail*">
                                        <input type="number" placeholder="Enter number*">
                                        <textarea name="message" placeholder="Enter Massage*"></textarea>
                                        <button type="submit">Send Message</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

        </main>
        <!-- main-area-end -->



        <!-- Footer-area -->
        <footer class="footer">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-4">
                        <div class="footer__widget">
                            <div class="fw-title">
                                <h5 class="sub-title">Contact us</h5>
                                <h4 class="title">+81383 766 284</h4>
                            </div>
                            <div class="footer__widget__text">
                                <p>There are many variations of passages of lorem ipsum
                                available but the majority have suffered alteration
                                in some form is also here.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="footer__widget">
                            <div class="fw-title">
                                <h5 class="sub-title">my address</h5>
                                <h4 class="title">AUSTRALIA</h4>
                            </div>
                            <div class="footer__widget__address">
                                <p>Level 13, 2 Elizabeth Steereyt set <br> Melbourne, Victoria 3000</p>
                                <a href="mailto:noreply@envato.com" class="mail">noreply@envato.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="footer__widget">
                            <div class="fw-title">
                                <h5 class="sub-title">Follow me</h5>
                                <h4 class="title">socially connect</h4>
                            </div>
                            <div class="footer__widget__social">
                                <p>Lorem ipsum dolor sit amet enim. <br> Etiam ullamcorper.</p>
                                <ul class="footer__social__list">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright__wrap">
                    <div class="row">
                        <div class="col-12">
                            <div class="copyright__text text-center">
                                <p>Copyright @ Theme_Pure 2021 All right Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer-area-end -->




		<!-- JS here -->
        <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/isotope.pkgd.min.js"></script>
        <script src="assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/element-in-view.js"></script>
        <script src="assets/js/slick.min.js"></script>
        <script src="assets/js/ajax-form.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html> --}}
