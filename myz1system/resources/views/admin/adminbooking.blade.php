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
    <link rel="stylesheet" href="{{url('style/adminbooking.css')}}">
    <link rel="stylesheet" href="{{url('style/main.css')}}">
    <link rel="stylesheet" href="{{url('style/animation.css')}}">
    <title>Admin Homepage</title>
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
                        <a href="{{url('admin-homepage')}}">
                            <span class="material-icons-sharp">
                                home
                            </span>
                            <h3>Homepage</h3>
                        </a>
                    </li>
                    <li>
                        <a href="admin-notification">
                            <span class="material-icons-sharp">
                                notifications
                            </span>
                            <h3>Notification</h3>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="#">Equipment</a></li>
                            <li><a href="#">Services</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="admin-booking" class="active">
                            <span class="material-icons-sharp">
                                calendar_month
                            </span>
                            <h3>Booking</h3>
                        </a>
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
            <div class="account-container">
                <div class="grid1" style="margin-left: -2.2rem;">
                    <h1 style="color: #163920; font-weight: 900;"><span style="background-color: white; margin-right: 2rem; padding-right: 4rem;">Booking</span></h1>
                </div>
                <div class="grid4">
                    <div class="adminpicture"></div>
                    <h1>{{$data->name}}</h1>
                </div>
            </div>
            <div class="notification-holder">
                <h2 style="padding-top: 1.6rem;">All Booking Request</h2>
                <table>
                    <div class="row">
                        <div class="col">
                        @foreach($notificationActive as $notificationA)
                        <a href="{{url('update_request', $notificationA->id)}}" style="text-decoration: none; color: black; margin-right: -2rem;">
                            <div class="notification-solo" style="display: flex; padding: 2rem; background-color: #43855A33; border-radius: 10px;">
                                <span class="material-icons-sharp" style="color: green; font-size: 32px;">calendar_today</span>
                                <h4 style="margin-left: 1rem;">New booking for
                                    @if ($notificationA->rental_name1) 
                                        <span style="color: #076026; border-bottom: solid black 2px">{{$notificationA->rental_name1}}</span>
                                    @endif
                                    @if ($notificationA->rental_name2)
                                        @if ($notificationA->rental_name1), @endif
                                        <span style="color: #076026; border-bottom: solid black 2px">{{$notificationA->rental_name2}}</span>
                                    @endif
                                    @if ($notificationA->rental_name3)
                                        @if ($notificationA->rental_name1 || $notificationA->rental_name2), @endif
                                        <span style="color: #076026; border-bottom: solid black 2px">{{$notificationA->rental_name3}}</span>
                                    @endif
                                    @if ($notificationA->rental_name4)
                                        @if ($notificationA->rental_name1 || $notificationA->rental_name2 || $notificationA->rental_name3), @endif
                                        <span style="color: #076026; border-bottom: solid black 2px">{{$notificationA->rental_name4}}</span>
                                    @endif
                                    @if ($notificationA->rental_name5)
                                        @if ($notificationA->rental_name1 || $notificationA->rental_name2 || $notificationA->rental_name3 || $notificationA->rental_name4), @endif
                                        <span style="color: #076026; border-bottom: solid black 2px">{{$notificationA->rental_name5}}</span>
                                    @endif
                                    from {{$notificationA->requesting_office}}
                                </h4>
                                <div class="status" style="margin-bottom: 1rem; background-color: #163920; margin-left: 1rem; padding-right: 0.7rem; border-radius: 10px;">
                                <h4 style="color: white;">{{$notificationA->booking_status}}</h4>
                                </div>
                            </div>
                        </a>
                        @endforeach
                        </div>
                    </div>
                </table>
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

            <div class="user-profile">
                <div class="logo">
                </div>
            </div>

            <div class="reminders">
                <div class="header">
                    <h2>Reminders</h2>
                    <span class="material-icons-sharp">
                        notifications_none
                    </span>
                </div>

                <div class="notification">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            volume_up
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Workshop</h3>
                            <small class="text_muted">
                                08:00 AM - 12:00 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

                <div class="notification deactive">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            edit
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Workshop</h3>
                            <small class="text_muted">
                                08:00 AM - 12:00 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

                <div class="notification add-reminder">
                    <div>
                        <span class="material-icons-sharp">
                            add
                        </span>
                        <h3>Add Reminder</h3>
                    </div>
                </div>
            </div>
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