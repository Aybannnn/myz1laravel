@php
    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='p'){
            header("location: login");
        }else{
            $useremail=$_SESSION["user"];
        }

    }else{
        header("location: login");
    }
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/swiper@11.0.3/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('style/bookingsubcategory.css')}}">
    <link rel="stylesheet" href="{{asset('style/main.css')}}">
    <link rel="stylesheet" href="{{asset('style/animation.css')}}">
    <title>{{$category->main_category}}</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images/logo-no-bg.png')}}">
</head>
<style>
    main{
        animation: transitionIn-Y-bottom 0.5s;
    }
    .right-section{
        animation: transitionIn-Y-bottom  0.5s;
    }
    #equipnment, #services{
        animation: transition-Y-over 0.5s;
    }
</style>
<body>
<!--HEADER-->
<div class="page-header">
    <img src="{{asset('images/parts/Screenshot 2023-09-29 082533.png')}}">
</div>
<!--HEADER-->
    <div class="container-fluid">
        <!--SIDEBAR-->
        <aside>
            <div class="toggle">
                <div class="logo">
                    
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar close">
                <ul class="nav-links">
                    <li>
                        <a href="{{url('user-homepage')}}">
                            <span class="material-icons-sharp">
                                home
                            </span>
                            <h3>Homepage</h3>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('add-booking')}}" class="active">
                            <span class="material-icons-sharp">
                                add_circle
                            </span>
                            <h3>Add Booking</h3>
                        </a>
                        <ul class="sub-menu">
                            @foreach($maincategory as $main)
                            <li><a href="{{url('category_details', $main->id)}}">{{$main->main_category}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <a href="{{url('create-report')}}">
                            <span class="material-icons-sharp">
                                report
                            </span>
                            <h3>Create Report</h3>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('track-report', ['id' => $data->id]) }}">Track Report</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{url('frequently-asked-questions')}}">
                            <span class="material-icons-sharp">
                                question_answer
                            </span>
                            <h3>FAQ</h3>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('feedback')}}">
                            <span class="material-icons-sharp">
                                feedback
                            </span>
                            <h3>Feedback</h3>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('logout')}}">
                            <span class="material-icons-sharp">
                                logout
                            </span>
                            <h3>Logout</h3>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <!--SIDEBAR-->

        <!--MIDDLE CONTENT-->
        <main>
            <div class="announcement-bg"></div>
                <h1><span>{{$category->main_category}}</span></h1>
            <div class="booking-landing" style="margin-top: 6rem;">
                <center><h5 style="font-weight: 200;">
                    The Educational Technology Center (ETC) at La Salle University - Ozamiz City has established a comprehensive policy for 
                    booking equipment and services to facilitate efficient and organized usage. Eligibility extends to faculty, staff, and 
                    recognized student organizations, aligning with the institution's educational objectives. Reservation procedures involve 
                    submitting requests through the official system on a first-come, first-served basis, emphasizing timely submissions. 
                    Confirmation or denial is provided within a specified timeframe, and only confirmed bookings are deemed valid. 
                    Responsible use and care of equipment, training if necessary, and prompt returns are expected from requesters. 
                    The policy includes guidelines for cancellations, fees, compliance with institution policies, and avenues for feedback. 
                    Users are encouraged to provide suggestions for improvement, and periodic reviews ensure ongoing effectiveness and relevance. 
                    Access to the reservation system is granted to eligible entities, with an emphasis on security and privacy adherence. 
                    The ETC policy seeks to streamline the booking process, fostering a conducive environment for educational technology utilization.
                </h5></center>
            </div>
            <div class="categories" style="margin-top: 2rem;">
                <h2>Categories</h2>
                <div class="row">
                    @foreach($subcategory as $sub)
                    <div class="col">
                        <div class="featured-img"></div>
                        <div class="title"style="margin-top: 2rem;">
                            <h3 style="text-align: center;">{{$sub->main_service}}</h3>
                        </div>
                        <a href="{{url('category_services', $sub->id)}}">
                            <button class="btn btn-success" style="margin-bottom: 1rem; font-size: 14px;">View More Information</button>
                        </a>
                    </div>
                    @endforeach
                </div> 
            </div>
        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
            </div>
            <!-- End of Nav -->
        </div>
    </div>

<!--FOOTER-->
<div class="footer">
    <img src="{{asset('images/zonefooter.png')}}">
</div>
<!--FOOTER-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11.0.3/swiper-bundle.min.js"></script>
<script src="{{asset('script/owl.carousel.min.js')}}"></script>
<!-- <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      centeredSlides: false,
      slidesPerGroupSkip: 1,
      grabCursor: true,
      keyboard: {
        enabled: true,
      },
      breakpoints: {
        769: {
          slidesPerView: 2,
          slidesPerGroup: 2,
        },
      },
      scrollbar: {
        el: ".swiper-scrollbar",
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  </script> -->
<!-- <script src="script/booking.js"></script> -->
</body>
</html>