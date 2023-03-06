<?php

namespace App\Http\Controllers;

use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use Notification;
//use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
    public function adddocview(){
        return view('admin.add_doctor');
    }

    public function uploaddocpix(Request $request){
        $doctor = new doctor;
        $image = $request->file;
        $imagename=time().'.'.$image->getClientoriginalExtension();

        $request->file->move('doctorimage', $imagename);
        $doctor->image =$imagename;

        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->roomno = $request->roomno;
        $doctor->speciality = $request->speciality;
        $doctor->save();
        return redirect()->back()->with('message', 'Doctor Added Successfully');

    }

    public function showappointment(){

        $data=appointment::all();
        return view('admin/appointments', compact('data'));
    }

    public  function approvepatient($id){
        $data = appointment::find($id);
        $data->status = "approved";
        $data->save();
        return redirect()->back();
    }

    public function cancelpatient($id){
        $data = appointment::find($id);
        $data->status = "canceled";
        $data->save();
        return redirect()->back();
    }

    public function showdoctor(){

        $data=doctor::all();
        return view('admin/all_doctor', compact('data'));
    }

    public function deletedoctor($id){
        $data = doctor::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function mailview($id)
    {
        $data = appointment:: find($id);
        return view('admin/email_view', compact('data'));
    }

    public function edit_doctor($id){

        $user = doctor::find($id);

        return view('admin/edit_doctor', compact('user'));
    }

    public function editdoctor(Request $request, $id){
        $doctor = doctor:: find($id);
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->roomno = $request->roomno;
        $doctor->speciality = $request->speciality;

        $image = $request->file;
        if($image) {
            $imagename = time() . '.' . $image->getClientoriginalExtension();

            $request->file->move('doctorimage', $imagename);
            $doctor->image = $imagename;
        }
        $doctor->save();
        return redirect()->back()->with('message', 'Doctor Added Successfully');
    }

    public function sendemail(Request $request, $id)
    {
        $data = appointment::find($id);
        $details =[
            'greeting' => $request->greeting,
             'body' => $request->greeting,
             'actiontext' => $request->greeting,
             'actionurl' => $request->greeting,
             'endpart' => $request->greeting
        ];

        notification::send($data, new SendEmailNotification($details));

        return redirect()->back()->with('message', 'email sent successfully');

    }
}
