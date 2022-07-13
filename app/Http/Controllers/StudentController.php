<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User_login_history;
use App\Models\Work;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Session;
use Exception;
use Barryvdh\DomPDF\Facade\Pdf;
 

class StudentController extends Controller
{
    public function studentHome(){
        $data = ['LoggedStudentInfo'=>Student::where('id','=', session('LoggedStudent'))->first()];
        $userloginhistory = User_login_history::where('user_id', $data['LoggedStudentInfo']->student_id)->get();
        $historycount = count($userloginhistory);
        if ($historycount == 1) {
            $lastLoginTime = User_login_history::where('user_id', $data['LoggedStudentInfo']->student_id)->orderBy('id', 'desc')->take(1)->first();
        } else{
            $lastLoginTime = User_login_history::where('user_id', $data['LoggedStudentInfo']->student_id)->orderBy('id', 'desc')->skip(1)->take(1)->first();
        } 
        return view('teacher/home', $data, compact('lastLoginTime'));
    }
    public function uploadData(){
        $data = ['LoggedStudentInfo'=>Student::where('id','=', session('LoggedStudent'))->first()];
        return view('teacher/uploaddata', $data);
    }

    public function studentGetOTP(Request $request){
        $request->validate([
            'mobile' => 'required|unique:students,mobile',
        ]);
        $mobileotp = $request->mobile;
        $mobileotpsend = rand(111111,999999);
        session()->put('mobilenumber',$mobileotp);
        session()->put('mobileotp',$mobileotpsend);
        $msg = 'Dear Student, '.$mobileotpsend.' is your one time password (OTP). Please enter the OTP to proceed. Thank You, Regards - HASANAH EDUCATIONAL TRUST';
        $phones = $mobileotp;
        $url = "http://45.249.108.134/api.php";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "username=hasanahtrust&password=752761&sender=HETRST&sendto=".$phones."&message=".$msg."&PEID=1301164733895014972&templateid=1307164922578115135&type=3");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $response = curl_exec($ch);
        if ($response) {
            return 'success';
        } else{
            session()->forget(['mobileotp', 'mobilenumber']);
            return 'failed';
        }
    }

    public function studentRegister(Request $request)
    {
        $request->validate([
            'state' => 'required|max:150',
            'district' => 'required|max:150',
            'block' => 'required|max:150',
            'school_name' => 'required|max:150',
            'school_id' => 'required|max:150',
            'email' => 'required|max:190',
            'mobile' => 'required|max:20|unique:students,mobile',
            'otp' => 'required',
            'password' => 'required',
            'cpassword' => 'required',
        ]);
        $mobile = $request->mobile;
        $otp = $request->otp;
        $sessotp = session()->get('mobileotp');
        $sessmob = session()->get('mobilenumber');
        if ($mobile == $sessmob && $otp == $sessotp) {
            if ($request->password == $request->cpassword) {
                $studentid = Student::orderBy('id', 'desc')->first();
                if (isset($studentid)) {
                    // Sum 1 + last id
                    $reuserid = substr($studentid->student_id, 3);
                    $userid = $reuserid + 1;
                    $studentidgen = 'DBT' . $userid . '';
                } else {
                    $studentidgen = 'DBT1001';
                }
                Student::create([
                    "student_id" => "$studentidgen",
                    "state_id" => "$request->state",
                    "district_id" => "$request->district",
                    "block_id" => "$request->block",
                    "school_name" => "$request->school_name",
                    "school_id" => "$request->school_id",
                    "name" => "$request->name",
                    "email" => "$request->email",
                    "mobile" => "$mobile",
                    "password" => "$request->password",
                ]);
                //Send Message
                $msg = 'Dear Student, Your registration details are: Username : '.$studentidgen.' Password : '.$request->password.' Visit : https://bit.ly/3uA3gaJ Regards - HASANAH EDUCATIONAL TRUST';
        $phones = $mobile;
        $url = "http://45.249.108.134/api.php";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "username=hasanahtrust&password=752761&sender=HETRST&sendto=".$phones."&message=".$msg."&PEID=1301164733895014972&templateid=1307164922596635229&type=3");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $response = curl_exec($ch);

                session()->forget(['mobileotp', 'mobilenumber']);
                return redirect('thankyou')->with(session()->flash('alert-success', 'You have successfully registered in Hasanah Educational Trust.'));
            }else{
                return redirect()->back()->with(session()->flash('alert-warning', 'Password and Confirm Password not matched.'));
            }}
        return redirect()->back()->with(session()->flash('alert-danger', 'That is not the OTP that we have sent. Please check and try again.'));
    }

    public function studentLogin(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);
        
        $ip=$_SERVER['REMOTE_ADDR'];
        $userLoginHistory = User_login_history::create([
            "user_id" => "$request->username",
            "ip_address" => "$ip"
        ]);
        
        $studentInfo = Student::where('student_id','=',$request->username)->where('status', '1')->first();
        if (!$studentInfo) {
            return redirect()->route('login')->with(session()->flash('alert-warning', 'Failed! We do not recognize your username.'));
        } else if ($studentInfo->status == '0') {
            return redirect()->route('login')->with(session()->flash('alert-danger', 'Your account is blocked.'));
        } else if ($request->password === $studentInfo->password) {
            $request->session()->put('LoggedStudent', $studentInfo->id);
            return redirect('teacher/home');
        } else {
            return redirect()->route('login')->with(session()->flash('alert-danger', 'Failed! Incorrect Password.'));
        }
        
        
    }
    public function studentLogout(){
        if (session()->has('LoggedStudent')) {
            session()->pull('LoggedStudent');
            return redirect('login')->with(session()->flash('alert-success', 'You are successfully Logged out'));
        }
    }
    public function viewProfile(){
        $data = ['LoggedStudentInfo'=>Student::where('id','=', session('LoggedStudent'))->first()];
        $studentdata = Student::where('id', '=', session('LoggedStudent'))->first();
        return view('teacher/viewprofile',$data, compact('studentdata'));
    }
    public function updateProfile(){
        $data = ['LoggedStudentInfo'=>Student::where('id','=', session('LoggedStudent'))->first()];
        $studentdata = Student::where('id', '=', session('LoggedStudent'))->first();
        return view('teacher/updateprofile',$data, compact('studentdata'));
    }
    public function changePassword(){
        $data = ['LoggedStudentInfo'=>Student::where('id','=', session('LoggedStudent'))->first()];
        $studentdata = Student::where('id', '=', session('LoggedStudent'))->first();
        return view('teacher/changepassword',$data, compact('studentdata'));
    }
    

    //Entrance Exam Form Preview Start
    public function studentEntranceExamPreview($tokenno){
        $data = ['LoggedStudentInfo'=>Student::where('id','=', session('LoggedStudent'))->first()];
        $getdetails = Entrance_exam_process::where('token_no',$tokenno)->first();
        $classname = A_class::where('id', $getdetails->class_id)->first();
        // dd($getdetails); die;
        return view('teacher/entrance-exam-preview', $data, compact('getdetails', 'classname'));
    }
    //Entrance Exam Form Preview End

    
    public function uploadDataDetails(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'teacher_id' => 'required',
            'galleryImage' => 'required',
            'galleryImage.*' => 'image|mimes:jpg,jpeg,png',
        ]);

        $addgalleryimage = new Work;
        // $files = array();
        $files = array();
        if($request->hasfile('galleryImage')){
            foreach($request->file('galleryImage') as $file){
                $extenstion = $file->getClientOriginalExtension();
                $filename = 'gallery-image-' . time() . rand(100,9999) . '.' . $extenstion;
                $file->move(public_path('uploads/gallery'), $filename);
                
                // $name = time().rand(1,100).'.'.$file->extension();
                // $file->move(public_path('files'), $name);  
                $files[] = $filename;  
            }
         }
        $addgalleryimage = Work::insert([
            'title' =>$request->title,
            'teacher_id' =>$request->teacher_id,
            'images' =>  json_encode($files),
        ]);
        // $addgalleryimage->galleryTitle = $request->galleryTitle;
        // $addgalleryimage->galleryImage = json_encode($files);
        // $addgalleryimage->save();
        if ($addgalleryimage) {
            return redirect()->back()->with(session()->flash('alert-info', 'Data Uploaded Successfully'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.'));
        }
    }
    
    public function teacherDataList(){
        $data = ['LoggedStudentInfo'=>Student::where('id','=', session('LoggedStudent'))->first()];
        $userloginhistory = User_login_history::where('user_id', $data['LoggedStudentInfo']->student_id)->get();
        $historycount = count($userloginhistory);
        if ($historycount == 1) {
            $lastLoginTime = User_login_history::where('user_id', $data['LoggedStudentInfo']->student_id)->orderBy('id', 'desc')->take(1)->first();
        } else{
            $lastLoginTime = User_login_history::where('user_id', $data['LoggedStudentInfo']->student_id)->orderBy('id', 'desc')->skip(1)->take(1)->first();
        } 
        $worklist = Work::where('teacher_id', $data['LoggedStudentInfo']->student_id)
                        ->paginate(10);
        // $getappliedornot = Entrance_exam_form::where('student_id', $data['LoggedStudentInfo']->student_id)->first();
        return view('teacher/worklist', $data, compact('worklist', 'lastLoginTime'));
    }

    public function editStudentDetails($token_no){
        $data = ['LoggedStudentInfo'=>Student::where('id','=', session('LoggedStudent'))->first()];
        $classes  = A_class::get();
        $school = School::get();
        $studendetails = Entrance_exam_process::where('token_no', $token_no)->first();
        $getappliedornot = Entrance_exam_form::where('student_id', $data['LoggedStudentInfo']->student_id)->first();
        return view('student/editexampapplyform', $data, compact('studendetails', 'classes', 'school', 'getappliedornot'));
    }

    public function changeOldPassword(Request $request){
        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required|min:6',
            'cpassword' => 'required',
        ]);
        $oldpass = Student::where('id','=', session('LoggedStudent'))->first();
        if ($request->oldpassword == $oldpass->password) {
            if ($request->newpassword == $request->cpassword) {
                $updatepass = Student::where('id','=', session('LoggedStudent'))->update(['password' => $request->newpassword,]);
                if ($updatepass) {
                    return redirect()->back()->with(session()->flash('alert-success', 'Your password successfully changed.'));
                }
            } else{
                return redirect()->back()->with(session()->flash('alert-danger', 'Password and Confirm Password Not Matched.'));
            }
        } else{
            return redirect()->back()->with(session()->flash('alert-danger', 'Please! Enter Correct Old Password.'));
        }
        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please! try again later.'));
    }

    public function updateWorkPayment(Request $request){
        $input = $request->all();
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
            
        // dd($response); die;
            $studentid = Student::where('id','=', session('LoggedStudent'))->first();

            $payment_update = Work::where('teacher_id', '=', $studentid->student_id)
                                            ->where('status', '=', '2')
                                            ->update([
                                                'receipt_no' => time().$studentid->id,
                                                'payment_mobile' => $response->contact,
                                                'payment_email' => $response->email,
                                                'payment_id' => $request->razorpay_payment_id,
                                                'transaction_id' => time().rand(11,99).date('yd'),
                                                'transaction_date' => now(),
                                                'payment_status' => $response->status,
                                                'payment_card_id' => $response->card_id,
                                                'method' => $response->method,
                                                'wallet' => $response->wallet,
                                                'payment_vpa' => $response->vpa,
                                                'international_payment' => $response->international,
                                                'error_reason' => $response->error_reason,
                                                'status' => 3,
                                            ]);
        }
        //   dd($payment_update); die;
        if ($payment_update) {
            return redirect()->back()->with(session()->flash('alert-success', 'Transaction successful.'));
        } else{
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please! try again later.'));
        }
    }

    
    
}