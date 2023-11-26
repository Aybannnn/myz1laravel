<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Notification;
use App\Models\BookingRequest;
use App\Models\CreateReport;
use App\Models\ReportStatus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use DB;

class AdminController extends Controller
{
    public function adminHomepage()
    {
        $notification = BookingRequest::where('booking_status', '=', 'Pending')->get();

        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view ('admin.adminhomepage', compact('data', 'notification'));
    }

    public function adminCalendar()
    {
        $events = array();
        $bookings = BookingRequest::whereIn('booking_status', ['Accepted', 'Ready'])->get();
        foreach($bookings as $booking) {
            $events[] = [
                'title' => $booking->requesting_office,
                'start' => $booking->start_date,
                'end' => $booking->end_date,
                'url' => url('update_request', ['id' => $booking->id]),
            ];
        }

        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view ('admin.admincalendar', ['events' => $events], compact('data'));
    }

    public function adminMonthly()
{
    $data = array();
    if (Session::has('loginId')) {
        $data = User::where('id', '=', Session::get('loginId'))->first();
    }

    $result = BookingRequest::select(DB::raw("COUNT(*) as count"), 'rental_name1')
        ->groupBy('rental_name1')
        ->get();

    $result2 = BookingRequest::select(DB::raw("COUNT(*) as count"), 'rental_name2')
        ->groupBy('rental_name2')
        ->get();

    $result3 = BookingRequest::select(DB::raw("COUNT(*) as count"), 'rental_name3')
        ->groupBy('rental_name3')
        ->get();

    $result4 = BookingRequest::select(DB::raw("COUNT(*) as count"), 'rental_name4')
        ->groupBy('rental_name4')
        ->get();

    $result5 = BookingRequest::select(DB::raw("COUNT(*) as count"), 'rental_name5')
        ->groupBy('rental_name5')
        ->get();

    $resultbar = BookingRequest::select(DB::raw("COUNT(*) as count"), DB::raw("DATE(created_at) as day"))
        ->groupBy(DB::raw("DATE(created_at)"))
        ->get();

    $resultline = BookingRequest::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');

    $bAccepted = BookingRequest::whereIn('booking_status', ['Accepted', 'Ready'])->count();
    $bPending = BookingRequest::where('booking_status', 'Pending')->count();

    return view('admin.adminmonthly', compact('data', 'result', 'result2', 'result3', 'result4', 'result5', 'resultbar', 'resultline', 'bAccepted', 'bPending'));
}

    public function adminPost()
    {
        return view ('admin.adminpostannouncement');
    }

    public function adminNotification()
    {
        $notificationPending = BookingRequest::where('booking_status', '=', 'Pending')->get();
        $notificationActive = BookingRequest::where('booking_status', '=', 'Accepted')->get();

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
        $notificationActive->booking_status = 'Ready';

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

    public function acceptRequest(Request $request, $id)
    {
        $notificationPending = BookingRequest::find($id);

        $notificationPending -> booking_status='Accepted';
        $notificationPending -> received_by = $request->received_by;

        $notificationPending -> save();

        return redirect()->back();
    }

    public function deactRequest($id)
    {
        $notificationActive = BookingRequest::find($id);

        $notificationActive -> booking_status='Pending';

        $notificationActive -> save();

        return redirect()->back();
    }

    public function adminBooking()
    {
        $notificationActive = BookingRequest::whereIn('booking_status', ['Accepted', 'Ready'])->get();

        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }

        return view ('admin.adminbooking', compact('data', 'notificationActive'));
    }

    public function adminReport()
    {
        $filterreports = CreateReport::all();
        $report = CreateReport::get();
        $status = ReportStatus::get();

        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }

        return view ('admin.adminreport', compact('data', 'filterreports', 'report', 'status'));
    }

    public function search(Request $request)
    {

        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        $filterreports = CreateReport::all();
        $report = CreateReport::get();
        $status = ReportStatus::get();
        $search = $request->search;

        $searchResults = CreateReport::where(function($query) use ($search){

            $query->where('client_office', 'like', "%$search%");
        })
        ->get();

        return view('admin.adminsearchreport', compact('data', 'search', 'report', 'filterreports', 'searchResults', 'status'));
    }

    public function filter(Request $request)
    {

        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        $filterreports = CreateReport::all();
        $status = ReportStatus::get();
        $filter = $request->filter;

        $filterResults = CreateReport::where(function($query) use ($filter){

            $query->where('report_status', 'like', "%$filter%");
        })
        ->get();

        return view('admin.adminfilterresults', compact('data', 'filter', 'filterreports', 'filterResults', 'status'));
    }

    public function adminUpdateStatus(Request $request, $id)
    {
        $statusupdate = CreateReport::find($id);
    
        $statusupdate->report_status = $request->report_status;
    
        $statusupdate->save();
    
        return redirect()->back();
    }

    public function adminFeedback()
    {
        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }

        return view('admin.adminfeedback', compact('data'));
    }
}
