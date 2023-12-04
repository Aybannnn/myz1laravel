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
    <link rel="stylesheet" href="{{url('style/bookingform.css')}}">
    <link rel="stylesheet" href="{{url('style/responsive.css')}}">
    <link rel="stylesheet" href="{{url('style/main.css')}}">
    <link rel="stylesheet" href="{{url('style/animation.css')}}">
    <title>Booking Form</title>
</head>
<style>
    main{
        animation: transitionIn-Y-bottom 0.5s;
    }
    .right-section{
        animation: transitionIn-Y-bottom  0.5s;
    }
</style>
<body>

<div class="page-header">
    <img src="{{asset('images/parts/Screenshot 2023-09-29 082533.png')}}">
</div>
<!--HEADER-->
    <div class="container-fluid">
        <!--SIDEBAR-->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="images/images/zone-grn-2-1 (2).png">
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
                            <li><a href="#">Track Report</a></li>
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
            <div class="bookingheader">
                <h1>
                    <span>
                    <a href="{{url()->previous()}}" style="text-decoration: none; color: black;">
                    <div class="material-icons-sharp" style="margin-right: 2rem; border-right: solid black 0.2rem; padding-right: 1rem">
                    arrow_back
                    </div></a>
                    Booking Check</span>
                </h1>
            </div>
            <div class="container" style="margin-top: 4rem; background-color: #16392033; padding: 2rem; border-radius: 12px;">
                <div class="container">
                    <h2>Currently Booked on <span style="color: #163920; border-bottom: solid #163920 2px;">{{$information->start_date}}</span> to <span style="color: #163920; border-bottom: solid #163920 2px;">{{$information->end_date}}</span></h2>
                    <div class="container">
                        <div class="col">
                            <div class="row">
                                <div class="information-solo" style="margin-bottom: 1.6rem; margin-left: 2rem; display: flex; padding-right: 4rem; margin-top: 2rem;">
                                    <h4 style="margin-left: 1rem;">
                                        @if ($information->rental_name1) 
                                            <span style="color: #076026; border-bottom: solid black 1px">{{$information->rental_name1}}</span>
                                        @endif
                                        @if ($information->rental_name2)
                                            @if ($information->rental_name1), @endif
                                            <span style="color: #076026; border-bottom: solid black 1px">{{$information->rental_name2}}</span>
                                        @endif
                                        @if ($information->rental_name3)
                                            @if ($information->rental_name1 || $information->rental_name2), @endif
                                            <span style="color: #076026; border-bottom: solid black 1px">{{$information->rental_name3}}</span>
                                        @endif
                                        @if ($information->rental_name4)
                                            @if ($information->rental_name1 || $information->rental_name2 || $information->rental_name3), @endif
                                            <span style="color: #076026; border-bottom: solid black 1px">{{$information->rental_name4}}</span>
                                        @endif
                                        @if ($information->rental_name5)
                                            @if ($information->rental_name1 || $information->rental_name2 || $information->rental_name3 || $information->rental_name4), @endif
                                            <span style="color: #076026; border-bottom: solid black 1px">{{$information->rental_name5}}</span>
                                        @endif
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
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
<script src="script/homepage.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>