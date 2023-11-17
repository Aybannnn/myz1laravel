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
    <link rel="stylesheet" href="{{url('style/adminhomepage.css')}}">
    <link rel="stylesheet" href="{{url('style/main.css')}}">
    <link rel="stylesheet" href="{{url('style/animation.css')}}">
    <title>Admin Homepage</title>
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
                        <a href="admin-homepage" class="active">
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
                        <a href="admin-booking">
                            <span class="material-icons-sharp">
                                calendar_month
                            </span>
                            <h3>Booking</h3>
                        </a>
                    </li>
                    <li>
                        <a href="admin-report">
                            <span class="material-icons-sharp">
                                report
                            </span>
                            <h3>Report</h3>
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
            <!--FEATURED ANNOUNCEMENTS-->
            <div class="account-container">
                <div class="grid1"></div>
                <div class="grid4">
                    <div class="adminpicture"></div>
                    <h1>{{$data->name}}</h1>
                </div>
            </div>
            <div class="homepage-container">
                <div class="side1">
                    <h6>
                        WELCOME BACK <br>
                        {{$data->name}}
                    </h6>
                    <img src="{{asset('images/image 15.png')}}">
                </div>
                <div class="side2">
                    <div class="header-home">
                        <h5>Notification</h5>
                        <a href="admin-notification"><button class="btn">View All</button></a>
                    </div>
                    <table>
                        <div class="col">
                            <div class="row">
                                @foreach($notification as $notification)
                                <div class="notification-solo" style="margin-bottom: 1.6rem; margin-left: 2rem; display: flex; padding-right: 4rem;">
                                    <span class="material-icons-sharp" style="color: green;">calendar_today</span>
                                    <h4 style="margin-left: 1rem;">New booking for
                                        @if ($notification->rental_name1) 
                                            <span style="color: #076026; border-bottom: solid black 1px">{{$notification->rental_name1}}</span>
                                        @endif
                                        @if ($notification->rental_name2)
                                            @if ($notification->rental_name1), @endif
                                            <span style="color: #076026; border-bottom: solid black 1px">{{$notification->rental_name2}}</span>
                                        @endif
                                        @if ($notification->rental_name3)
                                            @if ($notification->rental_name1 || $notification->rental_name2), @endif
                                            <span style="color: #076026; border-bottom: solid black 1px">{{$notification->rental_name3}}</span>
                                        @endif
                                        @if ($notification->rental_name4)
                                            @if ($notification->rental_name1 || $notification->rental_name2 || $notification->rental_name3), @endif
                                            <span style="color: #076026; border-bottom: solid black 1px">{{$notification->rental_name4}}</span>
                                        @endif
                                        @if ($notification->rental_name5)
                                            @if ($notification->rental_name1 || $notification->rental_name2 || $notification->rental_name3 || $notification->rental_name4), @endif
                                            <span style="color: #076026; border-bottom: solid black 1px">{{$notification->rental_name5}}</span>
                                        @endif
                                        from {{$notification->requesting_office}}
                                    </h4>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </table>
                </div>
            </div>
            <div class="featured-list">
                <div class="featured-list-header">
                    <h2>Featured</h2>
                    <a href="admin-post">
                        <button class="btn">Add Announcement
                        <span class="material-icons-sharp">
                            add
                        </span>
                        </button>
                    </a>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="featured-img"></div>
                        <h5>Lorem Ipsum</h5>
                        <p>September 00, 2023</p>
                    </div>
                    <div class="col">
                        <div class="featured-img"></div>
                        <h5>Lorem Ipsum</h5>
                        <p>September 00, 2023</p>
                    </div>
                    <div class="col">
                        <div class="featured-img"></div>
                        <h5>Lorem Ipsum</h5>
                        <p>September 00, 2023</p>
                    </div>
                    <div class="col">
                        <div class="featured-img"></div>
                        <h5>Lorem Ipsum</h5>
                        <p>September 00, 2023</p>
                    </div>
                </div>
            </div>
            <!--RECENT ANNOUNCEMENTS-->
            <div class="recent-announcement">
                <h2>Recent</h2>
                <h1>
                    <?php 
                        date_default_timezone_set('Asia/Kolkata');
                        $today = date('F d, Y');
                        echo $today;
                    ?>
                </h1>
                <div class="row2">
                    <div class="col2">
                        <div class="grid-item-one"></div>
                        <span class="grid-item-two">
                            <h5>Lorem Ipsum <span class="material-icons-sharp">more_vert</span></h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et  aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <h6>September 00, 2023</h6>
                        </span>
                    </div>
                </div>
                <div class="row2">
                    <div class="col2">
                        <div class="grid-item-one"></div>
                        <span class="grid-item-two">
                            <h5>Lorem Ipsum <span class="material-icons-sharp">more_vert</span></h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et  aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <h6>September 00, 2023</h6>
                        </span>
                    </div>
                </div>
                <div class="row2">
                    <div class="col2">
                        <div class="grid-item-one"></div>
                        <span class="grid-item-two">
                            <h5>Lorem Ipsum <span class="material-icons-sharp">more_vert</span></h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et  aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <h6>September 00, 2023</h6>
                        </span>
                    </div>
                </div>
                <a href="#">Show All</a>
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