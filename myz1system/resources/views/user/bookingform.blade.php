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
    <link rel="stylesheet" href="{{url('style/main.css')}}">
    <link rel="stylesheet" href="{{url('style/animation.css')}}">
    <title>Booking Form</title>
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
                        <a href="add-booking" class="active">
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
            <div class="bookingheader">
                <h1>
                    
                    <span>
                    <a href="{{url()->previous()}}" style="text-decoration: none; color: black;">
                    <div class="material-icons-sharp" style="margin-right: 2rem; border-right: solid black 0.2rem; padding-right: 1rem">
                    arrow_back
                    </div></a>
                    ETC Laboratory and Equipment Rental Form</span>
                </h1>
            </div>
            <div class="bookingform">
                <form action="{{route('register-request')}}" method="post">
                    @csrf
                    <div class="containerform-fluid">
                        <div class="row">
                            <div class="col-8">
                                @if(Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                                @endif
                                @if(Session::has('fail'))
                                <div class="errormsg">{{Session::get('fail')}}</div>
                                @endif
                            </div>
                            <div class="col">
                            <h6>User Id</h6>
                            <input disabled type="text" class="form-control" name="user_id" value="{{$data->id}}" disabled></div>
                            <div class="col">
                            <h6>Request Date</h6>
                            <input disabled type="text" class="form-control" placeholder="<?php 
                                date_default_timezone_set('Asia/Kolkata');
                                $today = date('m/d/y');
                                echo $today;
                                ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                <h6>Requesting Office/Unit</h6>
                                <input type="text" class="form-control" name="requesting_office" value="{{old('requesting_office')}}">
                                <span class="errormsg">@error('requesting_office') {{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6>Contact Person</h6>
                                <input type="text" class="form-control" name="contact_person" value="{{old('contact_person')}}">
                                <span class="errormsg">@error('contact_person') {{$message}} @enderror</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6>Contact Person's #</h6>
                                <input type="text" class="form-control" name="contact_person_no" value="{{old('contact_person_no')}}">
                                <span class="errormsg">@error('contact_person_no') {{$message}} @enderror</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6>Contact Person's Email</h6>
                                <input type="text" class="form-control" name="contact_person_email" value="{{old('contact_person_email')}}">
                                <span class="errormsg">@error('contact_person_email') {{$message}} @enderror</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6>Production/Event Title</h6>
                                <input type="text" class="form-control" name="production_title" value="{{old('production_title')}}">
                                <span class="errormsg">@error('production_title') {{$message}} @enderror</span>
                            </div>
                            <div class="col">
                                <h6>Expected Running Time</h6>
                                <input type="date" class="form-control" name="running_time" value="{{old('running_time')}}">
                                <span class="errormsg">@error('running_time') {{$message}} @enderror</span>
                            </div>
                        </div>
                        <div class="add_item">
                            <div class="row">
                                <div class="col-4">
                                    <h6>Specific Type of ETC Rental Request</h6>
                                    <select class="form-control" name="rental_name1" value="{{old('rental_name1')}}">
                                        <option disabled selected value> -- select an available equipment/service -- </option>
                                        @foreach($indivitems as $items)
                                        <option>{{$items->service}}</option>
                                        @endforeach
                                    </select>
                                    <span class="errormsg">@error('rental_name1') Please select an available equipment/service @enderror</span>
                                </div>
                                <div class="col-2">
                                <h6>Hours</h6>
                                    <input type="time" class="form-control" name="rental_name1_hours" value="{{old('rental_name1_hours')}}">
                                    <span class="errormsg">@error('rental_name1_hours') This field is required @enderror</span>
                                </div>
                                <div class="col-2">
                                <h6>Rate</h6>
                                    <div class="summarybox">
                                        <h5>0.00</h5>
                                    </div>
                                </div>
                                <div class="col-2">
                                <h6>Quantity</h6>
                                    <div class="summarybox">
                                        <h5>0.00</h5>
                                    </div>
                                </div>
                                <div class="col-2">
                                <h6>Rental Fee</h6>
                                    <div class="summarybox">
                                        <h5>0.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="add_item_hidden">
                            <div class="row">
                                <div class="col-4">
                                    <h6>Specific Type of ETC Rental Request</h6>
                                    <input type="text" class="form-control" name="rental_name2" value="{{old('rental_name2')}}">
                                    <span class="errormsg">@error('rental_name2') {{$message}} @enderror</span>
                                </div>
                                <div class="col-2">
                                <h6>Hours</h6>
                                    <input type="time" class="form-control" name="rental_name2_hours" value="{{old('rental_name2_hours')}}">
                                    <span class="errormsg">@error('rental_name2_hours') {{$message}} @enderror</span>
                                </div>
                                <div class="col-2">
                                <h6>Rate</h6>
                                    <div class="summarybox">
                                        <h5>0.00</h5>
                                    </div>
                                </div>
                                <div class="col-2">
                                <h6>Quantity</h6>
                                    <div class="summarybox">
                                        <h5>0.00</h5>
                                    </div>
                                </div>
                                <div class="col-2">
                                <h6>Rental Fee</h6>
                                    <div class="summarybox">
                                        <h5>0.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="add_item_hidden">
                            <div class="row">
                            <div class="col-4">
                                <h6>Specific Type of ETC Rental Request</h6>
                                    <input type="text" class="form-control" name="rental_name3" value="{{old('rental_name3')}}">
                                    <span class="errormsg">@error('rental_name3') {{$message}} @enderror</span>
                                </div>
                                <div class="col-2">
                                <h6>Hours</h6>
                                    <input type="time" class="form-control" name="rental_name3_hours" value="{{old('rental_name3_hours')}}">
                                    <span class="errormsg">@error('rental_name3_hours') {{$message}} @enderror</span>
                                </div>
                                <div class="col-2">
                                <h6>Rate</h6>
                                    <div class="summarybox">
                                        <h5>0.00</h5>
                                    </div>
                                </div>
                                <div class="col-2">
                                <h6>Quantity</h6>
                                    <div class="summarybox">
                                        <h5>0.00</h5>
                                    </div>
                                </div>
                                <div class="col-2">
                                <h6>Rental Fee</h6>
                                    <div class="summarybox">
                                        <h5>0.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="add_item_hidden">
                            <div class="row">
                                <div class="col-4">
                                <h6>Specific Type of ETC Rental Request</h6>
                                    <input type="text" class="form-control" name="rental_name4" value="{{old('rental_name4')}}">
                                    <span class="errormsg">@error('rental_name4') {{$message}} @enderror</span>
                                </div>
                                <div class="col-2">
                                <h6>Hours</h6>
                                    <input type="time" class="form-control" name="rental_name4_hours" value="{{old('rental_name4_hours')}}">
                                    <span class="errormsg">@error('rental_name4_hours') {{$message}} @enderror</span>
                                </div>
                                <div class="col-2">
                                <h6>Rate</h6>
                                    <div class="summarybox">
                                        <h5>0.00</h5>
                                    </div>
                                </div>
                                <div class="col-2">
                                <h6>Quantity</h6>
                                    <div class="summarybox">
                                        <h5>0.00</h5>
                                    </div>
                                </div>
                                <div class="col-2">
                                <h6>Rental Fee</h6>
                                    <div class="summarybox">
                                        <h5>0.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="add_item_hidden">
                            <div class="row">
                            <div class="col-4">
                                <h6>Specific Type of ETC Rental Request</h6>
                                    <input type="text" class="form-control" name="rental_name5" value="{{old('rental_name5')}}">
                                    <span class="errormsg">@error('rental_name5') {{$message}} @enderror</span>
                                </div>
                                <div class="col-2">
                                <h6>Hours</h6>
                                    <input type="time" class="form-control" name="rental_name5_hours" value="{{old('rental_name5_hours')}}">
                                    <span class="errormsg">@error('rental_name5_hours') {{$message}} @enderror</span>
                                </div>
                                <div class="col-2">
                                <h6>Rate</h6>
                                    <div class="summarybox">
                                        <h5>0.00</h5>
                                    </div>
                                </div>
                                <div class="col-2">
                                <h6>Quantity</h6>
                                    <div class="summarybox">
                                        <h5>0.00</h5>
                                    </div>
                                </div>
                                <div class="col-2">
                                <h6>Rental Fee</h6>
                                    <div class="summarybox">
                                        <h5>0.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                            </div>
                            <div class="col-2">
                            </div>
                            <div class="col-2">
                                <div class="summarybox" style="margin-top: 1.7rem; background-color: #F4FCD2;">
                                    <h5 style="font-style: Italic; display: flex; justify-content:center;">TOTAL</h5>
                                </div>
                            </div>
                            <div class="col-2">
                            <h6>Quantity</h6>
                                <div class="summarybox" style="background-color: #F4FCD2;">
                                    <h5>0.00</h5>
                                </div>
                            </div>
                            <div class="col-2">
                            <h6>Rental Fee</h6>
                                <div class="summarybox" style="background-color: #F4FCD2;">
                                    <h5>0.00</h5>
                                </div>
                            </div>
                            <div class="col-1 d-grid">
                            </div>
                        </div>
                        <div id="load-more">Add More Equipment</div>
                        <!-- <div class="row">
                            <div class="col-4 form-check">
                                <h6 style="padding: 1rem; display: flex; justify-content: center; background-color: #F4FCD2; border: solid black 1px; margin-top: 1rem;">ETC SERVICES POLICY</h6>
                                <div class="policybox">
                                    <input class="form-check-input" required type="checkbox" value="" style="padding: 1rem; margin-left: 1rem; margin-top: 1rem; margin-right: 1rem; background-color: #43855A; border: solid black 2px;"><p style="margin-left: 4rem; padding-top: 1rem; padding-bottom: 1rem; padding-right: 1rem;">By clicking the checkbox, the undersigned have read and agreed to the ETC SERVICE REQUEST AND RENTAL POLICY</p></input>
                                    <span style="display: flex; justify-content: center;"><p><a href="#">Link sa Policy</a></p></span>
                                </div>
                            </div>
                            <div class="col-6" style="margin-right: -2rem;">
                                <h6 style="margin-top: 1rem; background-color: #F4FCD2; border: solid black 1px; padding: 1rem;">Lasallian Partner Discount</h6>
                                <h6 style="margin-top: -0.5rem; background-color: #F4FCD2; border: solid black 1px; padding: 1rem;">TOTAL</h6>
                            </div>
                            <div class="col-2">
                                <h6 style="margin-top: 1rem; background-color: #F4FCD2; border: solid black 1px; padding: 1rem;">20%</h6>
                                <h6 style="margin-top: -0.5rem; background-color: #F4FCD2; border: solid black 1px; padding: 1rem;">₱14,625.75</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                            <h6>Date to be Borrowed</h6>
                            <input type="text" class="form-control">
                            </div>
                            <div class="col-2">
                            <h6>Time</h6>
                            <input type="text" class="form-control">
                            </div>
                            <div class="col">
                            <h6>Date to be Returned</h6>
                            <input type="text" class="form-control">
                            </div>
                            <div class="col-2">
                            <h6>Time</h6>
                            <input type="text" class="form-control">
                            </div>
                        </div>
                        <table class="table table-bordered" style="margin-top: 1rem;">
                            <thead>
                                <tr style="border: solid black 1px;">
                                    <th colspan="4" scope="col" style="background-color: #43855A80">ACCOUNTING DETAILS</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr style="border: solid black 1px;">
                                    <th scope="col">Department/Unit/Fund</th>
                                    <th scope="col">Budget Reference</th>
                                    <th scope="col">Amount to be Charged</th>
                                </tr>
                            </thead>
                            <tbody id="add_contributer">
                                <tr>
                                    <td style="background-color: #43855A33; border: solid black 1px;">
                                        <input type="text" class="form-control" style="background-color: transparent; border: none;">
                                    </td>
                                    <td  style="background-color: #43855A33; border: solid black 1px;">
                                        <input type="text" class="form-control" style="background-color: transparent; border: none;">
                                    </td>
                                    <td  style="background-color: #43855A33; border: solid black 1px;">
                                    <input type="text" class="form-control" style="background-color: transparent; border: none;">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #43855A33; border: solid black 1px;">
                                        <input type="text" class="form-control" style="background-color: transparent; border: none;">
                                    </td>
                                    <td  style="background-color: #43855A33; border: solid black 1px;">
                                        <input type="text" class="form-control" style="background-color: transparent; border: none;">
                                    </td>
                                    <td  style="background-color: #43855A33; border: solid black 1px;">
                                    <input type="text" class="form-control" style="background-color: transparent; border: none;">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #43855A33; border: solid black 1px;">
                                        <input type="text" class="form-control" style="background-color: transparent; border: none;">
                                    </td>
                                    <td  style="background-color: #43855A33; border: solid black 1px;">
                                        <input type="text" class="form-control" style="background-color: transparent; border: none;">
                                    </td>
                                    <td  style="background-color: #43855A33; border: solid black 1px;">
                                    <input type="text" class="form-control" style="background-color: transparent; border: none;">
                                    </td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <td colspan="2" scope="col"><h2 style="display: flex; justify-content: right;">Total</h2></td>
                                    <td><h2>₱14,625.75</h2></td>
                                </tr>
                            </thead>
                        </table>
                        <div class="row" style="border-bottom: solid black 1px;">
                            <div class="col">
                            <h2 style="display: flex; justify-content: center; border-bottom: solid black 1px; padding-top: 1rem; padding-bottom: 1rem;">Requested By: </h2>
                                <div class="requestinfo" style="background-color: #43855A33; padding: 6rem; margin-bottom: 1rem;">
                                    <h3 style="display: flex; justify-content: center; font-size: 24px; font-weight: 900;">
                                        Name
                                    </h3>
                                    <p style="display: flex; justify-content: center;">Position</p>
                                </div>
                            </div>
                            <div class="col" style="border-right: solid black 1px; border-left: solid black 1px;">
                            <h2 style="display: flex; justify-content: center; border-bottom: solid black 1px; padding-top: 1rem; padding-bottom: 1rem;">Approved By: </h2>
                                <div class="requestinfo" style="background-color: #43855A33; padding: 6rem; margin-bottom: 1rem;">
                                    <h3 style="display: flex; justify-content: center; font-size: 24px; font-weight: 900;">
                                        Name
                                    </h3>
                                    <p style="display: flex; justify-content: center;">Position</p>
                                </div>
                            </div>
                            <div class="col">
                            <h2 style="display: flex; justify-content: center; border-bottom: solid black 1px; padding-top: 1rem; padding-bottom: 1rem;">Budget Verified By: </h2>
                                <div class="requestinfo" style="background-color: #43855A33; padding: 6rem; margin-bottom: 1rem;">
                                    <h3 style="display: flex; justify-content: center; font-size: 24px; font-weight: 900;">
                                        Name
                                    </h3>
                                    <p style="display: flex; justify-content: center;">Position</p>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin: 2rem;">
                            <div class="col-4">
                                <h6>Released by</h6>
                                <input type="text" class="form-control">
                                <h6>Received by</h6>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-2" style="border-right: solid black 1px;">
                                <h6>Date</h6>
                                <input type="text" class="form-control">
                                <h6>Date</h6>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-4">
                                <h6>Returned by</h6>
                                <input type="text" class="form-control">
                                <h6>Received by</h6>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-2">
                                <h6>Date</h6>
                                <input type="text" class="form-control">
                                <h6>Date</h6>
                                <input type="text" class="form-control">
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col d-grid">
                            <button class="btn" type="submit" style="font-size: 24px; background-color: #F4FCD2; margin-top: 1rem; margin-bottom: 1rem; padding: 1rem; border: solid black 1px;">Book Now</button>
                            </div>
                        </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(".add_button").click(function(e){
            e.preventDefault();
            $("#add_item").append(`<div class="row">
                                <div class="col-4">
                                    <h6>Specific Type of ETC Rental Request</h6>
                                    <input type="text" name="rental_name[]" class="form-control">
                                </div>
                                <div class="col-1">
                                <h6>Hours</h6>
                                <input type="text" class="form-control">
                                </div>
                                <div class="col-2">
                                <h6>Rate</h6>
                                    <div class="summarybox">
                                        <h5>0.00</h5>
                                    </div>
                                </div>
                                <div class="col-2">
                                <h6>Quantity</h6>
                                    <div class="summarybox">
                                        <h5>0.00</h5>
                                    </div>
                                </div>
                                <div class="col-2">
                                <h6>Rental Fee</h6>
                                    <div class="summarybox">
                                        <h5>0.00</h5>
                                    </div>
                                </div>
                                <div class="col-1 d-grid">
                                    <h6>Remove</h6>
                                    <button type="button" class="btn btn-danger remove_button" id="remove_button" name="remove_button">
                                    <span class="material-icons-sharp">
                                    delete
                                    </span>
                                    </button>
                                </div>
                            </div>`);
        })

        $(document).on('click', '.remove_button', function(e){
            e.preventDefault();
            let row_item = $(this).parent().parent();
            $(row_item).remove();
        });
    });

    $(document).ready(function(){
        $(".add_contributer_button").click(function(e){
            e.preventDefault();
            $("#add_contributer").append(`<tr>
                                    <td style="background-color: #43855A33; border: solid black 1px;">
                                        <input type="text" class="form-control" style="background-color: transparent; border: none;">
                                    </td>
                                    <td  style="background-color: #43855A33; border: solid black 1px;">
                                        <input type="text" class="form-control" style="background-color: transparent; border: none;">
                                    </td>
                                    <td  style="background-color: #43855A33; border: solid black 1px;">
                                    <input type="text" class="form-control" style="background-color: transparent; border: none;">
                                    </td>
                                    <td class="d-grid" style="border: solid black 1px;">
                                        <button type="button" class="btn btn-danger remove_contributer_button">
                                        <span class="material-icons-sharp" style="font-size: 14px;">
                                        delete
                                        </span>
                                        </button>
                                    </td>
                                </tr>`);
        })

        $(document).on('click', '.remove_contributer_button', function(e){
            e.preventDefault();
            let row_item = $(this).parent().parent();
            $(row_item).remove();
        });
    });

let loadMoreBtn = document.querySelector('#load-more');
let currentItem = 0;

loadMoreBtn.onclick = () =>{
    let boxes = [...document.querySelectorAll('main .bookingform .containerform-fluid .add_item_hidden')];
    for (var i = currentItem; i < currentItem + 1; i++){
        boxes[i].style.display = 'block';
    }
    currentItem += 1;

    if(currentItem >= boxes.length){
        loadMoreBtn.style.display = 'none';
    }
}

</script>
<script src="script/homepage.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>