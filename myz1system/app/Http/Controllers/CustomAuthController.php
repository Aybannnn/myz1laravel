<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\IndividualItem;
use App\Models\Inclusion;
use App\Models\BookingRequest;

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
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:24'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        // $user->password = Hash::make($request->password);   If I want the password to be HASHED
        $user->usertype = 'u';
        $res = $user->save();
        if($res){
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

        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id','=', Session::get('loginId'))->first();
        }
        return view ('user.userhomepage', compact('data', 'maincategory'));
    }
    public function categoryDetails($id)
    {
        $maincategory = Category::all();
        $category = Category::find($id);
        $subcategory = SubCategory::where('main_id', '=', $id)->get();
        

        return view ('user.category_details', compact('category', 'maincategory', 'subcategory'));
    }
    public function categoryServices($id)
    {
        $maincategory = Category::all();
        $category = Category::where('id', '=', $id)->first();
        $subcategory = SubCategory::find($id);
        $indivitems = IndividualItem::where('sub_id', '=', $id)->get();

        return view ('user.category_services', compact('category', 'maincategory', 'subcategory', 'indivitems'));
    }
    public function inclusionDetails($id)
    {
        $maincategory = Category::all();
        $indivitems = IndividualItem::find($id);
        $indivprice = IndividualItem::where('sub_id', '=', $id)->get();
        $inclusion = Inclusion::where('item_id', '=', $id)->get();

        return view ('user.inclusion_details', compact('maincategory', 'indivitems', 'indivprice', 'inclusion'));
    }
    public function userBookingForm()
    {
        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }

        $maincategory = Category::all();

        return view ('user.bookingform', compact('data', 'maincategory'));
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
            'running_time' => 'required',
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
        $bookingRequest = new BookingRequest(); // Keep the model instance name as 'Request'
        $bookingRequest->user_id = $userId;
        $bookingRequest->requesting_office = $request->requesting_office;
        $bookingRequest->contact_person = $request->contact_person;
        $bookingRequest->contact_person_no = $request->contact_person_no;
        $bookingRequest->contact_person_email = $request->contact_person_email;
        $bookingRequest->production_title = $request->production_title;
        $bookingRequest->running_time = $request->running_time;
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
        $bookingRequest->booking_status = 'pending';
        $res = $bookingRequest->save();
        if ($res) {
            return back()->with('success', 'Your booking have been placed Successfully!');
        } else {
            return back()->with('fail', 'Something went wrong, Please try again.');
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
