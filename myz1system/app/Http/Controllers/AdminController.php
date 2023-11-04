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
