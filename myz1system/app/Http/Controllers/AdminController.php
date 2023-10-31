<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;

class AdminController extends Controller
{
    public function adminHomepage()
    {
        $notification = Notification::where('status', '=', 'Confirmed')->get();

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
        $notification = Notification::where('status', '=', 'Confirmed')->get();

        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view ('admin.adminnotification', compact('data', 'notification'));
    }
}
