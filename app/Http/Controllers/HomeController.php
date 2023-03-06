<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        if(Auth::id()){
//            return redirect('home');
//        }
        $doctor = doctor::all();
//else{
//
//    }
        return view('user.dashboard', compact('doctor'));
    }
    public function redirect(){
        if(Auth::id())

        {

            if(auth::user()->usertype=='1')
           {
               return view('admin.home');

           }else{
                $doctor = doctor::all();
              return view('user.dashboard', compact('doctor'));
           }
        }
        else
        {
          return redirect()->back();
        }
    }

    public function appointment(Request $request)
    {
        $data = new appointment;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->date=$request->date;
        $data->phone=$request->number;
        $data->message=$request->message;
        $data->doctor=$request->doctor;
        $data->status='pending';
        if(Auth::id())
        {$data->user_id= Auth::user()->id;

        }
        $data->save();

        return redirect()->back()->with('message', 'Appointment Request Successful. We will contact you soon ');



    }
    public function myappointment(){
        if(auth::id())
        {
            $userid = auth::user()->id;
            $appoint = appointment::where('user_id', $userid)->get();
            return view('user.myappointment', compact('appoint'));
        }else{
            return redirect()->back();
        }

    }
    public function cancel_appoint($id){
        $data=appointment::find($id);

        $data->delete();
        return redirect()->back();
    }
}
