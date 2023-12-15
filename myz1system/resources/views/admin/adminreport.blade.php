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
    <link rel="stylesheet" href="{{url('style/adminreport.css')}}">
    <link rel="stylesheet" href="{{url('style/main.css')}}">
    <link rel="stylesheet" href="{{url('style/animation.css')}}">
    <title>Admin Homepage</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images/logo-no-bg.png')}}">
    @livewireStyles
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
                        <a href="{{url('admin-report')}}" class="active">
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
            <div class="account-container">
                <div class="grid1" style="margin-left: -2.2rem;">
                    <h1 style="color: #163920; font-weight: 900;"><span style="background-color: white;">Reports</span></h1>
                </div>
                <div class="grid4">
                    <div class="adminpicture"></div>
                    <h1>{{$data->name}}</h1>
                </div>
            </div>
            <div class="container" style="margin-top: 2rem;">
                <div class="filter" style="display: flex; justify-content: right;">
                    <form action="/search" method="get" class="d-flex" style="gap: 0.5rem;">
                        <input type="text" name="search" class="form-control" placeholder="Search report" style="width: 80%; font-size: 18px;">
                        <button type="submit" class="btn" style="background-color: #fff;">
                            <span class="material-icons-sharp" style="margin-top: 0.4rem;">search</span>
                        </button>
                    </form>
                    </form>
                    <form action="/filter" method="get" class="d-flex" style="gap: 0.5rem;">
                        <select name="filter" style="border-radius: 6px; font-size: 18px;">
                            <option value="">Filter Reports by Status</option>
                                @foreach($status as $status)
                                    <option value="{{$status->status}}">{{$status->status}}</option>
                                @endforeach
                        </select>
                        <button tyle="submit" class="btn" style="background-color: #fff;">
                        <span class="material-icons-sharp" style="margin-top: 0.4rem;">filter_alt</span>
                        </button>
                    </form>
                </div>
            </div>
            <div class="container" style="margin-top: 2rem;">
                <div class="row">
                @foreach($filterreports as $post)
                    <div class="col-6">
                        <div class="card" style="text-align: center; padding: 2rem; margin: 1rem;">
                            <h2 style="margin-right: 2rem; margin-left: 2rem;">Report No. {{$post->id}}</h2>
                            <p>By {{$post->client_office}}</p>
                            <h6>Information sa Report</h6>
                            <form action="{{ route('update-status', ['id' => $post->id]) }}" method="post">
                                @csrf
                                <select name="report_status" class="form-control d-grid mx-auto" style="text-align: center; display: flex; margin-bottom: 1.4rem;">
                                    <option @if($post->report_status == 'Waiting for Approval') selected @endif>Waiting for Approval</option>
                                    <option @if($post->report_status == 'Under Review') selected @endif>Under Review</option>
                                    <option @if($post->report_status == 'Report Accepted') selected @endif>Report Accepted</option>
                                    <option @if($post->report_status == 'Under Maintenance') selected @endif>Under Maintenance</option>
                                    <option @if($post->report_status == 'Report Resolved') selected @endif>Report Resolved</option>
                                </select>
                                <button type="submit" class="btn btn-success d-grid col-6 mx-auto">Update Status</button>
                            </form>
                        </div>
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

            <div class="user-profile">
                <div class="logo">
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
@livewireScripts
</body>
</html>