<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\District;
use App\Models\State;
use App\Models\CropInsuranceProcess;
use App\Models\CropInsurance;
use App\Models\CattleInsurance;
use App\Models\CattleInsuranceProcess;
use App\Models\KisanLoan;
use App\Models\Wallet;
use App\Models\FixInsuranceAmount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Exception;
use Razorpay\Api\Api;

class DashboardController extends Controller
{
    public function login()
    {
        return view('dashboard.auth.login');
    }

    public function loginDash(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $dashInfo = User::where('mobile', '=', $request->username)->where('status', '1')->first();
        // dd($dashInfo);die;
        if (!$dashInfo) {
            return redirect()->route('dashboard.auth.login')->with(session()->flash('alert-danger', 'Failed! We do not recognize your username.'));
        } else if ($request->password === $dashInfo->password) {
            //Doctor role here
            if ($dashInfo->role == 3) {
                $request->session()->put('LoggedDash', $dashInfo->id);
                $doctorinfo = \App\Models\User::where('id', $dashInfo->id)->first();
                // dd($doctorinfo);
                // die;
                $logged_name = $request->session()->put('logged_name', $doctorinfo->name);
                $logged_mobile = $request->session()->put('logged_mobile', $doctorinfo->mobile);
                $logged_user_id = $request->session()->put('logged_user_id', $doctorinfo->user_id);
                return redirect('dashboard/profile?doctor');
            }
            //Agent role here
            else if ($dashInfo->role == 2) {
                $request->session()->put('LoggedDash', $dashInfo->id);
                return redirect('dashboard/profile?agent');
            }
            //Farmer role here
            else if ($dashInfo->role == 5) {
                $request->session()->put('LoggedDash', $dashInfo->id);
                return redirect('dashboard/profile?farmer');
            }
			//Employee role here
            else if ($dashInfo->role == 4) {
                $request->session()->put('LoggedDash', $dashInfo->id);
                return redirect('dashboard/profile?employee');
            }
        } else {
            return redirect()->route('dashboard.auth.login')->with(session()->flash('alert-danger', 'Failed! Incorrect Password.'));
        }
    }

    public function dashLogout()
    {
        if (session()->has('LoggedDash')) {
            session()->pull('LoggedDash');
            session()->pull('logged_name');
            return redirect('dashboard/home');
        }
    }

    public function forgetPassword()
    {
        return view('dashboard.auth.forget-password');
    }
    public function selectRegister()
    {
        return view('dashboard.select_register');
    }
    public function farmerReg()
    {
        return view('dashboard.auth.farmer_register');
    }
    public function doctorRegistration()
    {
        $statelist = State::get();
        $districtlist = District::get();
        return view('dashboard.auth.doctor_register', compact('districtlist','statelist'));
    }
    public function AgriRegistration()
    {
        $districtlist = District::get();
		$statelist = State::get();
        return view('dashboard.auth.agric_registration', compact('districtlist','statelist'));
    }

