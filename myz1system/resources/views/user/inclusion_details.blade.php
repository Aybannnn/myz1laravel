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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../style/inclusions.css">
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/animation.css">
    <title>{{$indivitems->service}}</title>
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
            <div class="announcement-bg"></div>
                <h1><span>{{$indivitems->service}}</span></h1>
            <div class="categories" style="margin-top: 6rem;">
                <h2></h2>
                <div class="row">
                    <div class="col" style="background-color: #43855A80; border-radius: 10px;">
                        <h2 style="padding: 1rem; font-weight: 900;">Inclusions</h2>
                        @foreach($inclusion as $inclusion)
                        <h4 style="margin-left: 4rem;">
                            <span class="material-icons-sharp" style="font-size: 18px;">
                            radio_button_unchecked
                            </span><p style="display: inline-block; margin-left: 0.6rem;">{{$inclusion->inclusions}}</p>
                        </h4>
                        @endforeach
                    </div>
                    <div class="row">
                    <h2 style="padding: 1rem; font-weight: 900; margin-top: 1rem;">Service Fee</h2>
                        <div class="col">
                            <h2 style="display: flex; justify-content: left;">Regular</h2>
                            <h6 style="display: flex; justify-content: left; border-bottom: solid black 1px; padding-bottom: 1rem; font-style: italic;">(Normal Price)</h6>
                            <div class="requestinfo" style="background-color: #43855A33; padding: 2rem;">
                                <h2>{{$indivitems->regular}}</h2>
                            </div>
                        </div>
                        <div class="col" style="border-left: solid black 1px; padding-bottom: 2rem;">
                            <h2 style="display: flex; justify-content: left;">Lasallian Partner</h2>
                            <h6 style="display: flex; justify-content: left; border-bottom: solid black 1px; padding-bottom: 1rem; font-style: italic;">(25% Discount)</h6>
                            <div class="requestinfo" style="background-color: #43855A33; padding: 2rem;">
                                <h2>{{$indivitems->lasallian_partner}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="calendar" style="margin-top: 2rem; margin-bottom: 2rem; background-color: white; padding: 1rem; border-radius: 10px; border: solid black 1px;"></div>
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
<script src="script/booking.js"></script>
<script>
    $(document).ready(function(){
        var booking = @json($events);

        $('#calendar').fullCalendar({
            nextDayThreshold:'00:00:00',
            header: {
                    left: 'prev, next today',
                    center: 'title',
                    right: 'month, agendaWeek, agendaDay',
                },
                events: booking,
                displayEventTime: false,
                eventColor: '#374f2f',
                height: 1200,
                eventLimit: true,
                initialView: 'dayGridMonth',
                dayMaxEvents: true, // allow "more" link when too many events
        })
    })
</script>
</body>
</html>