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
    <link rel="stylesheet" href="{{url('style/homepage.css')}}">
    <link rel="stylesheet" href="{{url('style/responsive.css')}}">
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
                        <a href="user-homepage" class="active">
                            <span class="material-icons-sharp">
                                home
                            </span>
                            <h3>Homepage</h3>
                        </a>
                    </li>
                    <li>
                        <a href="add-booking">
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
                        <a href="create-report">
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
                        <a href="frequently-asked-questions">
                            <span class="material-icons-sharp">
                                question_answer
                            </span>
                            <h3>FAQ</h3>
                        </a>
                    </li>
                    <li>
                        <a href="feedback">
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
                <h1><span>ANNOUNCEMENTS</span></h1>
            <!--FEATURED ANNOUNCEMENTS-->
            <div class="featured-list">
                <h2>Featured</h2>
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

<script src="script/homepage.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>