    public function index()
    {
        return view('dashboard.home');
    }
    public function cropCare()
    {
        return view('dashboard.cropcare');
    }
    public function animalHealthCare()
    {
        return view('dashboard.animalhealthcare');
    }
    public function insurance()
    {
        return view('dashboard.insurance');
    }
    public function support()
    {
        return view('dashboard.support');
    }
    public function cattleDocSearch()
    {
        return view('dashboard.cattle-doc-search');
    }
    public function cropDoc()
    {
        return view('dashboard.crop-doc');
    }
    public function cropInsuranceStepOne(Request $request)
    {
       $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedDash'))->first()];

       
        // dd($count_employee_id);
        if($request->employee_id!=null)
        {
            $employee_id = $request->get('employee_id');
            $count_employee_id = User::where('user_id',$employee_id)->where('role',4)->get();
            $emp_details = User::where('user_id',$employee_id)->where('role',4)->first();
            // dd($count_employee_id);
            if(count($count_employee_id)>0){
            
                //Send Message
                $mobileotp = $emp_details->mobile;
                $mobileotpsend = rand(111111,999999);
                session()->put('mobilenumber',$mobileotp);
                session()->put('employeeotp',$mobileotpsend);
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
                
                // $request->session()->put('LoggedDash', $lastId);
                // return redirect('dashboard/auth/login')->with(session()->flash('alert-success', 'Registration Success.'));
                return redirect('dashboard/crop_insurance_stepTwo')->with(session()->flash('alert-success', 'Otp Sent!.'));
            }
            else{
                return redirect()->back()->with(session()->flash('alert-danger', 'Invalid Employee Code!.'));
            }
        }
        
       return view('dashboard.crop_insurance_stepOne', $data, );
    }
    public function verifyCropInsuranceOtp(Request $request){
        $request->validate([
            'otp' => 'required|numeric|min:6',
        ]);
        $otp = $request->otp;
        $mobile = $request->mobile;
        $sessotp = session()->get('employeeotp');
        $sessmob = session()->get('mobilenumber');
        if ($mobile == $sessmob && $otp == $sessotp) {
                // session()->forget(['employeeotp', 'mobilenumber']);
                return redirect('dashboard/crop-insurance')->with(session()->flash('alert-success', 'OTP Verified.'));
             }
             else
             {
                return redirect()->back()->with(session()->flash('alert-danger', 'Incorrect Otp!.'));
             }
    }
    public function verifyCattleInsuranceOtp(Request $request){
        $request->validate([
            'otp' => 'required|numeric|min:6',
        ]);
        $otp = $request->otp;
        $mobile = $request->mobile;
        $sessotp = session()->get('employeeotp');
        $sessmob = session()->get('mobilenumber');
        if ($mobile == $sessmob && $otp == $sessotp) {
                // session()->forget(['employeeotp', 'mobilenumber']);
                return redirect('dashboard/cattle-insurance')->with(session()->flash('alert-success', 'OTP Verified.'));
             }
             else
             {
                return redirect()->back()->with(session()->flash('alert-danger', 'Incorrect Otp!.'));
             }
    }
    public function getEmployeeCount(Request $request){
        
    }
    public function cropInsuranceStepTwo()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedDash'))->first()];
        return view('dashboard.cattle_insurance_stepTwo',$data);
    }
    public function cattleInsuranceStepOne(Request $request)
    {
        // dd($count_employee_id);
        if($request->employee_id!=null)
        {
            $employee_id = $request->get('employee_id');
            $count_employee_id = User::where('user_id',$employee_id)->where('role',4)->get();
            $emp_details = User::where('user_id',$employee_id)->where('role',4)->first();
            // dd($count_employee_id);
            if(count($count_employee_id)>0){
            
                //Send Message
                $mobileotp = $emp_details->mobile;
                $mobileotpsend = rand(111111,999999);
                session()->put('mobilenumber',$mobileotp);
                session()->put('employeeotp',$mobileotpsend);
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
                
                // $request->session()->put('LoggedDash', $lastId);
                // return redirect('dashboard/auth/login')->with(session()->flash('alert-success', 'Registration Success.'));
                return redirect('dashboard/cattle_insurance_stepTwo')->with(session()->flash('alert-success', 'Otp Sent!.'));
            }
            else{
                return redirect()->back()->with(session()->flash('alert-danger', 'Invalid Employee Code!.'));
            }
        }
        return view('dashboard.cattle_insurance_stepOne');
    }
    public function cattleInsuranceStepTwo()
    {
        return view('dashboard.crop_insurance_stepTwo');
    }
    public function cropDocSearchDetails(Request $request)
    {
        $pin = $request->get('pin');
        // dd($pin);
        if ($pin !== null) {

            $cattledoctor = User::where('pincode', $pin)->where('role', 3)->paginate(10);
            // ->join('districts', 'users.district', '=', 'districts.id_district')
            // // ->join('blocks', 'students.block_id', '=', 'blocks.id')
            // ->select('districts.*', 'users.*')
            // ->paginate(15);
            // dd($cattledoctor);

            // $districtName = District::where('id_district', $cattledoctor->district)->get();
            // $districtName = $districtName->name;
        }
        return view('dashboard/cattle-doc-search-details', compact('cattledoctor','pin'));
        // return view('dashboard.crop-doc-search-details');
    }
    public function profile()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedDash'))->first()];
        $user = User::where('id', '=', session('LoggedDash'))->first();
        return view('dashboard.profile', $data, compact('user'));
    }
    public function editProfile()
    {
        return view('dashboard.editProfile');
    }
    public function editAddress()
    {
        return view('dashboard.editAddress');
    }


    public function uploadDocRegData(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required|min:10|unique:users,mobile',
            'address' => 'required',
            'state' => 'required|numeric',
            'district' => 'required|numeric',
            'block' => 'required|numeric',
            'panchayat' => 'required',
            'pin_code' => 'required|min:6|max:6',
            'experience' => 'required',
        ]);
        $checkUserExist = User::where('mobile', $request->mobile)->get();
        $c = count($checkUserExist);

        $last_userid = User::orderBy('id', 'desc')->first();
        if (isset($last_userid)) {
            // Sum 1 + last id
            $reuserid = substr($last_userid->user_id, 3);
            $userid = $reuserid + 1;
            $euserid= 'EUC' . $userid . '';
        } else {
            $euserid = 'EUC10001';
        }
         
            $doctorupload = User::create([
                "user_id" => "$euserid",
                "mobile" => "$request->mobile",
                "name" => "$request->name",
                "state" => "$request->state",
                "district" => "$request->district",
                "block" => "$request->block",
                "panchayat" => "$request->panchayat",
                "pincode" => "$request->pin_code",
                "experience" => "$request->experience",
                "password" => "$request->mobile",
                "role" => 3,
                "address" => "$request->address",

            ]);

            
            if ($doctorupload) {
                //Send Message
                $msg = 'Dear Student, Your registration details are: Username : ' . $request->mobile . ' Password : ' . $request->mobile . ' Visit : https://bit.ly/3uA3gaJ Regards - HASANAH EDUCATIONAL TRUST';
                $phones = $request->mobile;
                $url = "http://45.249.108.134/api.php";
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, "username=hasanahtrust&password=752761&sender=HETRST&sendto=" . $phones . "&message=" . $msg . "&PEID=1301164733895014972&templateid=1307164922596635229&type=3");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                $response = curl_exec($ch);
                // session()->forget(['mobileotp', 'mobilenumber']);
				$lastId = $doctorupload->id;
				$request->session()->put('LoggedDash', $lastId);
                // return redirect('dashboard/auth/login')->with(session()->flash('alert-success', 'Registration Success.'));
                return redirect('dashboard/profile')->with(session()->flash('alert-success', 'Registration Success.'));
            } else {
                return redirect()->back()->with(session()->flash('alert-danger', 'Plz Try Again!.'));
            }
         
    }

    public function uploadAgriRetailerRegData(Request $request)
    {
        $request->validate([
            'firm_name' => 'required',
            'gst_number' => 'required|min:15',
            'name' => 'required',
            'mobile' => 'required|min:10|unique:users,mobile',
            'address' => 'required',
            'state' => 'required|numeric',
            'district' => 'required|numeric',
            'block' => 'required|numeric',
            'panchayat' => 'required',
            'pin_code' => 'required|min:6|max:6',
            
        ]);
        $checkUserExist = User::where('mobile', $request->mobile)->get();
        $c = count($checkUserExist);
        
		$last_userid = User::orderBy('id', 'desc')->first();
        if (isset($last_userid)) {
            // Sum 1 + last id
            $reuserid = substr($last_userid->user_id, 3);
            $userid = $reuserid + 1;
            $euserid= 'EUC' . $userid . '';
        } else {
            $euserid = 'EUC10001';
        }
        
            $agri_retailer = User::create([
                "user_id" => "$euserid",
                "mobile" => "$request->mobile",
                "firm_name" => "$request->firm_name",
                "gst" => "$request->gst_number",
                "name" => "$request->name",
                "state" => "$request->state",
                "district" => "$request->district",
                "block" => "$request->block",
                "panchayat" => "$request->panchayat",
                "pincode" => "$request->pin_code",
                "experience" => "$request->experience",
                "password" => "$request->mobile",
                "role" => 2,
                "address" => "$request->address",

            ]);
            if ($agri_retailer) {
                //Send Message
                $msg = 'Dear Student, Your registration details are: Username : ' . $request->mobile . ' Password : ' . $request->mobile . ' Visit : https://bit.ly/3uA3gaJ Regards - HASANAH EDUCATIONAL TRUST';
                $phones = $request->mobile;
                $url = "http://45.249.108.134/api.php";
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, "username=hasanahtrust&password=752761&sender=HETRST&sendto=" . $phones . "&message=" . $msg . "&PEID=1301164733895014972&templateid=1307164922596635229&type=3");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                $response = curl_exec($ch);
                // session()->forget(['mobileotp', 'mobilenumber']);
				$lastId = $agri_retailer->id;
				$request->session()->put('LoggedDash', $lastId);
                // return redirect('dashboard/auth/login')->with(session()->flash('alert-success', 'Registration Success.'));
                return redirect('dashboard/profile')->with(session()->flash('alert-success', 'Registration Success.'));
            } else {
                return redirect()->back()->with(session()->flash('alert-danger', 'Plz Try Again!.'));
            }
        
    }

    public function uploadFarmerRegData(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required|min:10|numeric',

        ]);
        $checkUserExist = User::where('mobile', $request->mobile)->get();
        $c = count($checkUserExist);
        $last_userid = User::orderBy('id', 'desc')->first();
        if (isset($last_userid)) {
            // Sum 1 + last id
            $reuserid = substr($last_userid->user_id, 3);
            $userid = $reuserid + 1;
            $euserid= 'EUC' . $userid . '';
        } else {
            $euserid = 'EUC10001';
        }
        if ($c < 1) {
            $farmerupload = User::create([
                "user_id" => "$euserid",
                "mobile" => "$request->mobile",
                "name" => "$request->name",
                "password" => "$request->mobile",
                "role" => 5,
            ]);
            if ($farmerupload) {
                //Send Message
                $msg = 'Dear Student, Your registration details are: Username : ' . $request->mobile . ' Password : ' . $request->mobile . ' Visit : https://bit.ly/3uA3gaJ Regards - HASANAH EDUCATIONAL TRUST';
                $phones = $request->mobile;
                $url = "http://45.249.108.134/api.php";
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, "username=hasanahtrust&password=752761&sender=HETRST&sendto=" . $phones . "&message=" . $msg . "&PEID=1301164733895014972&templateid=1307164922596635229&type=3");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                $response = curl_exec($ch);
                $lastId = $farmerupload->id;
				$request->session()->put('LoggedDash', $lastId);
                // return redirect('dashboard/auth/login')->with(session()->flash('alert-success', 'Registration Success.'));
                return redirect('dashboard/profile')->with(session()->flash('alert-success', 'Registration Success.'));
            } else {
                return redirect()->back()->with(session()->flash('alert-danger', 'Plz Try Again!.'));
            }
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Already Registered! Try with other No.'));
        }
    }
    public function getPinCodeDetails(Request $request)
    {
        $pincode = $_POST['pincode'];
        $data = file_get_contents('http://postalpincode.in/api/pincode/' . $pincode);
        $data = json_decode($data);
        if (isset($data->PostOffice['0'])) {
            $arr['city'] = $data->PostOffice['0']->Taluk;
            $arr['state'] = $data->PostOffice['0']->State;
            echo json_encode($arr);
        } else {
            echo 'no';
        }
    }
    public function cropInsurance()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedDash'))->first()];
        $user = User::where('id', '=', session('LoggedDash'))->first();
        return view('dashboard.crop_insurance', $data, compact('user'));
    }
    public function uploadCropInsuranceData(Request $request)
    {
        // dd($request->all());
        $request->validate([
            // 'employee_id' => 'required',
            'name' => 'required',
            'mobile' => 'required|numeric',
            'gender' => 'required',
            'dob' => 'required',
            'pincode' => 'required',
            'address' => 'required',
            'district' => 'required',
            'state' => 'required',
            // 'crops_insurred' => 'required',
            'aadhar_card' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            // 'plan_details' => 'required',
            'nominee_name' => 'required',
            'nominee_father' => 'required',
            'nominee_relation' => 'required',

        ]);
        // dd($request->all());
        // die;
        if ($request->hasfile('aadhar_card')) {
            $file = $request->file('aadhar_card');
            $extenstion = $file->getClientOriginalExtension();
            $aadhar_card = 'aadhar_card-' . time() . '.' . $extenstion;
            $file->move(public_path('uploads/insurance-documents'), $aadhar_card);
        }
        // dd($aadhar_card);die;
        $getUserID = User::where('mobile', $request->employee_id)->where('role',4)->first();
        $agentid = User::where('mobile', $request->employee_id)->where('role',4)->get();
        $getUserID = $getUserID->user_id;

        // if (count($agentid) >= 1) {
            $tokenno = time() . rand(1111, 9999);
            $first_date = date("d-M-Y");
            $after_one_year =  date("d-M-Y", strtotime("$first_date +365 day")); // PHP:  2009-03-04
            $cropinsuranceprocess = CropInsuranceProcess::create([
                "token_no" => "$tokenno",
                "type" => "$request->type",
                "employee_id" => "$getUserID",
                "salutation" => "$request->salutation",
                "name" => "$request->name",
                "gender" => "$request->gender",
                "dob" => "$request->dob",
                "mobile" => "$request->mobile",
                "state" => "$request->state",
                "district" => "$request->district",
                "pincode" => "$request->pincode",
                "address" => "$request->address",
                "aadhar_card_pic" => "$aadhar_card",
                "major_crops_insurred" => "$request->crops_insurred",
                "gross_premium" => "$request->gross_premium",
                "nominee_salutation" => "$request->nominee_salutation",
                "tenure" => "$request->tenure",
                "plan_details" => "$request->plan_details",
                "nominee_salutation" => "$request->nominee_salutation",
                "nominee_name" => "$request->nominee_name",
                "nominee_father" => "$request->nominee_father",
                "nominee_dob" => "$request->nominee_dob",
                "nominee_relation" => "$request->nominee_relation",
                "insurance_start_date" => "$first_date",
                "insurance_end_date" => "$after_one_year",
                "status" => 1,
            ]);


            if ($cropinsuranceprocess) {
                if ($request->type == 1) {
                    return redirect('dashboard/crop-insurance-preview' . '/' . $tokenno);
                } else if ($request->type == 2) {
                    return redirect('dashboard/cattle-insurance-preview' . '/' . $tokenno);
                }
            }
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please! try again later.'));
        // } 
        // else {
        //     return redirect()->back()->with(session()->flash('alert-danger', 'Employee Code does not matched.'));
        // }
    }

    //Crop insurance Form Preview Start
    public function cropInsuranceDetailsPreview($tokenno)
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedDash'))->first()];
        $user = User::where('id', '=', session('LoggedDash'))->first();
        $getdetails = CropInsuranceProcess::where('token_no', $tokenno)
            ->join('users', 'users.user_id', '=', 'crop_insurance_processes.employee_id')
            ->select('crop_insurance_processes.*', 'users.name as AgentName')->first();
        return view('dashboard/crop-insurance-details-preview', $data, compact('getdetails', 'user'));
    }
    //Crop insurance Form Preview End
    //upload insurance data start
    public function getInsuranceDone(Request $request)
    {
        $input = $request->all();
        // dd($request);die;
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if (count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error', $e->getMessage());
                $error = Session::get('error');
                // dd($error); die;
                // return redirect()->back();
            }

            $insuranceid = CropInsurance::orderBy('id', 'desc')->first();
            if (isset($insuranceid)) {
                // Sum 1 + last id
                $reuserid = substr($insuranceid->insurance_no, 3);
                $userid = $reuserid + 1;
                $insuranceidgen = 'AGC' . $userid . '';
            } else {
                $insuranceidgen = 'AGC101';
            }
            //getE Employee amount
            $getEmployeeAmount = FixInsuranceAmount::first();
            $getEmployeeAmount = $getEmployeeAmount->agent_amount;

            //fetch data from cropinsurance process
            $fetchprocessdata = CropInsuranceProcess::where('token_no', $request->tokenno)->first();


            $make_insurance = new CropInsurance;
            $make_insurance->token_no = $request->tokenno;
            $make_insurance->type = $request->type;
            $make_insurance->insurance_no = $insuranceidgen;
            $make_insurance->employee_id = $fetchprocessdata->employee_id;
            $make_insurance->agent_id = $fetchprocessdata->employee_id;
            $make_insurance->salutation     = $fetchprocessdata->salutation;
            $make_insurance->name = $fetchprocessdata->name;
            $make_insurance->mobile = $fetchprocessdata->mobile;
            $make_insurance->gender = $fetchprocessdata->gender;
            $make_insurance->dob = $fetchprocessdata->dob;
            $make_insurance->address = $fetchprocessdata->address;
            $make_insurance->pincode = $fetchprocessdata->pincode;
            $make_insurance->state = $fetchprocessdata->state;
            $make_insurance->district = $fetchprocessdata->district;
            $make_insurance->major_crops_insurred = $fetchprocessdata->major_crops_insurred;
            $make_insurance->tenure = $fetchprocessdata->tenure;
            $make_insurance->total_sum_insurred = $fetchprocessdata->total_sum_insurred;
            $make_insurance->gross_premium = $fetchprocessdata->gross_premium;
            $make_insurance->plan_details = $fetchprocessdata->plan_details;
            $make_insurance->nominee_salutation = $fetchprocessdata->nominee_salutation;
            $make_insurance->nominee_name = $fetchprocessdata->nominee_name;
            $make_insurance->nominee_father = $fetchprocessdata->nominee_father;
            $make_insurance->nominee_dob = $fetchprocessdata->nominee_dob;
            $make_insurance->nominee_relation = $fetchprocessdata->nominee_relation;
            $make_insurance->insurance_start_date = $fetchprocessdata->insurance_start_date;
            $make_insurance->insurance_end_date = $fetchprocessdata->insurance_end_date;
            $make_insurance->aadhar_card_pic = $fetchprocessdata->aadhar_card_pic;
            $make_insurance->receipt_no = time() . $fetchprocessdata->id;
            $make_insurance->payment_mobile = $response->contact;
            $make_insurance->payment_email = $response->email;
            $make_insurance->payment_id = $request->razorpay_payment_id;
            $make_insurance->transaction_id = time() . rand(11, 99) . date('yd');
            $make_insurance->transaction_date = now();
            $make_insurance->payment_status = $response->status;
            $make_insurance->payment_card_id = $response->card_id;
            $make_insurance->method = $response->method;
            $make_insurance->wallet = $response->wallet;
            $make_insurance->payment_vpa = $response->vpa;
            $make_insurance->international_payment = $response->international;
            $make_insurance->error_reason = $response->error_reason;
            $make_insurance->save();

            $send_amount = new Wallet;
            $send_amount->transaction_no = rand(111111, 999999);
            $send_amount->insurance_no = $insuranceidgen;
            $send_amount->employee_id = $fetchprocessdata->employee_id;
            $send_amount->amount = $getEmployeeAmount;
            $send_amount->cr_dr = 'Credit';
            $send_amount->paid_by = $insuranceidgen;
            $send_amount->save();
        }
        session()->forget(['employeeotp', 'mobilenumber']);
        if ($make_insurance) {
            return redirect('dashboard/crop-insurance-done/' . $request->tokenno)->with(session()->flash('alert-success', 'Transaction successful.'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please! try again later.'));
        }
    }

    public function cropInsuranceDone($tokenno)
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedDash'))->first()];
        $user = User::where('id', '=', session('LoggedDash'))->first();
        $getdetails = CropInsurance::where('token_no', $tokenno)
            ->join('users', 'users.user_id', '=', 'crop_insurances.employee_id')
            ->select('crop_insurances.*', 'users.name as AgentName')->first();
        return view('dashboard/crop-insurance-done', $data, compact('getdetails', 'user'));
    }
    //upload insurance data end


    //cattle insurance start
    public function cattleInsurance()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedDash'))->first()];
        $user = User::where('id', '=', session('LoggedDash'))->first();
        return view('dashboard.cattle_insurance', $data, compact('user'));
    }
    public function uploadCattleInsuranceData(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'pincode' => 'required',
            'address' => 'required',
            'district' => 'required',
            'state' => 'required',
            'crops_insurred' => 'required',
            'aadhar_card' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'plan_details' => 'required',
            'nominee_name' => 'required',
            'nominee_father' => 'required',
            'nominee_relation' => 'required',

        ]);
        // dd($request);
        // die;
        if ($request->hasfile('aadhar_card')) {
            $file = $request->file('aadhar_card');
            $extenstion = $file->getClientOriginalExtension();
            $aadhar_card = 'aadhar_card-' . time() . '.' . $extenstion;
            $file->move(public_path('uploads/insurance-documents'), $aadhar_card);
        }
        // dd($aadhar_card);die;
        $agentid = User::where('user_id', $request->employee_id)->get();

        if (count($agentid) >= 1) {
            $tokenno = time() . rand(1111, 9999);
            $first_date = date("d-M-Y");
            $after_one_year =  date("d-M-Y", strtotime("$first_date +365 day")); // PHP:  2009-03-04
            $cattleinsuranceprocess = CattleInsuranceProcess::create([
                "token_no" => "$tokenno",
                "employee_id" => "$request->employee_id",
                "salutation" => "$request->salutation",
                "name" => "$request->name",
                "gender" => "$request->gender",
                "dob" => "$request->dob",
                "mobile" => "$request->mobile",
                "state" => "$request->state",
                "district" => "$request->district",
                "pincode" => "$request->pincode",
                "address" => "$request->address",
                "aadhar_card_pic" => "$aadhar_card",
                "major_crops_insurred" => "$request->crops_insurred",
                "plan_details" => "$request->plan_details",
                "nominee_salutation" => "$request->nominee_salutation",
                "nominee_name" => "$request->nominee_name",
                "nominee_father" => "$request->nominee_father",
                "nominee_dob" => "$request->nominee_dob",
                "nominee_relation" => "$request->nominee_relation",
                "insurance_start_date" => "$first_date",
                "insurance_end_date" => "$after_one_year",
                "status" => 1,
            ]);
            if ($cattleinsuranceprocess) {
                return redirect('dashboard/cattle-insurance-preview' . '/' . $tokenno);
            }
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please! try again later.'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Employee Code does not matched.'));
        }
    }

    //Cattle insurance Form Preview Start
    public function cattleInsuranceDetailsPreview($tokenno)
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedDash'))->first()];
        $user = User::where('id', '=', session('LoggedDash'))->first();
        $getdetails = CropInsuranceProcess::where('token_no', $tokenno)
            ->join('users', 'users.user_id', '=', 'crop_insurance_processes.employee_id')
            ->select('crop_insurance_processes.*', 'users.name as AgentName')->first();
        return view('dashboard/cattle-insurance-details-preview', $data, compact('getdetails', 'user'));
    }
    //Cattle insurance Form Preview End
    //upload insurance data start
    public function getCattleInsuranceDone(Request $request)
    {
        $input = $request->all();
        // dd($request);die;
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if (count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error', $e->getMessage());
                $error = Session::get('error');
                // dd($error); die;
                // return redirect()->back();
            }

            $insuranceid = CattleInsurance::orderBy('id', 'desc')->first();
            if (isset($insuranceid)) {
                // Sum 1 + last id
                $reuserid = substr($insuranceid->insurance_no, 3);
                $userid = $reuserid + 1;
                $insuranceidgen = 'AGC' . $userid . '';
            } else {
                $insuranceidgen = 'AGC101';
            }

            $fetchprocessdata = CattleInsuranceProcess::where('token_no', $request->tokenno)->first();
            $make_insurance = new CattleInsurance;
            $make_insurance->token_no = $request->tokenno;
            $make_insurance->insurance_no = $insuranceidgen;
            $make_insurance->employee_id = $fetchprocessdata->employee_id;
            $make_insurance->salutation     = $fetchprocessdata->salutation;
            $make_insurance->name = $fetchprocessdata->name;
            $make_insurance->mobile = $fetchprocessdata->mobile;
            $make_insurance->gender = $fetchprocessdata->gender;
            $make_insurance->dob = $fetchprocessdata->dob;
            $make_insurance->address = $fetchprocessdata->address;
            $make_insurance->pincode = $fetchprocessdata->pincode;
            $make_insurance->state = $fetchprocessdata->state;
            $make_insurance->district = $fetchprocessdata->district;
            $make_insurance->major_crops_insurred = $fetchprocessdata->major_crops_insurred;
            $make_insurance->plan_details = $fetchprocessdata->plan_details;
            $make_insurance->nominee_salutation = $fetchprocessdata->nominee_salutation;
            $make_insurance->nominee_name = $fetchprocessdata->nominee_name;
            $make_insurance->nominee_father = $fetchprocessdata->nominee_father;
            $make_insurance->nominee_dob = $fetchprocessdata->nominee_dob;
            $make_insurance->nominee_relation = $fetchprocessdata->nominee_relation;
            $make_insurance->insurance_start_date = $fetchprocessdata->insurance_start_date;
            $make_insurance->insurance_end_date = $fetchprocessdata->insurance_end_date;
            $make_insurance->aadhar_card_pic = $fetchprocessdata->aadhar_card_pic;
            $make_insurance->receipt_no = time() . $fetchprocessdata->id;
            $make_insurance->payment_mobile = $response->contact;
            $make_insurance->payment_email = $response->email;
            $make_insurance->payment_id = $request->razorpay_payment_id;
            $make_insurance->transaction_id = time() . rand(11, 99) . date('yd');
            $make_insurance->transaction_date = now();
            $make_insurance->payment_status = $response->status;
            $make_insurance->payment_card_id = $response->card_id;
            $make_insurance->method = $response->method;
            $make_insurance->wallet = $response->wallet;
            $make_insurance->payment_vpa = $response->vpa;
            $make_insurance->international_payment = $response->international;
            $make_insurance->error_reason = $response->error_reason;
            $make_insurance->save();
        }
        if ($make_insurance) {
            return redirect('dashboard/cattle-insurance-done/' . $request->tokenno)->with(session()->flash('alert-success', 'Transaction successful.'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please! try again later.'));
        }
    }
    //upload insurance data end
    public function cattleInsuranceDone($tokenno)
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedDash'))->first()];
        $user = User::where('id', '=', session('LoggedDash'))->first();
        $getdetails = CattleInsurance::where('token_no', $tokenno)
            ->join('users', 'users.user_id', '=', 'cattle_insurances.employee_id')
            ->select('cattle_insurances.*', 'users.name as AgentName')->first();
        return view('dashboard/cattle-insurance-done', $data, compact('getdetails', 'user'));
    }
    public function kisanLoan()
    {
        return view('dashboard/kisan_loan');
    }
    //Apply for Kisan loan area
    public function applyForKisanLoan(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'mobile' => 'required|numeric',
            'aadhar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'pan' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        // dd($request->all());
        // die;
        if ($request->hasfile('aadhar')) {
            $file = $request->file('aadhar');
            $extenstion = $file->getClientOriginalExtension();
            $aadhar = 'aadhar-' . time() . '.' . $extenstion;
            $file->move(public_path('uploads/kisanloan'), $aadhar);
        }
        if ($request->hasfile('pan')) {
            $file = $request->file('pan');
            $extenstion = $file->getClientOriginalExtension();
            $pan = 'pan-' . time() . '.' . $extenstion;
            $file->move(public_path('uploads/kisanloan'), $pan);
        }

        $kisanloandetails =  KisanLoan::create([
            "name" => "$request->name",
            "mobile" => "$request->mobile",
            "aadhar" => "$aadhar",
            "pan" => "$pan",
        ]);
        if ($kisanloandetails) {
            return redirect()->back()->with(session()->flash('alert-success', 'Applied Successfully.'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please! try again later.'));
        }
    }
    // Agriculture shop search area
    public function agricultureShop(Request $request)
    {
        $data = null;
        $statelist = State::get();
        $districtlist = District::get();
        return view('dashboard.agricultureshop', compact('districtlist','statelist'));
    }
    public function agriShopSearch(Request $request)
    {
        $state = $request->get('state');
        $district = $request->get('district');
        $pin = $request->get('pin');
        if ($pin !== null) {

            $agrishops = User::where('users.state', $state)->where('users.district', $district)->where('pincode', $pin)->where('role', 2)
                ->join('districts', 'users.district', '=', 'districts.id_district')
                // ->join('blocks', 'students.block_id', '=', 'blocks.id')
                ->select('districts.*', 'users.*')
                ->paginate(15);
            $districtName = District::where('id_district', $district)->first();
            // $districtName = $districtName->name;
        }
        return view('dashboard/agri-shop-search-details', compact('agrishops', 'districtName', 'pin'));
    }

    // Cattle doctor search area
    public function cattleDoctors(Request $request)
    {
        $data = null;
        $statelist = State::get();
        $districtlist = District::get();
        return view('dashboard.cattledoctor', compact('districtlist','statelist'));
    }
    public function cattleDoctorSearch(Request $request)
    {
        $state = $request->get('state');
        $district = $request->get('district');
        $pin = $request->get('pin');
        if ($pin !== null && $state!==null && $district!==null) {

            $cattledoctor = User::where('users.state', $state)->where('users.district', $district)->where('pincode', $pin)->where('role', 3)
                ->join('districts', 'users.district', '=', 'districts.id_district')
                // ->join('blocks', 'students.block_id', '=', 'blocks.id')
                ->select('districts.*', 'users.*')
                ->paginate(15);
            $districtName = District::where('id_district', $district)->first();
            // $districtName = $districtName->name;
        }
		else{
			
		}
        return view('dashboard/cattle-doctor-search-details', compact('cattledoctor', 'districtName', 'pin'));
    }
}