<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\Contractor;
use App\Models\User_login_history;
use App\Models\Employee;
use App\Models\Project;
use App\Models\Project_category;
use App\Models\User_project;
use App\Models\User_upload_images;
use App\Models\Work;
use App\Models\Student;
use App\Models\Wallet;

class EmployeeController extends Controller
{
    public function login(){
        return view('employee/auth/login');
    }

    public function employeeAuthLogin(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);
        
        $ip=$_SERVER['REMOTE_ADDR'];
        $userLoginHistory = User_login_history::create([
            "user_id" => "$request->username",
            "ip_address" => "$ip"
        ]);
        
        $userInfo = User::where('user_id','=',$request->username)->where('role', '2')->where('status', '1')->first();
        if (!$userInfo) {
            return redirect()->route('employee.login')->with(session()->flash('alert-warning', 'Failed! We do not recognize your username.'));
        } else if ($userInfo->status == '0') {
            return redirect()->route('employee.login')->with(session()->flash('alert-danger', 'Your account is blocked. Please! contact company for un-block.'));
        } else if ($request->password === $userInfo->password) {
            $request->session()->put('LoggedEmployee', $userInfo->id);
            return redirect('employee/home');
        } else {
            return redirect()->route('employee.login')->with(session()->flash('alert-danger', 'Failed! Incorrect Password.'));
        }
        
        
    }
        
    public function employeeLogout(){
        if (session()->has('LoggedEmployee')) {
            session()->pull('LoggedEmployee');
            return redirect('employee/login')->with(session()->flash('alert-success', 'You are successfully Logged out'));
        }
    }
    
    public function employeeHome(){
        $data = ['LoggedEmployee'=>User::where('id','=', session('LoggedEmployee'))->first()];
        $employeedata = User::where('user_id', $data['LoggedEmployee']->user_id)->first();
        $employeedetails = Employee::where('user_id', $data['LoggedEmployee']->user_id)->first();
        $userloginhistory = User_login_history::where('user_id', $data['LoggedEmployee']->user_id)->get();
        $historycount = count($userloginhistory);
        if ($historycount == 1) {
            $lastLoginTime = User_login_history::where('user_id', $data['LoggedEmployee']->user_id)->orderBy('id', 'desc')->take(1)->first();
        } else{
            $lastLoginTime = User_login_history::where('user_id', $data['LoggedEmployee']->user_id)->orderBy('id', 'desc')->skip(1)->take(1)->first();
        } 
        return view('employee/home', $data, compact('employeedata','employeedetails','lastLoginTime'));
    }

    public function onGoingProject(){
        $data = ['LoggedEmployee'=>User::where('id','=', session('LoggedEmployee'))->first()];
        $employeedata = User::where('user_id', $data['LoggedEmployee']->user_id)->first();
        $employeedetails = Employee::where('user_id', $data['LoggedEmployee']->user_id)->first();
        $userloginhistory = User_login_history::where('user_id', $data['LoggedEmployee']->user_id)->get();
        $historycount = count($userloginhistory);
        if ($historycount == 1) {
            $lastLoginTime = User_login_history::where('user_id', $data['LoggedEmployee']->user_id)->orderBy('id', 'desc')->take(1)->first();
        } else{
            $lastLoginTime = User_login_history::where('user_id', $data['LoggedEmployee']->user_id)->orderBy('id', 'desc')->skip(1)->take(1)->first();
        }
        $worklist = Work::where('employee_id', $employeedetails->user_id)
                        ->where('work_completed_status', '=', '')
                        ->paginate(10);
        return view('employee/ongoing-project', $data, compact('employeedata','employeedetails', 'lastLoginTime', 'worklist'));
    }
    public function completedProject(){
        $data = ['LoggedEmployee'=>User::where('id','=', session('LoggedEmployee'))->first()];
        $employeedata = User::where('user_id', $data['LoggedEmployee']->user_id)->first();
        $employeedetails = Employee::where('user_id', $data['LoggedEmployee']->user_id)->first();
        $userloginhistory = User_login_history::where('user_id', $data['LoggedEmployee']->user_id)->get();
        $historycount = count($userloginhistory);
        if ($historycount == 1) {
            $lastLoginTime = User_login_history::where('user_id', $data['LoggedEmployee']->user_id)->orderBy('id', 'desc')->take(1)->first();
        } else{
            $lastLoginTime = User_login_history::where('user_id', $data['LoggedEmployee']->user_id)->orderBy('id', 'desc')->skip(1)->take(1)->first();
        }
        $worklist = Work::where('employee_id', $employeedetails->user_id)
                        ->where('work_completed_status', '=', '2')
                        ->paginate(10);
        return view('employee/completed-project', $data, compact('employeedata','employeedetails', 'lastLoginTime', 'worklist'));
    }
    public function worksDetails($workid){
        $data = ['LoggedEmployee'=>User::where('id','=', session('LoggedEmployee'))->first()];
        $employeedata = User::where('user_id', $data['LoggedEmployee']->user_id)->first();
        // $workid = $request->post('workid');
        $flag = false;
        if ($workid !== null) {
            $flag = true;
            $workdetailsdata = Work::where('id', $workid)->first();
            $teacherdata = Student::where('student_id', $workdetailsdata->teacher_id)->first();
            $employeelist = User::where('role','2')
                            ->join('employees', 'employees.user_id', '=', 'users.user_id')
                            ->select('employees.*', 'users.*')
                            ->get();

            return view('employee/viewworkdetails', $data, compact('employeedata','workdetailsdata', 'flag', 'teacherdata', 'employeelist'));
        } else {
            return view('employee/viewworkdetails', $data, compact('flag'));
        }
    }
    public function markAsWorkCompleted(Request $request){
        $request->validate([
            'employee_id' => 'required',
            'work_id' => 'required',
        ]);
        $employeeid = $request->post('employee_id');   
        $workassignupdate = Work::where('employee_id', '=', $request->employee_id)
                            ->where('status', '=', '3')
                            ->where('id', '=', $request->work_id)
                                            ->update([
                                                'employee_id' => $request->employee_id,
                                                'work_completed_status' => 1,
                                                'work_completed_date' => now(),
                                                
                                            ]);
        
        if ($workassignupdate) {
            return redirect('employee/ongoing-project')->with(session()->flash('alert-success', 'Hurray! Mark as Completed successful.'));
        } else{
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please! try again later.'));
        }
    }
    public function viewProjectDetailsOn(Request $request){
        $data = ['LoggedEmployee'=>User::where('id','=', session('LoggedEmployee'))->first()];
        $employeedata = User::where('user_id', $data['LoggedEmployee']->user_id)->first();
        $employeedetails = Employee::where('user_id', $data['LoggedEmployee']->user_id)->first();
        $projectid = $request->post('project_id');
        $userid = $request->post('user_id');
        $contractdata = Contractor::where('user_id', $userid)->first();
        $companydata = Company::where('company_id',$contractdata->company_id)->first();
        // dd($companydata); die;
        $userloginhistory = User_login_history::where('user_id', $data['LoggedEmployee']->user_id)->get();
            $historycount = count($userloginhistory);
            if ($historycount == 1) {
                $lastLoginTime = User_login_history::where('user_id', $data['LoggedEmployee']->user_id)->orderBy('id', 'desc')->take(1)->first();
            } else{
                $lastLoginTime = User_login_history::where('user_id', $data['LoggedEmployee']->user_id)->orderBy('id', 'desc')->skip(1)->take(1)->first();
            } 
        $flag = false;  
        if ($projectid !== null) {
            $flag = true;  
            $userData = User_project::where('user_id', '=', $data['LoggedEmployee']->user_id)->first();
            $projectData = Project::where('project_id', '=', $projectid)->first();
            $companyData = Company::where('company_id', '=', $projectData->company_id)->first();
            $projectCatData = Project_category::where('project_cat_id', '=', $projectData->project_cat)->first();
            $user_project_images = User_upload_images::where('user_id', '=', $userid)
                                                    ->where('project_id', '=', $projectid)
                                                    ->get();
            return view('employee/viewProjectDetails',$data, compact('employeedata','employeedetails','userData','flag','projectData','companyData','projectCatData','user_project_images','companydata','lastLoginTime'));
        }
        else{
            return view('employee/viewProjectDetails',$data, compact('employeedata','employeedetails','flag','companydata','lastLoginTime'));
        }
    }
    public function myWallet()
    {
        $data = ['LoggedEmployee'=>User::where('id','=', session('LoggedEmployee'))->first()];
        $employeedata = User::where('user_id', $data['LoggedEmployee']->user_id)->first();
        $employeedetails = Employee::where('user_id', $data['LoggedEmployee']->user_id)->first();
        // $employee_amount = Wallet::
        $employee_amount = Wallet::where('employee_id', '=', $data['LoggedEmployee']->user_id)
                                ->where('cr_dr', '=', 'Credit')
                                ->sum('amount');
        // dd($employee_amount); die;

        $userloginhistory = User_login_history::where('user_id', $data['LoggedEmployee']->user_id)->get();
            $historycount = count($userloginhistory);
            if ($historycount == 1) {
                $lastLoginTime = User_login_history::where('user_id', $data['LoggedEmployee']->user_id)->orderBy('id', 'desc')->take(1)->first();
            } else{
                $lastLoginTime = User_login_history::where('user_id', $data['LoggedEmployee']->user_id)->orderBy('id', 'desc')->skip(1)->take(1)->first();
            } 
            return view('employee/my-wallet',$data, compact('employeedata','employeedetails','lastLoginTime','employee_amount'));
    }
    public function walletHistory(){
        $data = ['LoggedEmployee'=>User::where('id','=', session('LoggedEmployee'))->first()];
        $employeedata = User::where('user_id', $data['LoggedEmployee']->user_id)->first();
        $employeedetails = Employee::where('user_id', $data['LoggedEmployee']->user_id)->first();
        $userloginhistory = User_login_history::where('user_id', $data['LoggedEmployee']->user_id)->get();
        $historycount = count($userloginhistory);
        if ($historycount == 1) {
            $lastLoginTime = User_login_history::where('user_id', $data['LoggedEmployee']->user_id)->orderBy('id', 'desc')->take(1)->first();
        } else{
            $lastLoginTime = User_login_history::where('user_id', $data['LoggedEmployee']->user_id)->orderBy('id', 'desc')->skip(1)->take(1)->first();
        }
        $wallethistory = Wallet::where('employee_id', $employeedetails->user_id)
                        // ->where('work_completed_status', '=', '2')
                        ->paginate(10);
        return view('employee/wallet-history', $data, compact('employeedata','employeedetails', 'lastLoginTime', 'wallethistory'));
    }
    
}