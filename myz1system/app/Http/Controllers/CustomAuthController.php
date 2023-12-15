<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\IndividualItem;
use App\Models\Inclusion;
use App\Models\BookingRequest;
use App\Models\CreateReport;
use App\Models\addPost;
use App\Models\Feedback;
use App\Models\Question;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use Hash;
use Session;

class CustomAuthController extends Controller
{
    public function login(){
        return view ("auth.login");
    }
    public function registration(){
        return view ("auth.registration");
    }
    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z ]+$/',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:24|regex:/^(?=.*[A-Z])[a-zA-Z0-9_.]+$/',
        ], [
            'name.regex' => 'The name should not contain any number or special characters.',
            'password.regex' => 'The password must be at least 5 characters, with at least one uppercase letter, and must not contain any special characters.',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        // $user->password = Hash::make($request->password);   If you want the password to be HASHED
        $user->usertype = 'u';

        $res = $user->save();

        if ($res) {
            return back()->with('success', 'You have been Registered Successfully!');
        } else {
            return back()->with('fail', 'Something went wrong.');
        }
    }
    public function loginUser(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:24'
        ]);
        $user = User::where('email','=',$request->email)->first();
        if ($user) {
            if($request->password == $user->password)
            // if(Hash::check($request->password,$user->passwrd));    If the password is HASHED in the database, use this for checking
            {
                $request->Session()->put('loginId', $user->id);

                if ($user->usertype == 'a') 
                {
                    return redirect('admin-homepage');
                } elseif ($user->usertype == 'u') {
                    return redirect('user-homepage');
                }
            } else {
                return back()->with('fail', 'Incorrect Password. Please Check Credentials');
            }
        } else {
            return back()->with('fail', 'Email Incorrect. Please Check Credentials');
        }
    }
    public function userHomepage()
    {
        $maincategory = Category::all();
        $fPost = addPost::where('status_post', '=', 'Feature')->orderBy('created_at', 'desc')->get();
        $nPost = addPost::where('status_post', '=', 'Normal')->orderBy('created_at', 'desc')->get();

        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id','=', Session::get('loginId'))->first();
        }
        return view ('user.userhomepage', compact('data', 'maincategory', 'fPost', 'nPost'));
    }
    public function categoryDetails($id)
    {
        $maincategory = Category::all();
        $category = Category::find($id);
        $subcategory = SubCategory::where('main_id', '=', $id)->get();
        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id','=', Session::get('loginId'))->first();
        }

        return view ('user.category_details', compact('data', 'category', 'maincategory', 'subcategory'));
    }
    public function categoryServices($id)
    {
        $maincategory = Category::all();
        $category = Category::where('id', '=', $id)->first();
        $subcategory = SubCategory::find($id);
        $indivitems = IndividualItem::where('sub_id', '=', $id)->get();
        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id','=', Session::get('loginId'))->first();
        }

        return view ('user.category_services', compact('data', 'category', 'maincategory', 'subcategory', 'indivitems'));
    }
    
    public function inclusionDetails($id)
    {
        $maincategory = Category::all();
        $indivitems = IndividualItem::find($id);
        $indivprice = IndividualItem::where('sub_id', '=', $id)->get();
        $inclusion = Inclusion::where('item_id', '=', $id)->get();

        $events = array();
        $currentId = Inclusion::find($id);

        $bookings = BookingRequest::whereIn('booking_status', ['Accepted', 'Ready'])
            ->orWhere('booking_status', 'Ready')
            ->orWhere('booking_status', 'Pending')
            ->orWhere('booking_status', 'Accepted')
            ->where('id', $currentId)
            ->get();

        foreach ($bookings as $booking) {
            $events[] = [
                'title' => 'Currently Booked Dates',
                'start' => $booking->start_date,
                'end' => $booking->end_date,
                'url' => url('user_check', ['id' => $booking->id]),
            ];
        }

        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id','=', Session::get('loginId'))->first();
        }

        return view ('user.inclusion_details', compact('data', 'maincategory', 'indivitems', 'indivprice', 'inclusion', 'events', 'currentId'));
    }

    public function userCheck($id)
    {
        $maincategory = Category::all();
        $information = BookingRequest::find($id);

        return view ('user.availability_check', compact('information', 'maincategory'));
    }

    public function userBookingForm()
    {
        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }

        $maincategory = Category::all();
        $subcategory = SubCategory::all();
        $category = Category::all();
        $indivitems = IndividualItem::all();

        return view ('user.bookingform', compact('data', 'maincategory', 'indivitems', 'category', 'subcategory'));
    }

    public function registerRequest(Request $request)
    {
        $data = array();
        if(Session::has('loginId'))
        {
        $userId = Session::get('loginId');

        $request->validate([
            'requesting_office' => 'required',
            'contact_person' => 'required',
            'contact_person_no' => 'required|max:11',
            'contact_person_email' => 'required',
            'production_title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'rental_name1' => 'required',
            'rental_name1_hours' => 'required',
            'rental_name2' => 'sometimes',
            'rental_name2_hours' => 'sometimes',
            'rental_name3' => 'sometimes',
            'rental_name3_hours' => 'sometimes',
            'rental_name4' => 'sometimes',
            'rental_name4_hours' => 'sometimes',
            'rental_name5' => 'sometimes',
            'rental_name5_hours' => 'sometimes',
        ]);

        $existingBooking = BookingRequest::where(function($query) use ($request) {
            $rentalNames = [$request->rental_name1, $request->rental_name2, $request->rental_name3, $request->rental_name4, $request->rental_name5];
        
            foreach ($rentalNames as $rentalName) {
                $query->orWhere(function($subQuery) use ($request, $rentalName) {
                    $subQuery->where('start_date', '<=', $request->end_date)
                        ->where('end_date', '>=', $request->start_date)
                        ->where('booking_status', '!=', 'Cancelled')
                        ->where(function($nameQuery) use ($rentalName) {
                            $nameQuery->where(function($dateQuery) use ($rentalName) {
                                $dateQuery->where('rental_name1', $rentalName);
                            })
                            ->orWhere(function($dateQuery) use ($rentalName) {
                                $dateQuery->where('rental_name2', $rentalName);
                            })
                            ->orWhere(function($dateQuery) use ($rentalName) {
                                $dateQuery->where('rental_name3', $rentalName);
                            })
                            ->orWhere(function($dateQuery) use ($rentalName) {
                                $dateQuery->where('rental_name4', $rentalName);
                            })
                            ->orWhere(function($dateQuery) use ($rentalName) {
                                $dateQuery->where('rental_name5', $rentalName);
                            });
                        });
                });
            }
        })
        ->first();
                
        if ($existingBooking) {
            // Set a flag in the session
            session()->flash('service_already_booked', true);
            return back();
        }
    
        $bookingRequest = new BookingRequest(); // Keep the model instance name as 'Request'
        date_default_timezone_set('Asia/Manila');
        $bookingRequest->user_id = $userId;
        $bookingRequest->requesting_office = $request->requesting_office;
        $bookingRequest->contact_person = $request->contact_person;
        $bookingRequest->contact_person_no = $request->contact_person_no;
        $bookingRequest->contact_person_email = $request->contact_person_email;
        $bookingRequest->production_title = $request->production_title;
        $bookingRequest->start_date = $request->start_date;
        $bookingRequest->end_date = $request->end_date;
        $bookingRequest->rental_name1 = $request->rental_name1;
        $bookingRequest->rental_name1_hours = $request->rental_name1_hours;
        $bookingRequest->rental_name2 = $request->rental_name2;
        $bookingRequest->rental_name2_hours = $request->rental_name2_hours;
        $bookingRequest->rental_name3 = $request->rental_name3;
        $bookingRequest->rental_name3_hours = $request->rental_name3_hours;
        $bookingRequest->rental_name4 = $request->rental_name4;
        $bookingRequest->rental_name4_hours = $request->rental_name4_hours;
        $bookingRequest->rental_name5 = $request->rental_name5;
        $bookingRequest->rental_name5_hours = $request->rental_name5_hours;
        $bookingRequest->booking_status = 'Pending';
        $bookingRequest->received_by = 'TBA';
        $res = $bookingRequest->save();

        date_default_timezone_set(config('app.timezone'));

        if ($res) {
            return back()->with('success', 'Your booking have been placed Successfully!');
        } else {
            return back()->with('fail', 'Something went wrong, Please try again.');
        }
        }
    }
    public function registerReport(Request $request)
    {

        $data = array();
        if(Session::has('loginId'))
        {
        $userId = Session::get('loginId');
        
        $request->validate([
            'edm_request' => 'required',
            'client_office' => 'required',
            'returned_by' => 'required',
            'contact_number' => 'required',
            'sender_email' => 'required'
        ]);
        $reportRequest = new CreateReport();
        date_default_timezone_set('Asia/Manila');
        $reportRequest->user_id = $userId;
        $reportRequest->edm_request = $request->edm_request;
        $reportRequest->client_office = $request->client_office;
        $reportRequest->returned_by = $request->returned_by;
        $reportRequest->contact_number = $request->contact_number;
        $reportRequest->sender_email = $request->sender_email;
        $reportRequest->report_status = 'Waiting for Approval';
        $res = $reportRequest->save();

        date_default_timezone_set(config('app.timezone'));

        if ($res) {
            return back()->with('success', 'Your report have been placed Successfully!');
        } else {
            return back()->with('fail', 'Something went wrong, Please try again.');
        }
    }
    }
    public function userCreateReport()
    {
        $maincategory = Category::all();
        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id','=', Session::get('loginId'))->first();
        }

        return view('user.usercreate_report', compact('data', 'maincategory'));
    }
    public function userTrackReport($id)
    {
        $trackreport = CreateReport::where('user_id', '=', $id)->get();
        $status = CreateReport::where('id', '=', $id)->get();
        $maincategory = Category::all();
        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id','=', Session::get('loginId'))->first();
        }

        return view('user.usertrackreport', compact('data', 'id', 'maincategory', 'trackreport', 'status'));
    }
    public function userTrackReportStatus($id)
    {
        $maincategory = Category::all();
        $status = CreateReport::where('id', '=', $id)->get();
        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id','=', Session::get('loginId'))->first();
        }

        return view('user.userreportstatus', compact('data', 'maincategory', 'status'));
    }

    public function userQuestion()
    {
        $maincategory = Category::all();
        $question = Question::all();
        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id','=', Session::get('loginId'))->first();
        }

        return view('user.userquestion', compact('data', 'maincategory','question'));
    }

    public function userFeedback()
    {
        $maincategory = Category::all();
        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id','=', Session::get('loginId'))->first();
        }

        return view('user.userfeedback', compact('data', 'maincategory'));
    }

    public function addFeedback(Request $request)
{
    $data = array();
    if (Session::has('loginId')) {
        $userId = Session::get('loginId');

        $request->validate([
            'rate' => 'required',
            'body_feedback' => 'required'
        ]);

        // Assuming you have a User model with a name field
        $user = User::find($userId);
        $userName = $user->name;

        $feedback = new Feedback();
        date_default_timezone_set('Asia/Manila');
        $feedback->rate = $request->rate;
        $feedback->body_feedback = $request->body_feedback;
        $feedback->sender = $userName;
        $res = $feedback->save();

        date_default_timezone_set(config('app.timezone'));

        if ($res) {
            return back()->with('success', 'Your report has been placed successfully!');
        } else {
            return back()->with('fail', 'Something went wrong. Please try again.');
        }
    }
}

    public function logout()
    {
        if(Session::has('loginId'))
        {
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
