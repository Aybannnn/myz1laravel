<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('style/login.css')}}">
    <link rel="stylesheet" href="{{url('style/animation.css')}}">
    <title>Register</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images/logo-no-bg.png')}}">
</head>
<style>
    center{
        animation: transitionIn-Y-bottom 0.5s;
    }
</style>
<body>
<center>
    <div class="login-logo">
        <img src="{{asset('images/zone-yt-cover-wht-2-removebg-preview.png')}}" width="50%">
    </div>
    <div class="container-fluid">
        <table border="0" style="margin: 0;padding: 0;width: 60%;">
            <tr>
                <td>
                    <p class="header-text" style="font-size:24px;">Registration Form</p>
                </td>
            </tr>
            <div class="form-body">
                <!-- <tr>
                    <td>
                        <p class="sub-text">Login with your details to continue</p>
                    </td>
                </tr> -->
                <tr> 
                    <form action="{{route('register-user')}}" method="post">
                        @csrf
                        <tr>
                            <td class="label-td">
                                <div class="form-group">
                                <input type="text" class="form-control" placeholder="Full Name" name="name" value="{{old('name')}}">
                                <span class="errormsg">@error('name') {{$message}} @enderror</span>
                                </div>
                            </td>
                        </tr>
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
                                    <button class="btn btn-block" type="submit">Register</button>
                                </div>
                                <br>
                                <div class="sublink">
                                    <h5>Already have an Account?</h5> 
                                    <h5><a href="login"> Login Here</a></h5>
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