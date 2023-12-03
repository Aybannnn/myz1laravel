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
                        <a href="{{url('admin-homepage')}}" class="active">
                            <span class="material-icons-sharp">
                                home
                            </span>
                            <h3>Homepage</h3>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin-notification')}}">
                            <span class="material-icons-sharp">
                                notifications
                            </span>
                            <h3>Notification</h3>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin-calendar')}}">
                            <span class="material-icons-sharp">
                                calendar_month
                            </span>
                            <h3>Services Calendar</h3>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin-monthly')}}">
                            <span class="material-icons-sharp">
                                summarize
                            </span>
                            <h3>Monthly Report</h3>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin-report')}}">
                            <span class="material-icons-sharp">
                                report
                            </span>
                            <h3>Equipment Report</h3>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin-feedback')}}">
                            <span class="material-icons-sharp">
                                feedback
                            </span>
                            <h3>FAQ</h3>
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
            <!--FEATURED ANNOUNCEMENTS-->
            <div class="account-container">
                <div class="grid1"></div>
                <div class="grid4">
                    <div class="adminpicture"></div>
                    <h1>{{$data->name}}</h1>
                </div>
            </div>
            <div class="homepage-container" style="margin-bottom: 2rem;">
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
                    <table class="overflow-auto">
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
                    <a href="#">
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#addPost">Add Announcement
                        <span class="material-icons-sharp">
                            add
                        </span>
                        </button>
                    </a>
                </div>
                <div class="row">
                @foreach($fPost as $post)
                    <div class="col">
                        <center style="margin-top: 1.4rem;">
                            <img src="postimage/{{$post->image_post}}" style="width: 60%; border-radius: 10px;">
                        </center>
                        <h5 style="text-align: center;">{{$post->title_post}}</h5>
                        <p>{{$post->created_at->format('F j, Y')}}</p>
                    </div>
                @endforeach
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
                <div class="container">
                    @foreach($nPost as $post)
                    <div class="row" style="border-left: solid #163920 20px; width: 100%; height: 100%; background: #FFFDFD; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 20px; margin-top: 1rem;">
                        <div class="col-4" style="padding: 2rem;">
                            <div class="imageContainer">
                                <img src="postimage/{{$post->image_post}}" style="border-radius: 10px;">
                            </div>
                        </div>
                        <div class="col" style="padding: 2rem; background-color: white;">
                            <h6 style="font-weight: 900; font-size: 24px;">{{$post->title_post}}</h5>
                            <h6>{{$post->body_post}}</h6>
                            <h6>{{$post->created_at->format('F j, Y')}}</h6>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="#">Show All</a>
            </div>
        </main>
        <!-- End of Main Content -->
            <!-- Modal -->
            <div class="modal fade" id="addPost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Announcement</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{url('add-post')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <h4>Add Title to Post</h4>
                                <input type="text" name="title_post" class="form-control" required>
                                <textarea name="body_post" rows="10" placeholder="Add body" style="margin-top: 1rem; font-size: 18px; width: 100%" required></textarea>
                                <div class="row">
                                    <div class="col-4">
                                        <h6>Attach Image</h6>
                                        <input type="file" name="image_post" required>
                                    </div>
                                    <div class="col-4">
                                        <h6>Feature this post?</h6>
                                        <input type="checkbox" value="1" name="status_post">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Add Post</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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