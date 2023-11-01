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
    <link rel="stylesheet" href="../style/booking.css">
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/animation.css">
    <title>myZ1 Booking</title>
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
                        <a href="{{url('user-booking')}}" class="active">
                            <span class="material-icons-sharp">
                                add_circle
                            </span>
                            <h3>Add Booking</h3>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="#">Equipment</a></li>
                            <li><a href="#">Services</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <span class="material-icons-sharp">
                                report
                            </span>
                            <h3>Report</h3>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="create.html">Create Report</a></li>
                            <li><a href="#">Track Report</a></li>
                            <li><a href="#">View Status</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <span class="material-icons-sharp">
                                question_answer
                            </span>
                            <h3>FAQ</h3>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="material-icons-sharp">
                                feedback
                            </span>
                            <h3>Feedback</h3>
                        </a>
                    </li>
                    <li>
                        <a href="logout">
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
                <h1><span>BOOKING</span></h1>
                <div class="booking-landing">
                    <p>ABOUT ETC BOOKING EQUIPMENT CHU CHU CHU</p>
                </div>
            <div class="button-choices">
                <div class="row">
                    <div class="col">
                        <a href="#equipment">EdTech, Multimedia, & Event Management Support</a>
                    </div>
                    <div class="col">
                        <a href="#services">Multimedia Production</a>
                    </div>
                    <div class="col">
                        <a href="#media">Multimedia Production</a>
                    </div>
                </div>
            </div>
            <!--EQUIPMENT-->
            <div class="overlay2">
                <div class="overlay3" id="equipment">
                    <div class="content-banner">
                        <h2>EdTech & Multimedia Technical Support</h2>
                    </div>

                    @foreach($indivcategorySub1 as $subCategory)
                        <div class="equipment-contents">
                            <a href="#">
                                <div class="grid-container">
                                    <div class="grid1">
                                        <div class="grid-img"></div>
                                    </div>

                                    @foreach($inclusion as $inc)
                                        <div class="grid2">
                                            <span class="material-icons-sharp">
                                                radio_button_unchecked
                                            </span>
                                            <h2>{{ $inc->inclusions }}</h2>
                                        </div>
                                    @endforeach

                                    <div class="grid3">
                                        <h2>{{ $subCategory->service }}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach


                </div>
                <!--SERVICES-->
                <div class="overlay3" id="services">
                    <div class="content-banner">
                        <h2>Multimedia Productions</h2>
                    </div>
                    <div class="equipment-contents">
                        <div class="row2">
                            <div class="col2">
                                <div class="grid-item-one">
                                    <div class="row3">
                                        <div class="col3-img"></div>
                                        <div class="col3">
                                            <p>Service <br> Category 1</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-item-two">
                                    <h3>Service Name</h3>
                                    <h4>Description</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et aliqua.</p>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="grid-item-one">
                                    <div class="row3">
                                        <div class="col3-img"></div>
                                        <div class="col3">
                                            <p>Service <br> Category 1</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-item-two">
                                    <h3>Service Name</h3>
                                    <h4>Description</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et aliqua.</p>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="grid-item-one">
                                    <div class="row3">
                                        <div class="col3-img"></div>
                                        <div class="col3">
                                            <p>Service <br> Category 1</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-item-two">
                                    <h3>Service Name</h3>
                                    <h4>Description</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et aliqua.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--SERVICES-->
                <div class="overlay3" id="media">
                    <div class="equipment-contents">
                        <div class="row2">
                            <div class="col2">
                                <div class="grid-item-one">
                                    <div class="row3">
                                        <div class="col3-img"></div>
                                        <div class="col3">
                                            <p>Service <br> Category 1</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-item-two">
                                    <h3>Service Name</h3>
                                    <h4>Description</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et aliqua.</p>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="grid-item-one">
                                    <div class="row3">
                                        <div class="col3-img"></div>
                                        <div class="col3">
                                            <p>Service <br> Category 1</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-item-two">
                                    <h3>Service Name</h3>
                                    <h4>Description</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et aliqua.</p>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="grid-item-one">
                                    <div class="row3">
                                        <div class="col3-img"></div>
                                        <div class="col3">
                                            <p>Service <br> Category 1</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-item-two">
                                    <h3>Service Name</h3>
                                    <h4>Description</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et aliqua.</p>
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
            <div class="searchbooking">
                <tr>
                    <td>
                        <div class="search">
                        <span class="material-icons-sharp">
                        search
                        </span>
                            <input type="text" class="form-control" name="search" value="{{old('password')}}">
                        </div>
                    </td>
                </tr>
            </div>
            <a href="booking-form">
            <button class='btn d-grid gap-2 mx-auto'>BOOK NOW</button>
            </a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                <h4>WELCOME</h4>
                <hr>
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td><a href="logout">Logout</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!--FOOTER-->
<div class="footer">
    <img src="{{asset('images/zonefooter.png')}}">
</div>
<!--FOOTER-->
<script src="script/booking.js"></script>
</body>
</html>