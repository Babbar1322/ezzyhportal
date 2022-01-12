<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ticketLog;
use App\Models\User;
use App\Models\chat;
use App\Models\notify;
use Auth;

class TicketLogController extends Controller
{

    public function create(Request $request)
    {
        //        $tickets = chat::where('ticket_id', $request->id)->get();
        $tickets = chat::where('ticket_id', $request->id)->get(['sender_id','ticket_id', 'message', 'image'])->map(function ($data) {
            $data->usrs = User::where('id', $data->sender_id)->first();
            $data->tick = ticketLog::where('id', $data->ticket_id)->first();
            return $data;
        });
        return view('admin.ticket.create', compact('tickets'));
    }

    public function store(Request $request)
    {

        $fname = "";
        if ($file = $request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('/uploads/tickets'), $filename);
            $fname = $filename;
        }

        $length = 5;
        $pool = '0123456789';
        $numberid = substr(str_shuffle(str_repeat($pool, 5)), 0, $length);

        $userdata = User::where("id", $request->user_id)->first();
        $ticid = ticketLog::where("id", $request->ticketid)->first();

        if (!empty($request->ticketid)) {
            chat::create([
                "ticket_id" => $request->ticketid,
                "sender_id" => $request->user_id,
                "message" => $request->message,
                "image" => $fname,
            ]);
            
            notify::create([
                "message" => "New Message in ticket Id #".$ticid->ticket_id." ".$userdata->name,
                "userid" => $ticid->userid,
                "link" => "https://ezzyhportal.com/admin/ticket?id=".$request->ticketid,
            ]);

        } else {
            $tick = ticketLog::create([
                "userid" => $request->user_id,
                "role" => $request->role,
                "ticket_id" => $numberid
            ]);

            chat::create([
                "ticket_id" => $tick->id,
                "sender_id" => $request->user_id,
                "message" => $request->message,
                "image" => $fname,
            ]);


            notify::create([
                "message" => "New Message in ticket Id #".$numberid." ".$userdata->name,
                "userid" => 1,
                "link" => "https://ezzyhportal.com/admin/ticket?id=".$tick->id,
            ]);
        }


        return redirect()->back()->with("success", "Ticket Submitted!");
    }

    public function index()
    {
        if(Auth::user()->roles[0]->name == "Admin" || Auth::user()->roles[0]->name == "subadmin"){
            $tickets = ticketLog::orderBy("id","desc")->get();
        }
        else{
            $tickets = ticketLog::where("userid", Auth::user()->id)->orderBy("id","desc")->get();
        }
        // $tickets = chat::orderBy("id","desc")->get(['sender_id','ticket_id', 'message', 'image','created_at'])->map(function ($data) {
        //     $data->usrs = User::where('id', $data->sender_id)->first();
        //     $data->tick = ticketLog::where('id', $data->ticket_id)->first();
        //     return $data;
        // });
        return view('admin.ticket.index', compact('tickets'));
    }

    //
    public function requests()
    {

        if (Auth::user()->roles[0]->name == 'Admin') {
            $tickets = ticketLog::orderBy("id", "desc")->get(['id', 'ticket_id', 'userid'])->map(function ($data) {
                $data->usrs = User::where('id', $data->userid)->first();
                return $data;
            });
        } else {
            $tickets = ticketLog::where('userid', Auth::user()->id)->orderBy("id", "desc")->get(['id', 'ticket_id', 'userid'])->map(function ($data) {
                $data->usrs = User::where('id', $data->userid)->first();
                return $data;
            });
        }
        //        dd($tickets);
        return view('admin.ticket.requests', compact('tickets'));
    }

    public function reply($id)
    {
        $ticket = ticketLog::findOrFail($id);
        return view('admin.ticket.reply', compact('ticket'));
    }

    public function storeReply(Request $request, $id)
    {

        $file = $request->file;
        $filename = $file->getClientOriginalName();
        $file->move(public_path('/uploads/tickets'), $filename);
        ticketLog::where('id', $id)->update([
            "reply" => $request->message,
            'reply_file' => $filename,
        ]);
        return redirect()->route('ticket.requests')->with('success', "Replied!");
    }

    public function notificationRead(Request $request){
        $notif = notify::where('status',0)->where("id",$request->id)->update([
            'status'=> 1
        ]);
    }

    public function delete($id){
        $ticket = ticketLog::findOrFail($id);
        $ticket->delete();
        chat::where('ticket_id',$id)->delete();
        return redirect()->back()->with('success','ticket Deleted successfully');
    }

}
