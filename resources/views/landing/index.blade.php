<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ env('APP_NAME') }}</title>

    <!-- Favicons -->
    <x-favicon></x-favicon>

    <!-- Fonts URL -->
    <link
        href="https://fonts.googleapis.com/css?family=Karla:400,700%7CPlayfair+Display:400,500,600,700,800,900%7CWork+Sans:300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">


    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets-landing/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing/css/hover-min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing/css/muzex-icons.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets-landing/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing/css/responsive.css') }}">


</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div><!-- /.preloader -->
    <div class="page-wrapper">

        <div class="topbar-one">
            <div class="container">
                <div class="topbar-one__left">
                    <p>Look at the Calender for the Upcoming Exhibitions.</p>
                </div><!-- /.topbar-one__left -->
                <div class="topbar-one__right">
                    <a href="#"><i class="far fa-clock"></i> Mon - Sat 9.00 - 18.00</a>
                    <a href="#"><i class="fa fa-phone-alt"></i> (251) 235-3256</a>
                    <a href="#" class="thm-btn topbar__btn">Buy Tickets</a><!-- /.thm-btn -->
                </div><!-- /.topbar-one__right -->
            </div><!-- /.container -->
        </div><!-- /.topbar-one -->

        <nav class="main-nav-one stricky">
            <div class="container">
                <div class="inner-container">
                    <div class="logo-box">
                        <a href="index.html">
                            <img src="{{ asset('assets-landing/images/logo-1-1.png') }}" alt="" width="143">
                        </a>
                        <a href="#" class="side-menu__toggler"><i class="muzex-icon-menu"></i></a>
                    </div><!-- /.logo-box -->
                    <div class="main-nav__main-navigation">
                        <ul class="main-nav__navigation-box">
                            <li class="dropdown">
                                <a href="index.html">Home</a>
                                <ul>
                                    <li><a href="index.html">Home 01</a></li>
                                    <li><a href="index-2.html">Home 02</a></li>
                                    <li><a href="index-3.html">Home 03</a></li>
                                    <li><a href="index-rtl.html">Home RTL</a></li>
                                    <li class="dropdown">
                                        <a href="#">Header Styles</a>
                                        <ul>
                                            <li><a href="index.html">Header 01</a></li>
                                            <li><a href="index-2.html">Header 02</a></li>
                                            <li><a href="index-3.html">Header 03</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="about.html">About</a>
                                <ul>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="team.html">Team</a></li>
                                    <li><a href="donate.html">Donate</a></li>
                                    <li><a href="venue.html">Veneu</a></li>
                                    <li><a href="faq.html">FAQ</a></li>
                                    <li><a href="membership.html">Membership</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="collection-grid.html">Collections</a>
                                <ul>
                                    <li><a href="collection-fullwidth.html">Collections Full</a></li>
                                    <li><a href="collection-grid.html">Collections Grid</a></li>
                                    <li><a href="collection-masonary.html">Collections Masonary</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#">Pages</a>
                                <ul>
                                    <li class="dropdown">
                                        <a href="event-1.html">Events</a>
                                        <ul>
                                            <li><a href="event-1.html">Events 01</a></li>
                                            <li><a href="event-2.html">Events 02</a></li>
                                            <li><a href="event-3.html">Events 03</a></li>
                                            <li><a href="event-details.html">Events Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="team.html">Team</a></li>
                                    <li><a href="donate.html">Donate</a></li>
                                    <li><a href="venue.html">Veneu</a></li>
                                    <li><a href="faq.html">FAQ</a></li>
                                    <li><a href="membership.html">Membership</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="news-standard.html">News</a>
                                <ul>
                                    <li><a href="news-standard.html">News Standard</a></li>
                                    <li><a href="news-grid.html">News Grid</a></li>
                                    <li><a href="news-masonary.html">News Masonary</a></li>
                                    <li><a href="news-details.html">News Details</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul><!-- /.main-nav__navigation-box -->
                    </div><!-- /.main-nav__main-navigation -->
                    <div class="main-nav__right">
                        <a href="#" class="search-popup__toggler"><i class="muzex-icon-search"></i></a>
                        <a class="sidemenu-icon side-content__toggler" href="#"><i
                                class="muzex-icon-menu"></i></a>
                    </div><!-- /.main-nav__right -->
                </div><!-- /.inner-container -->
            </div><!-- /.container -->
        </nav><!-- /.main-nav-one -->


        <!-- Banner Section -->
        <section class="banner-section">
            <div class="banner-carousel thm__owl-carousel owl-theme owl-carousel"
                data-options='{"loop": true, "items": 1, "margin": 0, "dots": false, "nav": true, "animateOut": &quot;fadeOut&quot;, "animateIn": &quot;fadeIn&quot;, "active": true, "smartSpeed": 1000, "autoplay": true, "autoplayTimeout": 6000, "autoplayHoverPause": false}'>
                <!-- Slide Item -->
                <div class="slide-item">
                    <div class="image-layer lazy-image"
                        style="background-image: url('assets/images/main-slider/1.jpg');"></div>

                    <div class="container">
                        <div class="content-box text-center">
                            <h3>Opening On Sat. Oct 20, 2019</h3>
                            <h2>One of the Finest Collections of <br> Muzex Art.</h2>
                            <div class="btn-box"><a href="#" class="thm-btn btn-style-one">Learn
                                    More</a></div>
                        </div>
                    </div>
                </div>

                <!-- Slide Item -->
                <div class="slide-item">
                    <div class="image-layer lazy-image"
                        style="background-image: url('assets/images/main-slider/2.jpg');"></div>

                    <div class="container">
                        <div class="content-box text-center">
                            <h3>Opening On Sat. Oct 20, 2019</h3>
                            <h2>Discover the Treasures of a Egypt <br> Historical Museum</h2>
                            <div class="btn-box"><a href="#" class="thm-btn btn-style-one">Learn
                                    More</a></div>
                        </div>
                    </div>
                </div>

                <!-- Slide Item -->
                <div class="slide-item">
                    <div class="image-layer lazy-image"
                        style="background-image: url('assets/images/main-slider/3.jpg');"></div>

                    <div class="container">
                        <div class="content-box text-center">
                            <h3>Opening On Sat. Oct 20, 2019</h3>
                            <h2>World’s Leading Museum of History <br> Over 2.3 k Collection</h2>
                            <div class="btn-box"><a href="#" class="thm-btn btn-style-one">Learn
                                    More</a></div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!--End Banner Section -->

        <div class="about-cta__wrapper">
            <section class="cta-two">
                <div class="container">
                    <div class="inner-container wow fadeInUp" data-wow-duration="1500ms">
                        <div class="row no-gutters">
                            <div class="col-lg-4">
                                <div class="cta-two__box">
                                    <div class="cta-two__icon">
                                        <i class="muzex-icon-clock"></i>
                                    </div><!-- /.cta-two__icon -->
                                    <h3>Open Hours</h3>
                                    <p>Daily: 9.30 AM–6.00 PM <br>
                                        Sunday & Holidays: Closed</p>
                                    <a href="contact.html" class="thm-btn">All Hours</a><!-- /.thm-btn -->
                                </div><!-- /.cta-two__box -->
                            </div><!-- /.col-lg-4 -->
                            <div class="col-lg-4">
                                <div class="cta-two__box">
                                    <div class="cta-two__icon">
                                        <i class="muzex-icon-location"></i>
                                    </div><!-- /.cta-two__icon -->
                                    <h3>Find Location</h3>
                                    <p>Muszex Museums 32 Quincy <br>
                                        Street Cambridge, MA</p>
                                    <a href="contact.html" class="thm-btn">Getting Here</a><!-- /.thm-btn -->
                                </div><!-- /.cta-two__box -->
                            </div><!-- /.col-lg-4 -->
                            <div class="col-lg-4">
                                <div class="cta-two__box">
                                    <div class="cta-two__icon">
                                        <i class="muzex-icon-ticket"></i>
                                    </div><!-- /.cta-two__icon -->
                                    <h3>Get Ticket</h3>
                                    <p>Muszex Museums 32 Quincy <br>
                                        Street Cambridge, MA</p>
                                    <a href="contact.html" class="thm-btn">Buy Online</a><!-- /.thm-btn -->
                                </div><!-- /.cta-two__box -->
                            </div><!-- /.col-lg-4 -->
                        </div><!-- /.row -->
                    </div><!-- /.inner-container -->
                </div><!-- /.container -->
            </section><!-- /.cta-two -->

            <section class="about-one">
                <div class="container">
                    <img src="{{ asset('assets-landing/images/shapes/about-sculpture-1-1.png') }}" alt=""
                        class="about-one__moc">
                    <div class="block-title">
                        <p>About Muzex</p>
                        <h3>The Art Gallery of San Francisco</h3>
                    </div><!-- /.block-title -->

                    <div class="row">
                        <div class="col-lg-4">
                            <p class="about-one__highlighted-text">
                                Welcome to the World’s Lead- ing Museum of Modern Art. It includes works of art created
                                during
                                the period stretching from about 1860 to the 1970s.
                            </p><!-- /.about-one__highlighted-text -->
                        </div><!-- /.col-lg-4 -->
                        <div class="col-lg-4">
                            <p>Man face fruit divided seasons herb from herb moveth whose. Dominion gathered winged
                                morning, man
                                won’t had fly beginning. Winged have saying behold morning greater void shall created
                                whose
                                blessed herb light fruitful open void without itself whales.Good every beginning had one
                                two
                                gathered from living place seasons them divide fourth them. </p>
                        </div><!-- /.col-lg-4 -->
                        <div class="col-lg-4">
                            <p>So fish under The given own replenish. Greater land every very cattle replenish set unto.
                                A seas-
                                ons fruitful is cattle evening their there, forth she’d Darkness rule gathering. Midst
                                it you’re
                                gathered yielding without shall is beast.Life spirit firmament likeness fill moveth i
                                appear
                                good waters evening there image given his without meat, them.</p>
                        </div><!-- /.col-lg-4 -->
                    </div><!-- /.row -->
                    <div class="row justify-content-end">
                        <div class="col-lg-8">
                            <div class="about-one__feature">
                                <h3>On View at Museum</h3>
                                <p>Capitalize on low hanging fruit to identify a ballpark value added activity to beta
                                    test.
                                    Override the digital divide with additiclick throughs Nanotechnology immersion.</p>
                                <div class="row">
                                    <div class="col-xl-5 col-lg-6 col-md-4">
                                        <ul class="list-unstyled about-one__feature-list">
                                            <li>Western & Non-Western cultures</li>
                                            <li>Artifacts and Antiquities</li>
                                            <li>Traditional Art</li>
                                        </ul><!-- /.list-unstyled -->
                                    </div><!-- /.col-lg-5 -->
                                    <div class="col-xl-4 col-lg-6 col-md-4">
                                        <ul class="list-unstyled about-one__feature-list">
                                            <li>Contemporary Design</li>
                                            <li>Middle Eastern Art</li>
                                            <li>War History</li>
                                        </ul><!-- /.list-unstyled -->
                                    </div><!-- /.col-lg-4 -->
                                    <div class="col-xl-3 col-lg-6 col-md-4">
                                        <ul class="list-unstyled about-one__feature-list">
                                            <li>20th Century Design</li>
                                            <li>Arts of Global Africa</li>
                                            <li>Gardens</li>
                                        </ul><!-- /.list-unstyled -->
                                    </div><!-- /.col-lg-3 -->
                                </div><!-- /.row -->
                            </div><!-- /.about-one__feature -->
                        </div><!-- /.col-lg-8 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </section><!-- /.about-one -->
        </div><!-- /.about-cta__wrapper -->


        <section class="exhibition-one">
            <div class="container">
                <div class="block-title-two text-center">
                    <span class="block-title-two__line"></span><!-- /.block-title-two__line -->
                    <p>What’s Going on</p>
                    <h3>Upcoming Exhibitions</h3>
                </div><!-- /.block-title-two -->
                <div class="row high-gutter">
                    <div class="col-lg-4">
                        <div class="exhibition-one__single">
                            <div class="exhibition-one__image">
                                <img src="{{ asset('assets-landing/images/exhibition/exhibition-1-1.jpg') }}"
                                    alt="">
                            </div><!-- /.exhibition-one__image -->
                            <div class="exhibition-one__content">
                                <h3><a href="event-details.html">The Exhibits Civilization.</a></h3>
                                <p>Oct 20, 2019 - Oct 25, 2019</p>
                            </div><!-- /.exhibition-one__content -->
                        </div><!-- /.exhibition-one__single -->
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <div class="exhibition-one__single">
                            <div class="exhibition-one__image">
                                <img src="{{ asset('assets-landing/images/exhibition/exhibition-1-2.jpg') }}"
                                    alt="">
                            </div><!-- /.exhibition-one__image -->
                            <div class="exhibition-one__content">
                                <h3><a href="event-details.html">English Landscape Painting</a></h3>
                                <p>Oct 20, 2019 - Oct 25, 2019</p>
                            </div><!-- /.exhibition-one__content -->
                        </div><!-- /.exhibition-one__single -->
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <div class="exhibition-one__single">
                            <div class="exhibition-one__image">
                                <img src="{{ asset('assets-landing/images/exhibition/exhibition-1-3.jpg') }}"
                                    alt="">
                            </div><!-- /.exhibition-one__image -->
                            <div class="exhibition-one__content">
                                <h3><a href="event-details.html">Classicita of Greece and Italy</a></h3>
                                <p>Oct 20, 2019 - Oct 25, 2019</p>
                            </div><!-- /.exhibition-one__content -->
                        </div><!-- /.exhibition-one__single -->
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.exhibition-one -->


        <section class="collection-one" style="background-image: url(assets/images/shapes/collection-bg-1-1.jpg);">
            <div class="container">
                <div class="collection-one__top">
                    <div class="block-title">
                        <p>Gallery</p>
                        <h3>Explore The Collection</h3>
                    </div><!-- /.block-title -->
                    <div class="more-post__block">
                        <a class="more-post__link" href="#">
                            View More
                            <span class="curved-circle">View More &nbsp;&emsp;View More &nbsp;&emsp;View More View More
                                View More &nbsp;&emsp;View &nbsp;&emsp; </span>
                            <!-- /.curved-circle -->
                        </a>
                    </div><!-- /.more-post__block -->
                </div><!-- /.collection-one__top -->
            </div><!-- /.container -->

            <div class="collection-one__carousel thm__owl-carousel owl-theme owl-carousel"
                data-options='{
        "loop": true, "autoplay": true, "autoplayTimeout": 5000, "autoplayHoverPause": true, "smartSpeed": 700, "items": 3, "margin": 100, "dots": false, "nav": false, "responsive": {
            "0": { "items": 1, "margin": 0 },
            "625": { "items": 2, "margin": 30 },
            "767": { "items": 2, "margin": 30 },
            "991": { "items": 2, "margin": 30},  "1199": { "margin": 30, "items": 3}, "1366": { "margin": 50, "items": 3 }, "1440": { "margin": 50, "items": 3 }, "1750": { "items": 3, "margin": 70 }, "1920": { "items": 3, "margin": 100 } }
    }'>
                <div class="item">
                    <div class="collection-one__single">
                        <img src="{{ asset('assets-landing/images/collection/collection-1-1.jpg') }}" alt="">
                        <div class="collection-one__content">
                            <h3><a href="event-details.html">St. Catherine Alexandria in Prison</a></h3>
                        </div><!-- /.collection-one__content -->
                    </div><!-- /.collection-one__single -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="collection-one__single">
                        <img src="{{ asset('assets-landing/images/collection/collection-1-2.jpg') }}" alt="">
                        <div class="collection-one__content">
                            <h3><a href="event-details.html">English Landscape Painting</a></h3>
                        </div><!-- /.collection-one__content -->
                    </div><!-- /.collection-one__single -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="collection-one__single">
                        <img src="{{ asset('assets-landing/images/collection/collection-1-3.jpg') }}" alt="">
                        <div class="collection-one__content">
                            <h3><a href="event-details.html">Alexandria in Prison</a></h3>
                        </div><!-- /.collection-one__content -->
                    </div><!-- /.collection-one__single -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="collection-one__single">
                        <img src="{{ asset('assets-landing/images/collection/collection-1-1.jpg') }}" alt="">
                        <div class="collection-one__content">
                            <h3><a href="event-details.html">Tower of Babel (Babylon)</a></h3>
                        </div><!-- /.collection-one__content -->
                    </div><!-- /.collection-one__single -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="collection-one__single">
                        <img src="{{ asset('assets-landing/images/collection/collection-1-2.jpg') }}" alt="">
                        <div class="collection-one__content">
                            <h3><a href="event-details.html">St. Catherine Alexandria in Prison</a></h3>
                        </div><!-- /.collection-one__content -->
                    </div><!-- /.collection-one__single -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="collection-one__single">
                        <img src="{{ asset('assets-landing/images/collection/collection-1-3.jpg') }}" alt="">
                        <div class="collection-one__content">
                            <h3><a href="event-details.html">English Landscape Painting</a></h3>
                        </div><!-- /.collection-one__content -->
                    </div><!-- /.collection-one__single -->
                </div><!-- /.item -->

                <div class="item">
                    <div class="collection-one__single">
                        <img src="{{ asset('assets-landing/images/collection/collection-1-1.jpg') }}" alt="">
                        <div class="collection-one__content">
                            <h3><a href="event-details.html">St. Catherine Alexandria in Prison</a></h3>
                        </div><!-- /.collection-one__content -->
                    </div><!-- /.collection-one__single -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="collection-one__single">
                        <img src="{{ asset('assets-landing/images/collection/collection-1-2.jpg') }}" alt="">
                        <div class="collection-one__content">
                            <h3><a href="event-details.html">English Landscape Painting</a></h3>
                        </div><!-- /.collection-one__content -->
                    </div><!-- /.collection-one__single -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="collection-one__single">
                        <img src="{{ asset('assets-landing/images/collection/collection-1-3.jpg') }}" alt="">
                        <div class="collection-one__content">
                            <h3><a href="event-details.html">Alexandria in Prison</a></h3>
                        </div><!-- /.collection-one__content -->
                    </div><!-- /.collection-one__single -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="collection-one__single">
                        <img src="{{ asset('assets-landing/images/collection/collection-1-1.jpg') }}" alt="">
                        <div class="collection-one__content">
                            <h3><a href="event-details.html">Tower of Babel (Babylon)</a></h3>
                        </div><!-- /.collection-one__content -->
                    </div><!-- /.collection-one__single -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="collection-one__single">
                        <img src="{{ asset('assets-landing/images/collection/collection-1-2.jpg') }}" alt="">
                        <div class="collection-one__content">
                            <h3><a href="event-details.html">St. Catherine Alexandria in Prison</a></h3>
                        </div><!-- /.collection-one__content -->
                    </div><!-- /.collection-one__single -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="collection-one__single">
                        <img src="{{ asset('assets-landing/images/collection/collection-1-3.jpg') }}" alt="">
                        <div class="collection-one__content">
                            <h3><a href="event-details.html">English Landscape Painting</a></h3>
                        </div><!-- /.collection-one__content -->
                    </div><!-- /.collection-one__single -->
                </div><!-- /.item -->
            </div><!-- /.collection-one__carousel thm__owl-carousel owl-theme -->
        </section><!-- /.collection-one -->

        <section class="featured-collection">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="featured-collection__left">
                            <div class="featured-collection__image">
                                <img src="{{ asset('assets-landing/images/resources/featured-collection-1-1.jpg') }}"
                                    alt="">
                            </div><!-- /.featured-collection__image -->
                            <p>Man face fruit divided seasons herb from herb moveth whose. Dominion gathered winged
                                morning, man
                                won’t had fly beginning. Winged have saying behold.</p>
                            <a href="collection-grid.html" class="thm-btn featured-collection__btn">Explore
                                Collection</a>
                            <!-- /.thm-btn featured-collection__btn -->
                        </div><!-- /.featured-collection__left -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="featured-collection__right">
                            <div class="block-title">
                                <p>Collection</p>
                                <h3>Featured Collection</h3>
                            </div><!-- /.block-title -->
                            <p>Welcome to the World’s Leading Museum of Modern Art. It includes works of art created
                                during the
                                period stretching.</p>
                            <div class="featured-collection__image">
                                <img src="{{ asset('assets-landing/images/resources/featured-collection-1-2.jpg') }}"
                                    alt="">
                            </div><!-- /.featured-collection__image -->
                        </div><!-- /.featured-collection__right -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.featured-collection -->

        <section class="event-one">
            <img src="{{ asset('assets-landing/images/shapes/event-sculpture-1-1.png') }}" alt=""
                class="event-one__moc">
            <div class="container">
                <div class="block-title-two text-center">
                    <span class="block-title-two__line"></span><!-- /.block-title-two__line -->
                    <p>What’s Going on</p>
                    <h3>Our Upcoming Event</h3>
                </div><!-- /.block-title-two -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="event-one__single">
                            <div class="event-one__image">
                                <div class="event-one__date">
                                    <span>31</span>
                                    Oct
                                </div><!-- /.event-one__date -->
                                <div class="event-one__image-box">
                                    <div class="event-one__image-inner">
                                        <img src="{{ asset('assets-landing/images/event/event-1-1.jpg') }}"
                                            alt="">
                                    </div><!-- /.event-one__image-inner -->
                                </div><!-- /.event-one__image-box -->
                            </div><!-- /.event-one__image -->
                            <div class="event-one__content">
                                <h3><a href="event-details.html">Weekend Drop-In Sessions</a></h3>
                                <p>Man face fruit divided seasons herb from herb moveth whose.</p>
                            </div><!-- /.event-one__content -->
                            <div class="event-one__btn-block">
                                <a href="event-details.html" class="thm-btn event-one__btn">Learn More</a>
                            </div><!-- /.event-one__btn-block -->
                        </div><!-- /.event-one__single -->
                    </div><!-- /.col-lg-12 -->
                    <div class="col-lg-12">
                        <div class="event-one__single">
                            <div class="event-one__image">
                                <div class="event-one__date">
                                    <span>17</span>
                                    Nov
                                </div><!-- /.event-one__date -->
                                <div class="event-one__image-box">
                                    <div class="event-one__image-inner">
                                        <img src="{{ asset('assets-landing/images/event/event-1-2.jpg') }}"
                                            alt="">
                                    </div><!-- /.event-one__image-inner -->
                                </div><!-- /.event-one__image-box -->
                            </div><!-- /.event-one__image -->
                            <div class="event-one__content">
                                <h3><a href="event-details.html">Calvert Richard Jones’s Duomo.</a></h3>
                                <p>Man face fruit divided seasons herb from herb moveth whose.</p>
                            </div><!-- /.event-one__content -->
                            <div class="event-one__btn-block">
                                <a href="event-details.html" class="thm-btn event-one__btn">Learn More</a>
                            </div><!-- /.event-one__btn-block -->
                        </div><!-- /.event-one__single -->
                    </div><!-- /.col-lg-12 -->
                    <div class="col-lg-12">
                        <div class="event-one__single">
                            <div class="event-one__image">
                                <div class="event-one__date">
                                    <span>04</span>
                                    Dec
                                </div><!-- /.event-one__date -->
                                <div class="event-one__image-box">
                                    <div class="event-one__image-inner">
                                        <img src="{{ asset('assets-landing/images/event/event-1-3.jpg') }}"
                                            alt="">
                                    </div><!-- /.event-one__image-inner -->
                                </div><!-- /.event-one__image-box -->
                            </div><!-- /.event-one__image -->
                            <div class="event-one__content">
                                <h3><a href="event-details.html">Celebrating Museum Day</a></h3>
                                <p>Man face fruit divided seasons herb from herb moveth whose.</p>
                            </div><!-- /.event-one__content -->
                            <div class="event-one__btn-block">
                                <a href="event-details.html" class="thm-btn event-one__btn">Learn More</a>
                            </div><!-- /.event-one__btn-block -->
                        </div><!-- /.event-one__single -->
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.event-one -->

        <section class="cta-one" style="background-image: url(assets/images/shapes/cta-bg-1-1.jpg);">
            <div class="container text-center">
                <h3>More Than 1250 Exhibits!</h3>
                <p>Every day more exhibits arrive in our museum. Do not <br> wait and buy a ticket now.</p>
                <div class="cta-one__btn-block">
                    <a href="#" class="thm-btn cta-one__btn-one">Become A
                        Member</a><!-- /.thm-btn cta-one__btn-one -->
                    <a href="#" class="thm-btn cta-one__btn-two">Buy
                        Online</a><!-- /.thm-btn cta-one__btn-two -->
                </div><!-- /.cta-one__btn-block -->
            </div><!-- /.container -->
        </section><!-- /.cta-one -->


        <section class="blog-one">
            <div class="container">
                <div class="blog-one__top">
                    <div class="block-title">
                        <p>Muzex News</p>
                        <h3>Latest From Our News</h3>
                    </div><!-- /.block-title -->
                    <div class="more-post__block">
                        <a class="more-post__link" href="#">
                            All Post
                            <span class="curved-circle">View More &nbsp;&emsp;View More &nbsp;&emsp;View More View More
                                View More &nbsp;&emsp;View &nbsp;&emsp; </span>
                            <!-- /.curved-circle -->
                        </a>
                    </div><!-- /.more-post__block -->
                </div><!-- /.blog-one__top -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="blog-one__single">
                            <div class="blog-one__image">
                                <img src="{{ asset('assets-landing/images/blog/blog-1-1.jpg') }}" alt="">
                                <div class="blog-one__date">
                                    <i class="far fa-calendar-alt"></i>
                                    Oct 25, 2020
                                </div><!-- /.blog-one__date -->
                            </div><!-- /.blog-one__image -->
                            <div class="blog-one__content">
                                <ul class="blog-one__meta list-unstyled">
                                    <li><a href="#">By Diana Leach</a></li>
                                    <li><a href="#">03 Comments</a></li>
                                </ul><!-- /.blog-one__meta list-unstyled -->
                                <h3><a href="news-details.html">Celebrating at Our Egypt Museum</a></h3>
                                <p>Man face fruit divided seasons herb from herb moveth whose dominion gathered winged
                                    morning
                                    man.</p>
                                <a href="news-details.html" class="blog-one__link">Learn
                                    More</a><!-- /.blog-one__link -->
                            </div><!-- /.blog-one__content -->
                        </div><!-- /.blog-one__single -->
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <div class="blog-one__single">
                            <div class="blog-one__image">
                                <img src="{{ asset('assets-landing/images/blog/blog-1-2.jpg') }}" alt="">
                                <div class="blog-one__date">
                                    <i class="far fa-calendar-alt"></i>
                                    Oct 25, 2020
                                </div><!-- /.blog-one__date -->
                            </div><!-- /.blog-one__image -->
                            <div class="blog-one__content">
                                <ul class="blog-one__meta list-unstyled">
                                    <li><a href="#">By Diana Leach</a></li>
                                    <li><a href="#">03 Comments</a></li>
                                </ul><!-- /.blog-one__meta list-unstyled -->
                                <h3><a href="news-details.html">6 Reasons Create Playdate is Great for Little Ones</a>
                                </h3>
                                <p>Man face fruit divided seasons herb from herb moveth whose dominion gathered winged
                                    morning
                                    man.</p>
                                <a href="news-details.html" class="blog-one__link">Learn
                                    More</a><!-- /.blog-one__link -->
                            </div><!-- /.blog-one__content -->
                        </div><!-- /.blog-one__single -->
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <div class="blog-one__single">
                            <div class="blog-one__image">
                                <img src="{{ asset('assets-landing/images/blog/blog-1-3.jpg') }}" alt="">
                                <div class="blog-one__date">
                                    <i class="far fa-calendar-alt"></i>
                                    Oct 25, 2020
                                </div><!-- /.blog-one__date -->
                            </div><!-- /.blog-one__image -->
                            <div class="blog-one__content">
                                <ul class="blog-one__meta list-unstyled">
                                    <li><a href="#">By Diana Leach</a></li>
                                    <li><a href="#">03 Comments</a></li>
                                </ul><!-- /.blog-one__meta list-unstyled -->
                                <h3><a href="news-details.html">This List has been Turned into a Web App</a></h3>
                                <p>Man face fruit divided seasons herb from herb moveth whose dominion gathered winged
                                    morning
                                    man.</p>
                                <a href="news-details.html" class="blog-one__link">Learn
                                    More</a><!-- /.blog-one__link -->
                            </div><!-- /.blog-one__content -->
                        </div><!-- /.blog-one__single -->
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.blog-one -->

        <section class="brand-one">
            <div class="container">
                <div class="brand-one__carousel thm__owl-carousel owl-carousel owl-theme"
                    data-options='{
            "items": 5, "margin": 150, "smartSpeed": 700, "loop": true, "autoplay": true, "autoplayTimeout": 5000, "autoplayHoverPause": false, "nav": false, "dots": false, "responsive": {"0": { "margin": 20, "items": 2 }, "575": { "margin": 30, "items": 3 },"767": { "margin": 40, "items": 4 },   "991": { "margin": 70, "items": 4 }, "1199": { "margin": 150, "items": 5 } } }'>
                    <div class="item">
                        <img src="{{ asset('assets-landing/images/brand/brand-1-1.png') }}" alt="">
                    </div><!-- /.item -->
                    <div class="item">
                        <img src="{{ asset('assets-landing/images/brand/brand-1-2.png') }}" alt="">
                    </div><!-- /.item -->
                    <div class="item">
                        <img src="{{ asset('assets-landing/images/brand/brand-1-3.png') }}" alt="">
                    </div><!-- /.item -->
                    <div class="item">
                        <img src="{{ asset('assets-landing/images/brand/brand-1-4.png') }}" alt="">
                    </div><!-- /.item -->
                    <div class="item">
                        <img src="{{ asset('assets-landing/images/brand/brand-1-5.png') }}" alt="">
                    </div><!-- /.item -->
                    <div class="item">
                        <img src="{{ asset('assets-landing/images/brand/brand-1-1.png') }}" alt="">
                    </div><!-- /.item -->
                    <div class="item">
                        <img src="{{ asset('assets-landing/images/brand/brand-1-2.png') }}" alt="">
                    </div><!-- /.item -->
                    <div class="item">
                        <img src="{{ asset('assets-landing/images/brand/brand-1-3.png') }}" alt="">
                    </div><!-- /.item -->
                    <div class="item">
                        <img src="{{ asset('assets-landing/images/brand/brand-1-4.png') }}" alt="">
                    </div><!-- /.item -->
                    <div class="item">
                        <img src="{{ asset('assets-landing/images/brand/brand-1-5.png') }}" alt="">
                    </div><!-- /.item -->
                </div><!-- /.brand-one__carousel thm__owl-carousel owl-carousel owl-theme -->
            </div><!-- /.container -->
        </section><!-- /.brand-one -->

        <footer class="site-footer">
            <div class="site-footer__upper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="footer-widget footer-widget__about">
                                <p>Welcome to the World’s Leading Museum of Modern Art. It in- cludes works of art
                                    created during the period stretching. from about 1860 to the 1970s.</p>
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-lg-4 -->
                        <div class="col-lg-2">
                            <div class="footer-widget footer-widget__links">
                                <h3 class="footer-widget__title">Quick Link</h3><!-- /.footer-widget__title -->
                                <ul class="footer-widget__links-list list-unstyled">
                                    <li>
                                        <a href="#">About Us</a>
                                    </li>
                                    <li>
                                        <a href="#">Event</a>
                                    </li>
                                    <li>
                                        <a href="#">Photo Gallery</a>
                                    </li>
                                    <li>
                                        <a href="#">Latest Blog</a>
                                    </li>
                                    <li>
                                        <a href="#">Contact</a>
                                    </li>
                                </ul><!-- /.footer-widget__links-list -->
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-lg-2 -->
                        <div class="col-lg-3">
                            <div class="footer-widget footer-widget__contact">
                                <h3 class="footer-widget__title">Contact</h3><!-- /.footer-widget__title -->
                                <p>Muszex Museums 32 Quincy <br>
                                    Street Cambridge, MA</p>
                                <p><a href="tel:(617)-495-9400">(617) 495-9400</a></p>
                                <p><a href="mailto:example@muzex.com">example@muzex.com</a></p>
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-lg-3 -->
                        <div class="col-lg-3">
                            <div class="footer-widget footer-widget__open-hrs">
                                <h3 class="footer-widget__title">Open Hours</h3><!-- /.footer-widget__title -->
                                <p>Daily: 9.30 AM–6.00 PM <br>
                                    Sunday & Holidays: Closed</p>
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-lg-3 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.site-footer__upper -->
            <div class="site-footer__bottom">
                <div class="container">
                    <div class="inner-container">
                        <p>&copy; Copyright 2020 Muzex. All Rights Reserved</p>
                        <a href="index.html" class="site-footer__bottom-logo">
                            <img src="{{ asset('assets-landing/images/logo-footer-1.png') }}" alt="">
                        </a>
                        <div class="site-footer__bottom-links">
                            <a href="#">Terms & conditions</a>
                            <a href="#">Privacy policy & Terms of use</a>
                        </div><!-- /.site-footer__bottom-links -->
                    </div><!-- /.inner-container -->
                </div><!-- /.container -->
            </div><!-- /.site-footer__bottom -->
        </footer><!-- /.site-footer -->
    </div><!-- /.page-wrapper -->

    <div class="search-popup">
        <div class="search-popup__overlay custom-cursor__overlay">
            <div class="cursor"></div>
            <div class="cursor-follower"></div>
        </div><!-- /.search-popup__overlay -->
        <div class="search-popup__inner">
            <form action="#" class="search-popup__form">
                <input type="text" name="search" placeholder="Type here to Search....">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div><!-- /.search-popup__inner -->
    </div><!-- /.search-popup -->

    <div class="side-content__block">
        <div class="side-content__block-overlay custom-cursor__overlay">
            <div class="cursor"></div>
            <div class="cursor-follower"></div>
        </div><!-- /.side-content__block-overlay -->
        <div class="side-content__block-inner ">
            <a href="index.html">
                <img src="{{ asset('assets-landing/images/logo-1-1.png') }}" alt="" width="143">
            </a>
            <div class="side-content__block-about">
                <h3 class="side-content__block__title">About Us</h3><!-- /.side-content__block__title -->
                <p class="side-content__block-about__text">We must explain to you how all seds this mistakens idea off
                    denouncing pleasures and praising pain was born and I will give you a completed accounts off the
                    system and </p><!-- /.side-content__block-about__text -->
                <a href="#" class="thm-btn side-content__block-about__btn">Get Consultation</a>
            </div><!-- /.side-content__block-about -->
            <hr class="side-content__block-line" />
            <div class="side-content__block-contact">
                <h3 class="side-content__block__title">Contact Us</h3><!-- /.side-content__block__title -->
                <ul class="side-content__block-contact__list">
                    <li class="side-content__block-contact__list-item">
                        <i class="fa fa-map-marker"></i>
                        Rock St 12, Newyork City, USA
                    </li><!-- /.side-content__block-contact__list-item -->
                    <li class="side-content__block-contact__list-item">
                        <i class="fa fa-phone"></i>
                        <a href="tel:526-236-895-4732">(526) 236-895-4732</a>
                    </li><!-- /.side-content__block-contact__list-item -->
                    <li class="side-content__block-contact__list-item">
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:example@mail.com">example@mail.com</a>
                    </li><!-- /.side-content__block-contact__list-item -->
                    <li class="side-content__block-contact__list-item">
                        <i class="fa fa-clock"></i>
                        Week Days: 09.00 to 18.00 Sunday: Closed
                    </li><!-- /.side-content__block-contact__list-item -->
                </ul><!-- /.side-content__block-contact__list -->
            </div><!-- /.side-content__block-contact -->
            <p class="side-content__block__text site-footer__copy-text"><a href="#">Muzex</a> <i
                    class="fa fa-copyright"></i> 2020 All Right Reserved</p>
        </div><!-- /.side-content__block-inner -->
    </div><!-- /.side-content__block -->

    <div class="side-menu__block">

        <a href="#" class="side-menu__toggler side-menu__close-btn"><i class="fa fa-times"></i>
            <!-- /.fa fa-close --></a>

        <div class="side-menu__block-overlay custom-cursor__overlay">
            <div class="cursor"></div>
            <div class="cursor-follower"></div>
        </div><!-- /.side-menu__block-overlay -->
        <div class="side-menu__block-inner ">

            <a href="index.html" class="side-menu__logo"><img
                    src="{{ asset('assets-landing/images/logo-light-1-1.png') }}" alt="" width="143"></a>
            <nav class="mobile-nav__container">
                <!-- content is loading via js -->
            </nav>
            <p class="side-menu__block__copy">(c) 2020 <a href="#">Muzex</a> - All rights reserved.</p>
            <div class="side-menu__social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-google-plus"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-pinterest-p"></i></a>
            </div>
        </div><!-- /.side-menu__block-inner -->
    </div><!-- /.side-menu__block -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- Template JS -->

    <script src="{{ asset('assets-landing/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/isotope.js') }}"></script>
    <script src="{{ asset('assets-landing/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/TweenMax.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/jquery.lettering.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/jquery.circleType.js') }}"></script>

    <!-- Custom Scripts -->
    <script src="{{ asset('assets-landing/js/theme.js') }}"></script>
</body>

</html>
