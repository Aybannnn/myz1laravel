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
    <link rel="stylesheet" href="{{url('style/trackreport.css')}}">
    <link rel="stylesheet" href="{{url('style/track.css')}}">
    <link rel="stylesheet" href="{{url('style/main.css')}}">
    <link rel="stylesheet" href="{{url('style/animation.css')}}">
    <title>myZ1 Homepage</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images/logo-no-bg.png')}}">
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
                        <a href="{{url('add-booking')}}">
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
                        <a href="{{url('create-report')}}" class="active">
                            <span class="material-icons-sharp">
                                report
                            </span>
                            <h3>Create Report</h3>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="#">Track Report</a></li>
                            <li><a href="#">View Status</a></li>
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
            <div class="reportheader">
                <h1>
                    <span style="padding-right: 4rem;">
                    <a href="{{url()->previous()}}" style="text-decoration: none; color: black;">
                    <div class="material-icons-sharp" style="margin-right: 2rem; border-right: solid black 0.2rem; padding-right: 1rem">
                    arrow_back
                    </div></a>
                    Status</span>
                </h1>
            </div>
            @foreach($status as $stat)
            <div class="container" style="margin-top: 4rem; margin-bottom: 4rem;">
                <div class="card" style="padding: 2rem;">
                    <div class="report_no">
                        <h3>Report Status <span>#{{$stat->id}}</span></h3>
                    </div>
                    <div class="date_time">
                        <h5>Date and Time: <span>{{$stat->created_at}}</span></h5>
                    </div>
                    <div class="report_by">
                        <h5>Report From: <span>{{$stat->client_office}}</span></h5>
                    </div>
                    <section class="step-wizard" style="border-radius: 10px;">
                        <ul class="step-wizard-list">
                            <li class="step-wizard-item {{$stat->report_status == '1' ? 'current-item' : ''}}">
                                <span class="progress-count">1</span>
                                <span class="progress-label">Waiting for Approval</span>
                            </li>
                            <li class="step-wizard-item {{$stat->report_status == '2' ? 'current-item' : ''}}">
                                <span class="progress-count">2</span>
                                <span class="progress-label">Under Review</span>
                            </li>
                            <li class="step-wizard-item {{$stat->report_status == '3' ? 'current-item' : ''}}">
                                <span class="progress-count">3</span>
                                <span class="progress-label">Report Accepted</span>
                            </li>
                            <li class="step-wizard-item {{$stat->report_status == '4' ? 'current-item' : ''}}">
                                <span class="progress-count">4</span>
                                <span class="progress-label">Under Maintenance</span>
                            </li>
                            <li class="step-wizard-item {{$stat->report_status == '5' ? 'current-item' : ''}}">
                                <span class="progress-count">5</span>
                                <span class="progress-label">Report Resolved</span>
                            </li>
                        </ul>
                    </section>
                </div>
            </div>
            @endforeach
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

<script src="script/homepage.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>