<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ticket;
use App\Models\User;
use Auth;

class TicketController extends Controller
{
   public function create(Request $request){
       $tickets = ticket::where('user_id',$request->id)->get();
       return view('admin.ticket.create',compact('tickets'));
   }

   public function store(Request $request){
       $file = $request->file;
       if($request->hasFile('file')){
           $filename = $file->getClientOriginalName();
           $file->move(public_path('/uploads/tickets'),$filename);
       }
       else{
           $filename = "";
       }
       if(Auth::user()->roles[0]->name == 'Admin'){
           $by_admin = 1;
       }
       else{
           $by_admin = 0;
       }
       ticket::create([
        //    "user_name"=> $request->name,
           "user_name"=> Auth::user()->name,
        //    "email"=> $request->email,
           "email"=> Auth::user()->email,
           "user_id"=> $request->user_id,
           "to_userid"=>$request->to_userid,
           "role"=> $request->role,
        //    "subject"=> $request->subject,
           "subject"=> "",
           "message"=>$request->message,
           "file"=>$filename,
           "by_admin"=>$by_admin
       ]);
       return redirect()->back()->with("success","Ticket Submitted!");
   }

   public function index(){
       $tickets = ticket::where('user_id',Auth::user()->id)->get();
       return view('admin.ticket.index',compact('tickets'));
   }

   public function requests(){
    //    $reqs = ticket::orderBy('id','desc')->get();
            $reqs = ticket::where('user_id',Auth::user()->id)->get();
            $tickets = ticket::where('user_id',Auth::user()->id)->orWhere('to_userid',Auth::user()->id)->orderBy('id','desc')->get()->map(function($data){
                $data->users = User::where('id',$data->user_id)->first();
                return $data;
            });
        if(Auth::user()->roles[0]->name == 'Admin'){
            $users = ticket::distinct()->where('by_admin',1)->orWhere('to_userid',Auth::user()->id)->get(['user_id'])->map(function($data){
            $data->usrs = User::where('id',$data->user_id)->first();
                return $data;
            });
        }
        else{
            $users = ticket::distinct()->where('to_userid',Auth::user()->id)->get(['user_id'])->map(function($data){
                $data->usrs = User::where('id',$data->user_id)->first();
                    return $data;
                });
        }
       
        
       return view('admin.ticket.requests',compact('reqs','tickets','users'));
   }

   public function reply($id){
       $ticket = ticket::findOrFail($id);
       return view('admin.ticket.reply',compact('ticket'));
   }

   public function storeReply(Request $request,$id){
      
        $file = $request->file;
        $filename = $file->getClientOriginalName();
        $file->move(public_path('/uploads/tickets'),$filename);
       ticket::where('id',$id)->update([
           "reply"=>$request->message,
           'reply_file'=>$filename,
       ]);
       return redirect()->route('ticket.requests')->with('success',"Replied!");
   }
}
