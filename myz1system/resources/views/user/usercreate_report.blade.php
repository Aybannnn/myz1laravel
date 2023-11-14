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
    <link rel="stylesheet" href="{{url('style/createreport.css')}}">
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
                        <a href="user-homepage">
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
            <div class="reportheader" style="margin-left: -2rem;">
                <h1>
                    <span>
                    <a href="{{url()->previous()}}" style="text-decoration: none; color: black;">
                    <div class="material-icons-sharp" style="margin-right: 2rem; border-right: solid black 0.2rem; padding-right: 1rem">
                    arrow_back
                    </div></a>
                    ETC Report Form</span>
                </h1>
            </div>
            <div class="reportform">
                <form action="#" method="post">
                    @csrf
                    <div class="containerform-fluid">
                        <div class="row">
                            <div class="col"></div>
                            <div class="col-4">
                                <h6>Report Date</h6>
                                <input disabled type="text" class="form-control" placeholder="<?php 
                                date_default_timezone_set('Asia/Kolkata');
                                $today = date('m/d/y');
                                echo $today;
                                ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6>EDM Services Request #</h6>
                                <input type="text" class="form-control" name="edm_request" value="{{old('edm_request')}}">
                                <span class="errormsg">@error('edm_request') {{$message}} @enderror</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6>Client's Office/Unit</h6>
                                <input type="text" class="form-control" name="client_office" value="{{old('client_office')}}">
                                <span class="errormsg">@error('edm_request') {{$message}} @enderror</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6>Returned By</h6>
                                <input type="text" class="form-control" name="returned_by" value="{{old('returned_by')}}">
                                <span class="errormsg">@error('edm_request') {{$message}} @enderror</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6>Contact Number</h6>
                                <input type="text" class="form-control" name="contact_number" value="{{old('contact_number')}}">
                                <span class="errormsg">@error('edm_request') {{$message}} @enderror</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6>Email</h6>
                                <input type="text" class="form-control" name="email" value="{{old('email')}}">
                            </div>
                        </div>
                        <table class="table table-bordered" style="margin-top: 2rem; border: solid black 2px;">
                            <thead style="text-align: center;">
                                <tr>
                                    <th scope="col" class="col-1" style="background-color: #43855A33; padding-top: 1rem; padding-bottom: 1rem;">Type of Report</th>
                                    <th scope="col" class="col-1" style="background-color: #43855A33; padding-top: 1rem; padding-bottom: 1rem;">Item</th>
                                    <th scope="col" class="col-1" style="background-color: #43855A33; padding-top: 1rem; padding-bottom: 1rem;">Rental Fee</th>
                                    <th scope="col" class="col-1" style="background-color: #43855A33; padding-top: 1rem; padding-bottom: 1rem;">Equipment Full Price</th>
                                    <th scope="col" class="col-1" style="background-color: #43855A33; padding-top: 1rem; padding-bottom: 1rem;">Penalty</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered" style="margin-top: 2rem; border: solid black 2px;">
                            <tbody>
                                <tr>
                                    <th scope="row" class="col-4" style="background-color: #43855A33; padding-top: 1rem; padding-bottom: 1rem; text-align: center;">Total Full Price for Missing and Damaged Equipment</th>
                                    <th scope="row" class="col-1" style="padding-top: 1rem; padding-bottom: 1rem;"></th>
                                    <th scope="row" class="col-1" style="background-color: #43855A33; padding-top: 1rem; padding-bottom: 1rem; text-align: center;">Total Penalty</th>
                                    <th scope="row" class="col-1" style="padding-top: 1rem; padding-bottom: 1rem;"></th>
                                </tr>
                                <tr>
                                    <th scope="row" class="col-4" style="background-color: #43855A80; padding-top: 1rem; padding-bottom: 1rem; text-align: center;">ACKNOWLEDGMENT OF THE PENALTY</th>
                                    <th scope="row" class="col-1" colspan="2"style="background-color: #F4FCD2; padding-top: 1rem; padding-bottom: 1rem; text-align: center;">Grand Total</th>
                                    <th scope="row" class="col-1" style="padding-top: 1rem; padding-bottom: 1rem;"></th>
                                </tr>
                                <tr>
                                    <th scope="row" style="display: flex; justify-content: center; background-color: #fff; padding-top: 1rem; padding-bottom: 1rem;">
                                    <input class="form-check-input" required type="checkbox" value="" style="padding: 1rem; margin-left: 1rem; margin-top: 1rem; background-color: #43855A; border: solid black 2px;">
                                        <p style="margin-left: 2rem; padding-top: 1rem; padding-bottom: 1rem; padding-right: 1rem;">By clicking the checkbox, the undersigned have acknowledged and agreed to the penalties sanctioned by the ETC as stipulated in the agreed ETC SERVICE REQUEST AND RENTAL POLICY.</p>
                                    </input>
                                    </th>
                                    <th scope="row" class="col-1" colspan="3"></th>
                                </tr>
                                <tr>
                                    <th scope="row" style="display: flex; background-color: #fff; padding-top: 1rem; padding-bottom: 1rem;">
                                        <input class="form-check-input" required type="checkbox" value="" style="padding: 1rem; margin-left: 1rem; margin-top: 1rem; background-color: #43855A; border: solid black 2px;">
                                            <p style="margin-left: 2rem; padding-top: 1rem; padding-bottom: 1rem; padding-right: 1rem;">By clicking the checkbox, the undersigned would like to make an APPEAL for the following reasons:</p>
                                        </input>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered" style="margin-top: 1rem; border: solid black 2px;">
                            <thead>
                                <tr>
                                    <th scope="col" class="col-1" style="text-align: center; padding-top: 1rem; padding-bottom: 1rem;">Department/Unit/Fund</th>
                                    <th scope="col" class="col-1" style="text-align: center; padding-top: 1rem; padding-bottom: 1rem;">Budget Reference</th>
                                    <th scope="col" class="col-1" style="text-align: center; padding-top: 1rem; padding-bottom: 1rem;">Amount to be Charged</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                    <th scope="row">
                                        <input type="text" class="form-control" style="background-color: white; border: none;">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="2" style="text-align: center; padding-top: 1rem; padding-bottom: 1rem; background-color: #F4FCD2;"><h2>TOTAL</h2></th>
                                    <th scope="row"></th>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered" style="margin-top: 1rem; border: solid black 2px;">
                            <thead>
                                <tr>
                                    <th scope="col" class="col-1" style="text-align: center; justify-content: center; padding-top: 1rem; padding-bottom: 1rem; background-color: #43855A80;">AGRRED BY:</th>
                                    <th scope="col" class="col-1" style="text-align: center; justify-content: center; background-color: #43855A80;">APPROVED BY: <br>(Department/Unit/Head)</th>
                                    <th scope="col" class="col-1" style="text-align: center; justify-content: center; padding-top: 1rem; padding-bottom: 1rem; background-color: #43855A80;">BUDGET VERIFIED BY:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>
                                        NAME <br> Position
                                    </th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
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

<script src="script/homepage.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>