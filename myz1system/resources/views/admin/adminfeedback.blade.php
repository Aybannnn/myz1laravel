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
    <link rel="stylesheet" href="{{url('style/adminfeedback.css')}}">
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
                        <a href="{{url('admin-feedback')}}" class="active">
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
            <div class="container">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#addFAQ" style="display: flex; align-items: center; margin-top: 2rem; flex-direction: row-reverse;">Add FAQ
                        <span class="material-icons-sharp">
                            add
                        </span>
                    </button>
                </div>
                @foreach($question as $question)
                    <div class="questioncontainer" style="background-color: white; border-radius: 8px; padding: 1rem; border-left: solid #163920 12px; margin-bottom: 2rem; margin-top: 2rem; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);">
                        <button type="button" class="btn btn-link" style="text-decoration: none; color: #163920;" data-bs-toggle="collapse" data-bs-target="#collapseInfo{{$loop->iteration}}" aria-expanded="false" aria-controls="collapseInfo{{$loop->iteration}}">
                            <h3>{{$question->question_title}}</h3>
                        </button>
                        <div class="collapse" id="collapseInfo{{$loop->iteration}}" style="margin-top: 1rem;">
                            <h5>{{$question->question_body}}</h5>
                        </div>
                    </div>
                @endforeach
                <h2>Feedbacks</h2>
                <div class="container" style="background-color: #16392033; padding: 2rem; border-radius: 10px; margin-bottom: 2rem;">
                @foreach($feedback as $feed)
                <div class="row" style="margin-top: 1rem;">
                    <div class="col-10">
                        <h2 style="color: #163920; border-bottom: solid 2px #163920; padding-bottom: 0.6rem; display: flex; align-items: center;">
                            <span class="material-icons-sharp" style="font-size: 32px; margin-right: 0.6rem;">chat_bubble</span>
                            {{ Illuminate\Support\Str::limit($feed->body_feedback, $limit = 66, $end = '...') }}
                            <!-- Adjust the $limit parameter to your desired word limit -->
                        </h2>
                    </div>
                    <div class="col justify-content-end" style="display: flex; flex-direction: row; flex-wrap: wrap; align-content: flex-start; gap: 1rem;">
                        <!-- Inside the foreach loop for feedback -->
                        <a href="#" class="btn btn-primary read-feedback-btn" data-bs-toggle="modal" data-bs-target="#acceptModal" data-feedback-id="{{$feed->id}}" style="background-color: #F4FCD2; color: black; border: solid black 1px;">Read</a>
                        <a href="{{ url('delete-feedback', $feed->id) }}" class="btn btn-danger" style="border: solid black 1px;">Delete</a>
                    </div>
                </div>
                @endforeach
                </div>
            </div>
        </main>
        <!-- End of Main Content -->
        <!-- Modal -->
        <div class="modal fade" id="addFAQ" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add FAQ</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('add-question')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="container">
                        <h3>Question:</h3>
                        <input type="text" name="question_title" class="form-control" style="width: 100%; font-size: 20px;" required>
                        <textarea name="question_body" class="form-control" rows="10" style="width: 100%; font-size: 18px; margin-top: 0.8rem;" placeholder="Add Answer" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
        </div>
        <div class="modal fade" id="acceptModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Feedback Details</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="feedback-details-content">
                            <!-- Specific feedback content will be loaded here dynamically -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- Additional buttons if needed -->
                    </div>
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
<script>
    // Add a script to handle the dynamic loading of feedback content
    document.addEventListener('DOMContentLoaded', function () {
        var readButtons = document.querySelectorAll('.read-feedback-btn');

        readButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var feedbackId = button.getAttribute('data-feedback-id');

                // Assuming you have a route like 'get-feedback/{id}'
                var url = "{{ url('get-feedback') }}/" + feedbackId;

                // Use AJAX to fetch the specific feedback content
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        // Update the modal content with the specific feedback details
                        var modalContent = document.getElementById('feedback-details-content');
                        modalContent.innerHTML = '<p style="word-wrap: break-word; font-size: 18px; font-weight: 400;">Sender: ' + data.sender + '</p>' +
                        '<p style="word-wrap: break-word; font-size: 16px; font-weight: 400;">Body: ' + data.body_feedback + '</p>';
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    });
</script>
</body>
</html>