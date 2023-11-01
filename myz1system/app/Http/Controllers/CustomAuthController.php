<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\IndividualItem;
use App\Models\Inclusion;

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
        $category = Category::find($id);
        $subcategory = SubCategory::where('main_id', '=', $id)->get();
        

        return view ('user.category_details', compact('category', 'subcategory'));
    }
    public function categoryServices($id)
    {
        
        return view ('user.category_services');
    }
    public function userBookingForm()
    {
        return view ('user.bookingform');
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
