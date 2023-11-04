<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Notification;
use App\Models\BookingRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;

class AdminController extends Controller
{
    public function adminHomepage()
    {
        $notification = BookingRequest::where('booking_status', '=', 'pending')->get();

        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view ('admin.adminhomepage', compact('data', 'notification'));
    }
    public function adminPost()
    {
        return view ('admin.adminpostannouncement');
    }
    public function adminNotification()
    {
        $notificationPending = BookingRequest::where('booking_status', '=', 'pending')->get();
        $notificationActive = BookingRequest::where('booking_status', '=', 'accepted')->get();

        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view ('admin.adminnotification', compact('data', 'notificationPending', 'notificationActive'));
    }
    public function viewRequest($id)
    {
        $notificationPending = BookingRequest::find($id);

        return view ('admin.adminrequestform', compact('notificationPending'));
    }
    public function updateRequest($id)
    {
        $notificationActive = BookingRequest::find($id);

        return view ('admin.adminupdateform', compact('notificationActive'));
    }
    public function updateRequestConfirmation(Request $request, $id)
    {
        $notificationActive = BookingRequest::find($id);

        $notificationActive->requesting_office = $request->requesting_office;
        $notificationActive->contact_person = $request->contact_person;
        $notificationActive->contact_person_no = $request->contact_person_no;
        $notificationActive->contact_person_email = $request->contact_person_email;
        $notificationActive->production_title = $request->production_title;
        $notificationActive->running_time = $request->running_time;
        $notificationActive->rental_name1 = $request->rental_name1;
        $notificationActive->rental_name1_hours = $request->rental_name1_hours;
        $notificationActive->rental_name2 = $request->rental_name2;
        $notificationActive->rental_name2_hours = $request->rental_name2_hours;
        $notificationActive->rental_name3 = $request->rental_name3;
        $notificationActive->rental_name3_hours = $request->rental_name3_hours;
        $notificationActive->rental_name4 = $request->rental_name4;
        $notificationActive->rental_name4_hours = $request->rental_name4_hours;
        $notificationActive->rental_name5 = $request->rental_name5;
        $notificationActive->rental_name5_hours = $request->rental_name5_hours;

        $notificationActive -> save();

        return redirect()->back();
    }
    public function deleteRequest($id)
    {
        $notificationPending = BookingRequest::find($id);
        $notificationActive = BookingRequest::find($id);

        $notificationPending -> delete();
        $notificationActive -> delete();

        return redirect()->back();
    }
    public function acceptRequest($id)
    {
        $notificationPending = BookingRequest::find($id);

        $notificationPending -> booking_status='accepted';

        $notificationPending -> save();

        return redirect()->back();
    }
    public function deactRequest($id)
    {
        $notificationActive = BookingRequest::find($id);

        $notificationActive -> booking_status='pending';

        $notificationActive -> save();

        return redirect()->back();
    }
}
