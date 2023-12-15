@php 
    session_start();

    // Set the new timezone
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d');

    $_SESSION["date"]=$date;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('style/login.css')}}">
    <link rel="stylesheet" href="{{url('style/animation.css')}}">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images/logo-no-bg.png')}}">
</head>
<style>
    center{
        animation: transitionIn-Y-bottom 0.5s;
    }
</style>
<script type="text/javascript"> 
        function preventBack() { 
            window.history.forward();  
        } 
        preventBack(); 
        window.onunload = function () { null }; 
</script> 
<body>
<center>
    <div class="login-logo">
        <img src="{{asset('images/zone-yt-cover-wht-2-removebg-preview.png')}}" width="50%">
    </div>
    <div class="container-fluid">
        <table border="0" style="margin: 0;padding: 0;width: 60%;">
            <tr>
                <td>
                    <p class="header-text">Welcome to Z1</p>
                </td>
            </tr>
            <div class="form-body">
                <!-- <tr>
                    <td>
                        <p class="sub-text">Login with your details to continue</p>
                    </td>
                </tr> -->
                <tr> 
                    <form action="{{route('login-user')}}" method="post">
                        @csrf
                        <tr>
                            <td class="label-td">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
                                    <span class="errormsg">@error('email') {{$message}} @enderror</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" name="password" value="{{old('password')}}">
                                    <span class="errormsg">@error('password') {{$message}} @enderror</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                @if(Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                                @endif
                                @if(Session::has('fail'))
                                <div class="errormsg">{{Session::get('fail')}}</div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td">
                                <div class="form-group d-grid gap-2">
                                    <button class="btn btn-block" type="submit">Login</button>
                                </div>
                                <br>
                                <div class="sublink">
                                    <h5>New User?</h5> 
                                    <h5><a href="registration"> Register Here</a></h5>
                                </div>
                            </td>
                        </tr>
                    </form>
                </tr>
            </div>
        </table>
    </div>
    <div class="ellipse"></div>
    <div class="ellipse-2"></div>
    <div class="ellipse-3"></div>
    <div class="ellipse-4"></div>
</center>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>