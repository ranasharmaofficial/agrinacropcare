<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\Company;
use App\Models\User;
use App\Models\Logo;
use App\Models\Contact_detail;
use App\Models\Contractor;
use App\Models\Course;
use App\Models\Distributor;
use App\Models\Employee;
use App\Models\Social_link;
use App\Models\Slider;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Notice;
use App\Models\Student;
use App\Models\Work;
use App\Models\District;
use App\Models\Block;
use App\Models\Wallet;
use App\Models\CropInsurance;
use App\Models\CattleInsurance;
use App\Models\FixInsuranceAmount;
use App\Models\KisanLoan;
use Illuminate\Support\Facades\Hash;


// use Image;

class AdminController extends Controller
{
    public function login(){
        return view('admin/auth/login');
    }
    public function adminAuthLogin(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required|min:6|max:20'
        ]);

        $adminInfo = User::where('user_id','=',$request->username)->first();
        if (!$adminInfo) {
            return redirect()->route('admin.auth.login')->with(session()->flash('alert-warning', 'Failed! We do not recognize your username.'));
        } else if ($request->password === $adminInfo->password) {
            $request->session()->put('LoggedUser', $adminInfo->id);
            return redirect('admin/home');
        } else {
            return redirect()->route('admin.auth.login')->with(session()->flash('alert-danger', 'Failed! Incorrect Password.'));
        }
    }    
    public function logout(){
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('admin/auth/login');
        }
    }
    public function adminHome(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        // $distributor = User::where('role','3')->count();
        $totalemployee = User::where('role','2')->count();
        $totalteacher = Student::count();
        return view('admin/home', $data, compact('totalemployee', 'totalteacher'));
    }
    public function updateContactDetails(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $contact = Contact_detail::first();
        return view('admin/updatecontactdetails', $data, compact('contact'));
    }

    public function addStudent(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('admin/addstudent', $data);
    }
    public function viewStudent(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('admin/viewstudent', $data);
    }
    public function userList(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $userdatas = User::where('role', '4')->paginate(10);
        return view('admin/userlist', $data, compact('userdatas'));
    }
    public function teacherList(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $teacherlist = Student::paginate(10);
        return view('admin/teacherlist', $data, compact('teacherlist'));
    }
    public function dataList(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $worklist = Work::paginate(2);
        return view('admin/datalist', $data, compact('worklist'));
    }
    public function workCompletedRequest(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $worklist = Work::where('work_completed_status', '=', '2')
                ->paginate(10);
        return view('admin/workcompletedrequest', $data, compact('worklist'));
    }

    public function updateAmount(Request $request){
        $request->validate([
            'teacherid' => 'required',
            'amount' => 'required',
            'user_work_amount' => 'required',
        ]);

        $updateamount = Work::where('id', $request->teacherid)
                            ->update([
                                    'status' => 2,
                                    'amount' => $request->amount,
                                    'user_work_amount' => $request->user_work_amount,
                                ]);
        // $contractorblock = Contractor::where('user_id', $request->userid)
        //                     ->update([
        //                             'status' => 0,
        //                         ]);
        
        if ($updateamount) {
            return redirect()->back()->with(session()->flash('alert-info', 'Amount Request Successfully!.'));
        }
        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.'));        
    }
    
    public function makePaymentToWallet(Request $request){
        $request->validate([
            'work_id' =>'required',
            'amount' =>'required',
            'employee_id' =>'required',

        ]);
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $addtowallet = Wallet::create([
            "transaction_no" => rand(111111,999999),
            "work_id" => "$request->work_id",
            "employee_id" => "$request->employee_id",
            "amount" => "$request->amount",
            "cr_dr" => "Credit",
            "paid_by" => $data['LoggedUserInfo']->user_id
        ]);
        $updateWorkdetailstable = Work::where('id', $request->work_id)
        ->update([
                'work_completed_status' => 2,
            ]);
        if ($addtowallet && $updateWorkdetailstable) {
            return redirect('admin/work-completed-request')->with(session()->flash('alert-info', 'Paid to Employee Successfully!.'));
        }
        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.'));        
    }
    public function blockUserContract(Request $request){
        $request->validate([
            'userid' => 'required',
        ]);

        $userblock = User::where('user_id', $request->userid)
                            ->update([
                                    'status' => 0,
                                ]);
        $contractorblock = Contractor::where('user_id', $request->userid)
                            ->update([
                                    'status' => 0,
                                ]);
        
        if ($userblock && $contractorblock) {
            return redirect()->back()->with(session()->flash('alert-info', 'User Successfully Blocked.'));
        }
        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.'));        
    }

    public function unBlockUserContract(Request $request){
        $request->validate([
            'userid' => 'required',
        ]);

        $userunblock = User::where('user_id', $request->userid)
                            ->update([
                                    'status' => 1,
                                ]);
        $contractorunblock = Contractor::where('user_id', $request->userid)
                            ->update([
                                    'status' => 1,
                                ]);
        
        if ($userunblock && $contractorunblock) {
            return redirect()->back()->with(session()->flash('alert-success', 'User Successfully Un-Blocked.'));
        }
        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.'));        
    }

    public function createProject(){
        $companydata = Company::get();
        $projectdata = Project_category::get();
        $distributordata = Distributor::get();
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('admin/createproject',$data, compact('companydata', 'projectdata', 'distributordata'));
    }
    public function createProjectCategory(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $companydata = Company::get();
        return view('admin/createprojectcategory',$data, compact('companydata'));
    }
    
    public function addCourse(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('admin/addcourse', $data);
    }
    public function courseList(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $courselists = Course::paginate(10);
        return view('admin/courselist', $data, compact('courselists'));
    }
    public function addEvent(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('admin/addevent', $data);
    }
    public function eventList()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $eventlists = Event::paginate(10);
        return view('admin/event-list', $data, compact('eventlists'));
    }
    public function deleteEvent(Request $request){
        $request->validate([
            'eventid' => 'required',
        ]);
        $eventdelete = Event::where('eventID',$request->eventid)->delete();
        if ($eventdelete) {
            return redirect()->back()->with(session()->flash('alert-success', 'Event Successfully Deleted'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.'));
        }
    }
    public function addNotice(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('admin/addnotice', $data);
    }
    public function noticeList(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('admin/noticelist', $data);
    }
    public function enquiryList(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('admin/enquirylist', $data);
    }
    public function emailsubscriptionList(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('admin/emailsubscribelist', $data);
    }
    public function addGallery(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('admin/addgallery', $data);
    }
    public function galleryList()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $gallerylists = Gallery::paginate(10);
        return view('admin/gallerylist', $data, compact('gallerylists'));
    }
    public function deleteGalleryImage(Request $request){
        $request->validate([
            'galleryid' => 'required',
        ]);
        $gallerydelete = Gallery::where('id',$request->galleryid)->delete();
        if ($gallerydelete) {
            return redirect()->back()->with(session()->flash('alert-success', 'Gallery Image Successfully Deleted'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.'));
        }
    }
    public function addSlider(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('admin/addSlider', $data);
    }
    public function sliderList(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('admin/sliderlist', $data);
    }
    public function updateLogo(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('admin/updatelogo', $data);
    }
    
    public function socialMediaLinks(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $sociallink = Social_link::first();
        return view('admin/updatesocialmedia', $data, compact('sociallink'));
    }
    public function uploadHeaderLogo(Request $request){
        $request->validate([
            'headerlogo' =>'required|image|mimes:jpeg,png,jpg,svg|max:300'
        ]);
        $headerlogo = new Logo();
        if ($request->hasfile('headerlogo')) {
            $file = $request->file('headerlogo');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'header-logo-'.time().'.'.$extenstion;
            $file->move(public_path('uploads/logos'), $filename);
        }
        $headerlogo->logo_id = rand(111111, 999999);        
        $headerlogo->logo = $filename;        
        $headerlogo->logoType = 1;   
        $headerlogo->save();   
        if ($headerlogo) {
            return redirect()->back()->with(session()->flash('alert-success', 'Header Logo Successfully Uploaded'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.')); 
        } 
    }
    public function uploadFooterLogo(Request $request){
        $request->validate([
            'footerlogo' =>'required|image|mimes:jpeg,png,jpg,svg|max:300'
        ]);
        $footerlogo = new Logo();
        if ($request->hasfile('footerlogo')) {
            $file = $request->file('footerlogo');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'footer-logo-'.time().'.'.$extenstion;
            $file->move(public_path('uploads/logos'), $filename);
        }
        $footerlogo->logo_id = rand(111111, 999999);        
        $footerlogo->logo = $filename;        
        $footerlogo->logoType = 2;   
        $footerlogo->save();   
        if ($footerlogo) {
            return redirect()->back()->with(session()->flash('alert-success', 'Footer Logo Successfully Uploaded'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.')); 
        } 
    }
    public function uploadFaviconLogo(Request $request){
        $request->validate([
            'faviconlogo' =>'required|image|mimes:jpeg,png,jpg,svg|max:300'
        ]);
        $faviconlogo = new Logo();
        if ($request->hasfile('faviconlogo')) {
            $file = $request->file('faviconlogo');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'favicon-'.time().'.'.$extenstion;
            $file->move(public_path('uploads/logos'), $filename);
        }
        $faviconlogo->logo_id = rand(111111, 999999);        
        $faviconlogo->logo = $filename;        
        $faviconlogo->logoType = 3;   
        $faviconlogo->save();   
        if ($faviconlogo) {
            return redirect()->back()->with(session()->flash('alert-success', 'Favicon Successfully Uploaded'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.')); 
        } 
    }
    public function uploadContactDetails(Request $request){
        $request->validate([
            'mobile' => 'required|max:15',
            'altmobile' => 'max:15',
            'email' => 'required|email|max:150',
            'address' => 'required|max:150'
        ]);
        $altmobile = $request->altmobile;
        $uploadcontact = new Contact_detail;
        $uploadcontact->contact_id = rand(111111,999999);
        $uploadcontact->mobile = $request->mobile;
        if ($altmobile !== '') {
            $uploadcontact->altMobile = $altmobile;
        }
        $uploadcontact->email = $request->email;
        $uploadcontact->address = $request->address;
        $uploadcontact->save();
        if ($uploadcontact) {
            return redirect()->back()->with(session()->flash('alert-success', 'Contact Details Successfully Uploaded'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.')); 
        } 
    }

    public function updateContactDetailsU(Request $request){
        $request->validate([
            'mobile' => 'required|max:15',
            'altmobile' => 'max:15',
            'email' => 'required|email|max:150',
            'address' => 'required|max:150',
            'contactid' => 'required'
        ]);
        $altmobile = $request->altmobile;
        if ($altmobile !== '') {
            $updatecontactdetails = Contact_detail::where('contact_id', $request->contactid)
                                      ->update([
                                        'contact_id' => rand(111111,999999),
                                        'mobile' => $request->mobile,
                                        'altMobile' => $request->altmobile,
                                        'email' => $request->email,
                                        'address' => $request->address
                                        ]);
        } else {
            $updatecontactdetails = Contact_detail::where('contact_id', $request->contactid)
                                      ->update([
                                        'contact_id' => rand(111111,999999),
                                        'mobile' => $request->mobile,
                                        'email' => $request->email,
                                        'address' => $request->address
                                        ]);
        }
        
        if ($updatecontactdetails) {
            return redirect()->back()->with(session()->flash('alert-info', 'Contact Details Successfully Updated'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.')); 
        } 
    }

    public function uploadCourseDetails(Request $request){
        $request->validate([
            'coursename' => 'required',
            'coursetitle' => 'required',
            'coursedetails' => 'required',
            'courseimage' => 'required|max:500'
        ]);

        if ($request->hasfile('courseimage')) {
            $file = $request->file('courseimage');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'course-'.time().'.'.$extenstion;
            $file->move(public_path('uploads/courses'), $filename);
        }

        $coursepost = Course::create([
            "course_id" => rand(111111,999999),
            "courseName" => "$request->coursename",
            "courseTitle" => "$request->coursetitle",
            "courseDetails" => "$request->coursedetails",
            "slug" => "$request->coursetitle",
            "courseImage" => "$filename"
        ]);

        if ($coursepost) {
            return redirect()->back()->with(session()->flash('alert-success', 'Course Successfully Uploaded'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.')); 
        } 
    }

    public function getcoursedetails(Request $request){
        $courseid = $request->post('courseid');
        $data = Course::where('course_id',$courseid)->pluck('courseDetails')->first();
        return $data;        
    }

    public function uploadSocialLinks(Request $request){
        $request->validate([
            'facebook' => 'required|max:150',
            'instagram' => 'required|max:150',
            'twitter' => 'max:150',
            'linkedin' => 'max:150'
        ]);

        $sociallinks = new Social_link;
        $sociallinks->facebook = $request->facebook;
        $sociallinks->instagram = $request->instagram;
        $sociallinks->linkedin = $request->linkedin;
        $sociallinks->twitter = $request->twitter;
        $sociallinks->save();
        if ($sociallinks) {
            return redirect()->back()->with(session()->flash('alert-success', 'Social Links Successfully Uploaded'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.')); 
        } 
    }

    public function updateSocialLinks(Request $request){
        $request->validate([
            'facebook' => 'required|max:150',
            'instagram' => 'required|max:150',
            'twitter' => 'max:150',
            'linkedin' => 'max:150',
            'socialid' => 'required'
        ]);

        $updatesociallink = Social_link::where('id', $request->socialid)
                                    ->update([
                                    'facebook' => $request->facebook,
                                    'instagram' => $request->instagram,
                                    'linkedin' => $request->linkedin,
                                    'twitter' => $request->twitter
                                    ]);

        if ($updatesociallink) {
            return redirect()->back()->with(session()->flash('alert-info', 'Social Links Successfully Updated'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.')); 
        } 
    }
    public function uploadSlider(Request $request){
        $request->validate([
            'title' => 'required|max:100',
            'slider' => 'required|max:500|image|mimes:jpg,jpeg,png,svg'
        ]);

        $sliderupload = new Slider;
        $sliderupload->title = $request->title;
        if ($request->hasfile('slider')) {
            $file = $request->file('slider');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'slider-'.time().'.'.$extenstion;
            $file->move(public_path('uploads/sliders'), $filename);
            $sliderupload->sliderImage = $filename;
        }
        $sliderupload->save();
        if ($sliderupload) {
            return redirect()->back()->with(session()->flash('alert-success', 'Slider Successfully Uploaded'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.')); 
        } 
    }

    public function updateSlider(Request $request){
        $request->validate([
            'title' => 'required|max:100',
            'slider' => 'required|max:500',
            'sliderid' => 'required'
        ]);
        if ($request->hasfile('slider')) {
            $file = $request->file('slider');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'slider-'.time().'.'.$extenstion;
            $file->move(public_path('uploads/sliders'), $filename);
        }
        $updateslider = Slider::where('id', $request->sliderid)
                                    ->update([
                                    'title' => $request->title,
                                    'sliderImage' => $filename
                                    ]);

        if ($updateslider) {
            return redirect()->back()->with(session()->flash('alert-info', 'Slider Successfully Updated'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.')); 
        } 
    }

    public function uploadEvent(Request $request){
        $request->validate([
            'event_name' => 'required',
            'event_title' => 'required',
            'details' => 'required',
            'event_image' => 'required|max:300|image|mimes:jpg,jpeg,png,svg'
        ]);

        $addevent = new Event;
        if ($request->hasfile('event_image')) {
            $file = $request->file('event_image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'event-image-'.time().'.'.$extenstion;
            $file->move(public_path('uploads/events'), $filename);
        }
        $addevent->eventID = time().date('Ym');
        $addevent->eventName = $request->event_name;
        $addevent->eventTitle = $request->event_title;
        $addevent->eventDetails = $request->details;
        $addevent->slug = $request->event_title;
        $addevent->eventImage = $filename;
        $addevent->save();
        if ($addevent) {
            return redirect()->back()->with(session()->flash('alert-info', 'Events Successfully Uploaded'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.')); 
        } 
    }

    public function uploadGalleryImage(Request $request){
        $request->validate([
            'galleryTitle' => 'required',
            'galleryImage' => 'required|max:300|image|mimes:jpg,jpeg,png,svg'
        ]);

        $addgalleryimage = new Gallery;
        if ($request->hasfile('galleryImage')) {
            $file = $request->file('galleryImage');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'gallery-image-'.time().'.'.$extenstion;
            $file->move(public_path('uploads/gallery'), $filename);
        }
        $addgalleryimage->galleryTitle = $request->galleryTitle;
        $addgalleryimage->galleryImage = $filename;
        $addgalleryimage->save();
        if ($addgalleryimage) {
            return redirect()->back()->with(session()->flash('alert-info', 'Gallery Image Successfully Uploaded'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.')); 
        } 
    }

    public function uploadNotice(Request $request){
        $request->validate([
            'notice_name' => 'required',
            'notice_title' => 'required',
            'details' => 'required',
            'noticeImage' => 'required|max:300|image|mimes:jpg,jpeg,png,svg'
        ]);

        $addnotice = new Notice;
        if ($request->hasfile('noticeImage')) {
            $file = $request->file('noticeImage');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'notice-image-'.time().'.'.$extenstion;
            $file->move(public_path('uploads/notices'), $filename);
        }
        $addnotice->noticeID = time().date('Ym');
        $addnotice->noticeName = $request->notice_name;
        $addnotice->noticeTitle = $request->notice_title;
        $addnotice->noticeDetails = $request->details;
        $addnotice->slug = $request->notice_title;
        $addnotice->noticeImage = $filename;
        $addnotice->save();
        if ($addnotice) {
            return redirect()->back()->with(session()->flash('alert-info', 'Notice Successfully Uploaded'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.')); 
        } 
    }

    
    // Start Company Code
    // View Code
    public function createCompany(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('admin/createcompany',$data);
    }
    public function companyList(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $company = Company::paginate(10);
        return view('admin/companylist',$data, compact('company'));
    }
    public function viewCompany(Request $request){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $getcompanyid = $request->post('company_id');
        $flag = false;
        if ($getcompanyid !== null) {
            $flag = true;
            $companydata = Company::where('company_id', $getcompanyid)->first();
            //  dd($companydata);die;
           
            return view('admin/viewcompany', $data, compact('companydata', 'flag'));
        } else {
            return view('admin/viewcompany', $data, compact('flag'));
        }
    }
    public function updateCompany($companyid){
        $coid = Company::where('company_id',$companyid)->first();
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('admin/updatecompany',$data, compact('coid'));
    }

    //Create Code
    public function createHtrustCompany(Request $request){
        $request->validate([
            'established_date' => 'required|date',
            'company_name' => 'required',
            'owner_name' => 'required',
            'landmark' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pin_code' => 'required',
            'mobile_no' => 'required',
            'email' => 'required|email',
            'company_logo' => 'required|max:300|image|mimes:jpg,jpeg,png,svg'
        ]);

        $createcompany = new Company;
        $createcompany->company_id = time().date('md');
        $createcompany->registration_number = time().date('Ymd');
        $createcompany->company_name = $request->company_name;
        $createcompany->owner_name = $request->owner_name;
        $createcompany->pan_number = $request->panno;
        $createcompany->gst_number = $request->gst;
        $createcompany->land_mark = $request->landmark;
        $createcompany->city = $request->city;
        $createcompany->state = $request->state;
        $createcompany->country = $request->country;
        $createcompany->pin_code = $request->pin_code;
        $createcompany->mobile = $request->mobile_no;
        $createcompany->alt_mobile = $request->alt_mobile_no;
        $createcompany->email = $request->email;
        $createcompany->established_date = $request->established_date;
        if ($request->hasfile('company_logo')) {
            $file = $request->file('company_logo');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'company-logo-'.time().'.'.$extenstion;
            $file->move(public_path('uploads/company-logo'), $filename);
        }
        $createcompany->logo = $filename;
        $createcompany->save();
        if ($createcompany) {
            return redirect()->back()->with(session()->flash('alert-success', 'Company Data Successfully Uploaded'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.')); 
        } 
    }

    //Update Code

    public function updateHtrustCompany(Request $request){
        $request->validate([
            'company_id' => 'required',
            'established_date' => 'required|date',
            'company_name' => 'required',
            'owner_name' => 'required',
            'landmark' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pin_code' => 'required',
            'mobile_no' => 'required',
            'email' => 'required|email',
        ]);
        // dd($request->input());die;
        $updatecompany = Company::where('company_id', $request->company_id)
                                    ->update([
                                    'company_name' => $request->company_name,
                                    'owner_name' => $request->owner_name,
                                    'pan_number' => $request->panno,
                                    'gst_number' => $request->gst,
                                    'land_mark' => $request->landmark,
                                    'city' => $request->city,
                                    'state' => $request->state,
                                    'country' => $request->country,
                                    'pin_code' => $request->pin_code,
                                    'mobile' => $request->mobile_no,
                                    'alt_mobile' => $request->alt_mobile,
                                    'email' => $request->email,
                                    'established_date' => $request->established_date
                                    ]);
        if ($updatecompany) {
            return redirect()->back()->with(session()->flash('alert-info', 'Company Data Successfully Updated'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.')); 
        } 
    }

    // End Company Code

    // Start Employee Code
    public function addEmployee(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('admin/addemployee',$data);
    }
    public function employeeList(Request $request){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $sort_search = null;
        $employee = Employee::join('users', 'users.user_id', '=', 'employees.user_id');
        if ($request->search != null){
            $employee = $employee->where('users.name', 'like', '%'.$request->search.'%')
                            ->orWhere('users.mobile', "like", "%" . $request->search . "%")
                            ->orWhere('users.user_id', "like", "%" . $request->search . "%")
                            ->orWhere('employees.user_id', "like", "%" . $request->search . "%");
                            $sort_search = $request->search;
        }
        $employee = $employee ->select('employees.*', 'users.*')
                                ->paginate(10);
       return view('admin/employeelist',$data, compact('employee','sort_search'));
    }
    public function viewEmployee(Request $request){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $employeecode = $request->post('employeecode');
        $flag = false;
        if ($employeecode !== null) {
            $flag = true;
            $employeedata = Employee::where('user_id', $employeecode)->first();
            $userdata = User::where('user_id', $employeedata->user_id)->first();
            // dd($employeedata);die;
            return view('admin/viewemployee', $data, compact('employeedata', 'flag', 'userdata'));
        } else {
            return view('admin/viewemployee', $data, compact('flag'));
        }
    }
    public function updateEmployee($employeeid){
        $empdata = Employee::where('user_id', $employeeid)->first();
        $empudata = User::where('user_id', $employeeid)->first();
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('admin/updateemployee',$data, compact('empdata', 'empudata'));
    }
    // Employee Data Upload Start
    public function addEmployeeData(Request $request){
        $request->validate([
            'name' => 'required|string',
            'qualification' => 'required|string|max:150',
            'experience' => 'required|max:10',
            'dob' => 'required|string',
            'gender' => 'required|string',
            'aadhar_card' => 'required|max:2048|mimes:pdf',
            // 'pan_card' => 'required|max:2048|mimes:pdf',
            // 'voter_id' => 'required|max:2048|mimes:pdf',
            'landmark' => 'required|string|max:180',
            'country' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'pincode' => 'required|max:10',
            'mobile_no' => 'required|unique:users,mobile',
            'email' => 'required|email',
            // 'photo' => 'required|max:1024|image|mimes:jpg,jpeg,png',
        ]);

        $employeeadd = new Employee;
        $lastUserId = User::orderBy('id', 'desc')->first();
        // if (isset($lastUserId)) {
             
        //     $euserid = $lastUserId->user_id+1;
        // } else {
        //     $euserid = date('md').rand(111,999);
        // }
        $employee = User::where('role',4)->orderBy('id', 'desc')->first();
        if (isset($employee)) {
            // Sum 1 + last id
            $reuserid = substr($employee->user_id, 3);
            $userid = $reuserid + 1;
            $employee_id_gen= 'EUC' . $userid . '';
        } else {
            $employee_id_gen = 'EUC10001';
        }
        $empid = time().rand(1111,9999);
        $employeeadd->employee_id = $empid;
        $employeeadd->user_id = $employee_id_gen;
        $employeeadd->qualification = $request->qualification;
        $employeeadd->experience = $request->experience;
        $employeeadd->dob = $request->dob;
        $employeeadd->gender = $request->gender;
        if ($request->hasfile('aadhar_card')) {
            $file = $request->file('aadhar_card');
            $extenstion = $file->getClientOriginalExtension();
            $aadharcard = 'aadhar_card-'.time().'.'.$extenstion;
            $file->move(public_path('uploads/documents'), $aadharcard);
        }
        $employeeadd->aadhar_card = $aadharcard;
        if ($request->hasfile('pan_card')) {
            $file = $request->file('pan_card');
            $extenstion = $file->getClientOriginalExtension();
            $pancard = 'pan_card-'.time().'.'.$extenstion;
            $file->move(public_path('uploads/documents'), $pancard);
        }
        if ($request->hasfile('pan_card')!=null){
            $employeeadd->pan_card = $pancard;
        }
        if ($request->hasfile('voter_id')) {
            $file = $request->file('voter_id');
            $extenstion = $file->getClientOriginalExtension();
            $voterid = 'voter_id-'.time().'.'.$extenstion;
            $file->move(public_path('uploads/documents'), $voterid);
        }
        if ($request->hasfile('voter_id')!=null){
            $employeeadd->voter_id = $voterid;
        }
        
        $employeeadd->landmark = $request->landmark;
        $employeeadd->city = $request->city;
        $employeeadd->state = $request->state;
        $employeeadd->country = $request->country;
        $employeeadd->pincode = $request->pincode;
        $employeeadd->alt_mobile = $request->alt_mobile;
        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $extenstion = $file->getClientOriginalExtension();
            $employeephoto = 'employees-'.time().'.'.$extenstion;
            $file->move(public_path('uploads/documents'), $employeephoto);
        }
        $employeeadd->employee_photo = $employeephoto;
        $employeeadd->save();

        $loginemployee = new User;
        $loginemployee->user_id = $employee_id_gen;
        // $loginemployee->user_id = $employee_id_gen;
        // $alphabet = 'abcdefghijklmnopqrstuvwxyz@#$123456789';
        // $pass = array(); //remember to declare $pass as an array
        // $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        // for ($i = 0; $i < 8; $i++) {
        //     $n = rand(0, $alphaLength);
        //     $pass[] = $alphabet[$n];
        // }
        // $passwordis = implode($pass);
        // $loginemployee->password = Hash::make($passwordis);
        $loginemployee->password = $request->dob;
        $loginemployee->name = $request->name;
        $loginemployee->mobile = $request->mobile_no;
        $loginemployee->email = $request->email;
        $loginemployee->role = 4;
        $loginemployee->save();
        if ($employeeadd && $loginemployee) {
            return redirect()->back()->with(session()->flash('alert-success', 'Employee Successfully Registered'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.')); 
        } 
    }
    // Employee Data Upload End

    // Employee Data Update Start
    public function updateEmployeeData(Request $request){
        $request->validate([
            'name' => 'required|string',
            'qualification' => 'required|string|max:150',
            'experience' => 'required|max:10',
            'dob' => 'required|string',
            'gender' => 'required|string',
            'landmark' => 'required|string|max:180',
            'country' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'pincode' => 'required|max:10',
            'mobile_no' => 'required|string',
            'email' => 'required|email',
        ]);
        $updateemployeedata = Employee::where('user_id', $request->employeeid)
                                    ->update([
                                    'qualification' => $request->qualification,
                                    'experience' => $request->experience,
                                    'dob' => $request->dob,
                                    'gender' => $request->gender,
                                    'landmark' => $request->landmark,
                                    'city' => $request->city,
                                    'state' => $request->state,
                                    'country' => $request->country,
                                    'pincode' => $request->pincode,
                                    'alt_mobile' => $request->alt_mobile_no,
                                    ]);
        $uupdateemployeedata = User::where('user_id', $request->employeeid)
                                    ->update([
                                    'name' => $request->name,
                                    'mobile' => $request->mobile_no,
                                    'email' => $request->email,
                                    ]);
        if ($uupdateemployeedata && $updateemployeedata) {
            return redirect()->back()->with(session()->flash('alert-info', 'Employee Data Successfully Updated'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.')); 
        } 
    }
    //Employee Data Update End 

    // End Employee Code

    //distributor code start    
    public function addDistributor(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $companydata = Company::get();
        return view('admin/adddistributor',$data, compact('companydata'));
    }
    public function distributorList(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $distributor = Distributor::join('users', 'users.user_id', '=', 'distributors.user_id')
        ->get(['distributors.*', 'users.*']);
        return view('admin/distributorlist',$data, compact('distributor'));
    }
    public function viewDistributor(Request $request){
        $data = ['LoggedUserInfo'=>User::where('id', '=', session('LoggedUser'))->first()];
        $distributorcode = $request->post('distributorcode');
        $flag = false;
        if ($distributorcode !== null) {
            $flag = true;
            $distributordata = Distributor::where('user_id', $distributorcode)->first();
            $userdata = User::where('user_id', $distributordata->user_id)->first();
            return view('admin/viewdistributor', $data, compact('distributordata', 'flag', 'userdata'));
        } else {
            return view('admin/viewdistributor', $data, compact('flag'));
        }
        
    }
    
    public function workDetails($workid){
        $data = ['LoggedUserInfo'=>User::where('id', '=', session('LoggedUser'))->first()];
        // $workid = $request->post('workid');
        $flag = false;
        if ($workid !== null) {
            $flag = true;
            $workdetailsdata = Work::where('id', $workid)->first();
            $teacherdata = Student::where('student_id', $workdetailsdata->teacher_id)->first();
            $employee_data = User::where('user_id', $workdetailsdata->employee_id)->first();
            $employeelist = User::where('role','2')
                            ->join('employees', 'employees.user_id', '=', 'users.user_id')
                            ->select('employees.*', 'users.*')
                            ->get();

            return view('admin/viewworkdetails', $data, compact('workdetailsdata', 'flag', 'teacherdata', 'employeelist','employee_data'));
        } else {
            return view('admin/viewworkdetails', $data, compact('flag'));
        }
    }
    public function teacherDetails($teacherid){
        $data = ['LoggedUserInfo'=>User::where('id', '=', session('LoggedUser'))->first()];
        // $workid = $request->post('workid');
        $flag = false;
        if ($teacherid !== null) {
            $flag = true;
            $teacherdata = Student::where('student_id', $teacherid)->first();
            $districtdata = District::where('id_district', $teacherdata->district_id)->first();
            $blockdata = Block::where('id', $teacherdata->block_id)->first();
            return view('admin/viewteacherdetails', $data, compact('teacherdata', 'flag', 'districtdata', 'blockdata'));
        } else {
            return view('admin/viewteacherdetails', $data, compact('flag'));
        }
    }
    public function teacherListSearch(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $district = District::get();
        return view('admin/teacher-list-view',$data, compact('district'));
    }
    public function teacherListSearchDetails(Request $request){
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $state = $request->get('state');
        $district = $request->get('district');
        $block = $request->get('block');
        // dd($state); die;
        if ($block !== null) {

            $teachers = Student::where('state_id', $state)->where('students.district_id', $district)->where('block_id', $block)
                               ->join('districts', 'students.district_id', '=', 'districts.id_district')
                               ->join('blocks', 'students.block_id', '=', 'blocks.id')
                               ->select('districts.*', 'students.*', 'blocks.*')
                               ->paginate(15);
        }else{
            $teachers = Student::where('state_id', $state)->where('district_id', $district)->where('block_id', $block)
                               ->join('districts', 'students.district_id', '=', 'districts.id_district')
                               ->join('blocks', 'students.block_id', '=', 'blocks.id')
                               ->select('districts.*', 'students.*', 'blocks.*')
                               ->paginate(15);
            // $students = Student::where('session', $session)->where('courseID', $class)->get();
        }
        return view('admin/teacher-list-search-details', $data, compact('teachers'));
    }
    public function getBlocks(Request $request)
    {
        $districtid = $request->post('districtid');
        $blocknames = Block::where('district_id', '=', $districtid)->get();
        $batchtiming = '<option selected disabled value="">Select Block</option>';
        foreach ($blocknames as $list) {
            $batchtiming .= '<option value="' . $list->id . '">' . $list->name . '</option>';
        }
        echo $batchtiming;
    }
    public function updateDistributor($distributorid){
        $distdata = Distributor::where('user_id', $distributorid)->first();
        $distudata = User::where('user_id', $distributorid)->first();
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('admin/updatedistributor',$data, compact('distdata', 'distudata'));
    }
    public function projectList(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $project = Project::join('project_categories', 'project_categories.project_cat_id', '=', 'projects.project_cat')
                ->get(['project_categories.*', 'projects.*']);
        return view('admin/projectlist', $data, compact('project'));
    }
    public function projectCategoryList(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $projectcategory = Project_category::paginate(10);
        return view('admin/projectcategorylist', $data, compact('projectcategory'));
    }
    
    //Distributor Data Upload Start
    public function uploadDistributorData(Request $request){
        $request->validate([
            'name' => 'required|string',
            'dob' => 'required|string',
            'gender' => 'required|string',
            'aadhar_card' => 'required|max:2048|mimes:pdf',
            'pan_card' => 'required|max:2048|mimes:pdf',
            'voter_id' => 'required|max:2048|mimes:pdf',
            'landmark' => 'required|string|max:180',
            'country' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'pincode' => 'required|max:10',
            'mobile_no' => 'required|string',
            'email' => 'required|email',
            'company_id' => 'required',
            'photo' => 'required|max:300|image|mimes:jpg,jpeg,png',
        ]);

        $distributoradd = new Distributor;
        $lastUserId = User::orderBy('id', 'desc')->first();
        if (isset($lastUserId)) {
            // Sum 1 + last id
            $euserid = $lastUserId->user_id+1;
        } else {
            $euserid = date('md').rand(111,999);
        }
        $distributor_id_gen = date('d').time().rand(111,999);
        // $euserid = time().rand(1111,9999);
        $distributoradd->user_id = $euserid;
        $distributoradd->distributor_reg = $distributor_id_gen;
        $distributoradd->dob = $request->dob;
        $distributoradd->gender = $request->gender;
        $distributoradd->company_id = $request->company_id;
        if ($request->hasfile('aadhar_card')) {
            $file = $request->file('aadhar_card');
            $extenstion = $file->getClientOriginalExtension();
            $aadharcard = 'aadhar_card-'.time().'.'.$extenstion;
            $file->move(public_path('uploads/documents'), $aadharcard);
        }
        $distributoradd->aadhar_card = $aadharcard;
        if ($request->hasfile('pan_card')) {
            $file = $request->file('pan_card');
            $extenstion = $file->getClientOriginalExtension();
            $pancard = 'pan_card-'.time().'.'.$extenstion;
            $file->move(public_path('uploads/documents'), $pancard);
        }
        $distributoradd->pan_card = $pancard;
        if ($request->hasfile('voter_id')) {
            $file = $request->file('voter_id');
            $extenstion = $file->getClientOriginalExtension();
            $voterid = 'voter_id-'.time().'.'.$extenstion;
            $file->move(public_path('uploads/documents'), $voterid);
        }
        $distributoradd->voter_id = $voterid;
        $distributoradd->landmark = $request->landmark;
        $distributoradd->city = $request->city;
        $distributoradd->state = $request->state;
        $distributoradd->country = $request->country;
        $distributoradd->pincode = $request->pincode;
        $distributoradd->alt_mobile = $request->alt_mobile;
        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $extenstion = $file->getClientOriginalExtension();
            $distributorphoto = 'distributor-'.time().'.'.$extenstion;
            $file->move(public_path('uploads/documents'), $distributorphoto);
        }
        $distributoradd->distributor_photo = $distributorphoto;
        $distributoradd->save();

        $logindistributor = new User;
        $logindistributor->user_id = $euserid;
        $alphabet = 'abcdefghijklmnopqrstuvwxyz@#$123456789';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $passwordis = implode($pass);
        // $loginemployee->password = Hash::make($passwordis);
        $logindistributor->password = $passwordis;
        $logindistributor->name = $request->name;
        $logindistributor->mobile = $request->mobile_no;
        $logindistributor->email = $request->email;
        $logindistributor->role = 3;
        $logindistributor->save();
        if ($distributoradd && $logindistributor) {
            return redirect()->back()->with(session()->flash('alert-success', 'Distributor Successfully Registered'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.')); 
        } 
    }
    //Distributor Data Upload End

    //Distributor data update start
    public function updateDistributorData(Request $request){
        $request->validate([
            'distributorid' => 'required',
            'name' => 'required|string',
            'dob' => 'required|string',
            'gender' => 'required|string',
            'landmark' => 'required|string|max:180',
            'country' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'pincode' => 'required|max:10',
            'mobile_no' => 'required|string',
            'email' => 'required|email',
        ]);
        $updatedistributordata = Distributor::where('user_id', $request->distributorid)
                                    ->update([
                                    'dob' => $request->dob,
                                    'gender' => $request->gender,
                                    'landmark' => $request->landmark,
                                    'city' => $request->city,
                                    'state' => $request->state,
                                    'country' => $request->country,
                                    'pincode' => $request->pincode,
                                    'alt_mobile' => $request->alt_mobile_no,
                                    ]);
        $uupdatedistributordata = User::where('user_id', $request->distributorid)
                                    ->update([
                                    'name' => $request->name,
                                    'mobile' => $request->mobile_no,
                                    'email' => $request->email,
                                    ]);
        if ($uupdatedistributordata && $updatedistributordata) {
            return redirect()->back()->with(session()->flash('alert-success', 'Distributor Data Successfully Updated'));
        } else {
            return redirect()->back()->with(session()->flash('alert-warning', 'Something went wrong. Please try again.')); 
        } 
    }
    //Distributor Data update end
    //distributor code end   

    //Project Category Code Start
    public function uploadProjectCategory(Request $request){
        $request->validate([
            'company_id' => 'required|max:150',
            'project_cat_name' => 'required|max:250',
            'project_amount' => 'required'
        ]);

        $projectcat = new Project_category;
        $project_id_get = Project_category::orderBy('id','desc')->first();
        if (isset($project_id_get)) {
            $projectcatid = $project_id_get->project_cat_id+1;
        } else {
            $projectcatid = date('d').time().rand(1111,9999);
        }
        
        $projectcat->company_id = $request->company_id;
        $projectcat->project_cat_id = $projectcatid;
        $projectcat->project_category = $request->project_cat_name;
        $projectcat->project_amount = $request->project_amount;
        //$projectcat->type = $request->categorytype;
        //$projectcat->datefrom = $request->datefrom;
        //$projectcat->dateto = $request->dateto;
        $projectcat->save();
        if ($projectcat) {
            return redirect()->back()->with(session()->flash('alert-success', 'Project Category Successfully Created'));
        } else {
            return redirect()->back()->with(session()->flash('alert-warning', 'Something went wrong. Please try again.')); 
        } 
    }
    //Project Category Code End

    //Project Create Code Start
    public function uploadProjectData(Request $request){
        $request->validate([
            'company_id' => 'required',
            'project_id' => 'required',
            'distributor_id' => 'required',
            'project_name' => 'required|max:250',
            'project_number' => 'required',
            'project_amount' => 'required',
            'distribute_amount' => 'required',
            'prjecttype' => 'required',
            'no_of_days' => 'required',
        ]);

        $createproject = new Project;
        $createproject->project_id = date('md').time().rand(1111,9999);
        $createproject->company_id = $request->company_id;
        $createproject->project_cat = $request->project_id;
        $createproject->distributor_id = $request->distributor_id;
        $createproject->project_name = $request->project_name;
        $createproject->project_number = $request->project_number;
        $createproject->amount = $request->project_amount;
        $createproject->distribute_amount = $request->distribute_amount;
        $createproject->project_type = $request->prjecttype;
        $createproject->no_of_days = $request->no_of_days;
        $createproject->save();
        if ($createproject) {
            return redirect()->back()->with(session()->flash('alert-success', 'Project Successfully Created'));
        } else {
            return redirect()->back()->with(session()->flash('alert-warning', 'Something went wrong. Please try again.')); 
        } 
    }
    //Project Create Code End

    //Distributor Remove Code Start
    public function removeDistributor(Request $request){
        $request->validate([
            'userid' => 'required',
        ]);
        $distributorupdate = Distributor::where('user_id', $request->userid)
                                        ->update(['status' => 0]);

        $distributoruserupdate = User::where('user_id', $request->userid)
                                        ->update(['status' => 0]);
        if ($distributorupdate && $distributoruserupdate) {
            return redirect()->back()->with(session()->flash('alert-info', 'Distributor Successfully Blocked'));
        }
        return redirect()->back()->with(session()->flash('alert-warning', 'Something went wrong. Please try again.')); 
    }
    //Distributor Remove Code End

    //Distributor Un-Block Code Start
    public function unBlockDistributor(Request $request){
        $request->validate([
            'userid' => 'required',
        ]);
        $distributorupdate = Distributor::where('user_id', $request->userid)
                                        ->update(['status' => 1]);

        $distributoruserupdate = User::where('user_id', $request->userid)
                                        ->update(['status' => 1]);
        if ($distributorupdate && $distributoruserupdate) {
            return redirect()->back()->with(session()->flash('alert-success', 'Distributor Successfully Un-Blocked'));
        }
        return redirect()->back()->with(session()->flash('alert-warning', 'Something went wrong. Please try again.')); 
    }
    //Distributor Un-Block Code End

    //User Details Get start
    public function getuserdetails(Request $request){
        $userid = $request->post('userid');
        $contractors = Contractor::where('user_id', $userid)->get()->toJson();
        return $contractors;
    }
    //User Details Get End

    //Contractor DisApprove Start
    public function disApproveContractor(Request $request){
        $request->validate([
            'userid' => 'required',
        ]);

        $disapprove = User::where('user_id', $request->userid)->update(['is_approve' => 2]);
        if ($disapprove) {
            return redirect()->back()->with(session()->flash('alert-success', 'User Successfully Dis-Approve'));
        }
        return redirect()->back()->with(session()->flash('alert-warning', 'Something went wrong. Please try again.')); 
    }
    //Contractor DisApprove End

    //Contractor Approve Start
    public function approveContractor(Request $request){
        $request->validate([
            'userid' => 'required',
        ]);

        $disapprove = User::where('user_id', $request->userid)->update(['is_approve' => 1]);
        if ($disapprove) {
            return redirect()->back()->with(session()->flash('alert-success', 'User Successfully Approve'));
        }
        return redirect()->back()->with(session()->flash('alert-warning', 'Something went wrong. Please try again.')); 
    }
    //Contractor Approve End
    
    //Get Project Name Start
    public function getProjectName(Request $request){
        $companyid = $request->post('company');
        $projectdetails = Project_category::where('company_id', $companyid)->get();
        return $projectdetails;
    }
    //Get Project Name End

    //Get Project Amount Start
    public function getamountofproject(Request $request){
        $category = $request->post('cid');        
        $getamountpro = Project_category::where('project_cat_id', $category)->first();
        $getamount = $getamountpro->project_amount;
        return $getamount;
    }
    //Get Project Amount End

    //Get Category Start
    public function getcategoryname(Request $request){
        $companyid = $request->post('companyid');
        $getcategory = Project_category::where('company_id', $companyid)->get();
        return $getcategory;
    }
    //Get Category End
    
    public function assignWorkEmployee(Request $request){
        $request->validate([
            'teacher_id' => 'required',
            'employee_id' => 'required',
            'work_id' => 'required',
        ]);
        $teacherid = $request->post('teacher_id');   
        $employeeid = $request->post('employee_id');   
        $workassignupdate = Work::where('teacher_id', '=', $request->teacher_id)
                            ->where('status', '=', '3')
                            ->where('id', '=', $request->work_id)
                                            ->update([
                                                'employee_id' => $request->employee_id,
                                                'work_completed_status' => 1,
                                                
                                            ]);
        
        if ($workassignupdate) {
            return redirect('admin/data-list')->with(session()->flash('alert-success', 'Work Assigned successful.'));
        } else{
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please! try again later.'));
        }
    }
    public function districtList(Request $request){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        
		$sort_search = null;
		$district = District::where('status',1);
        if ($request->search != null){
            $district = $district->where('name', 'like', '%'.$request->search.'%');
							$sort_search = $request->search;
        }
		$district = $district ->orderBy('id_district', 'asc')->paginate(15);
							   
        return view('admin/districtlist', $data, compact('district','sort_search')); 
    }
    public function editDistrict($id){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $districtDetails = District::where('id_district',$id)->first();
        return view('admin/editdistrict', $data, compact('districtDetails')); 
    }
    public function updateDistrictData(Request $request){
        $data = ['LoggedUserInfo'=>User::where('id', '=', session('LoggedUser'))->first()];
        $request->validate([
            'dist_name'  => 'required',
            'districtid'  => 'required',
        ]);
        $updatedistrict = District::where('id_district', $request->districtid)
                        ->update([
                            'name' => $request->dist_name,
                        ]);
        if($updatedistrict){
        return redirect()->back()->with(session()->flash('alert-success', 'District Name Updated Successfully '));
        } else {
            return redirect()->back()->with(session()->flash('alert-warning', 'Something went wrong. Please try again.')); 
        } 
    }
    public function blockList(Request $request){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
		$sort_search = null;
		$block = Block::join('districts', 'blocks.district_id', '=', 'districts.id_district');
        if ($request->search != null){
            $block = $block->where('blocks.name', 'like', '%'.$request->search.'%')
							->orWhere('districts.name', "like", "%" . $request->search . "%");
							$sort_search = $request->search;
        }
		$block = $block ->select('districts.name as districtName', 'blocks.*')
                               ->paginate(35);
		return view('admin/blocklist', $data, compact('block','sort_search')); 
    }
    public function editBlock($id){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $blockDetails = Block::where('id',$id)->first();
        return view('admin/editblock', $data, compact('blockDetails')); 
    }
    public function updateBlockData(Request $request){
        $data = ['LoggedUserInfo'=>User::where('id', '=', session('LoggedUser'))->first()];
        $request->validate([
            'dist_name'  => 'required',
            'block_name'  => 'required',
        ]);
        $updateblock = Block::where('id', $request->blockid)
                        ->update([
                            'district_id' => $request->dist_name,
                            'name' => $request->block_name,
                        ]);
        if($updateblock){
        return redirect()->back()->with(session()->flash('alert-success', 'Block Name Updated Successfully '));
        } else {
            return redirect()->back()->with(session()->flash('alert-warning', 'Something went wrong. Please try again.')); 
        } 
    }
    //farmer list from here
    public function farmerList(Request $request){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $sort_search = null;
        $farmers_list = User::where('role',5);
        if ($request->search != null){
            $farmers_list = $farmers_list->where('users.name', 'like', '%'.$request->search.'%')
                            ->orWhere('users.mobile', "like", "%" . $request->search . "%")
                            ->orWhere('users.user_id', "like", "%" . $request->search . "%");
                            $sort_search = $request->search;
        }
        $farmers_list = $farmers_list ->select('users.*')
                                ->paginate(10);
       return view('admin/farmer_lists',$data, compact('farmers_list','sort_search'));
    }
    public function viewFarmerDetails($user_id){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $farmer_details = User::where('user_id',$user_id)->first();
        return view('admin/farmerdetails',$data, compact('farmer_details'));
    }
    //Agri retailer list from here
    public function agriRetailerList(Request $request){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $sort_search = null;
        $agri_retailer_list = User::where('role',2);
        if ($request->search != null){
            $agri_retailer_list = $agri_retailer_list->where('users.name', 'like', '%'.$request->search.'%')
                            ->orWhere('users.mobile', "like", "%" . $request->search . "%")
                            ->orWhere('users.user_id', "like", "%" . $request->search . "%");
                            $sort_search = $request->search;
        }
        $agri_retailer_list = $agri_retailer_list ->select('users.*')
                                ->paginate(10);
       return view('admin/agri_retailer_list',$data, compact('agri_retailer_list','sort_search'));
    }
    public function viewAgriRetailerDetails($user_id){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $agri_retailer_details = User::where('user_id',$user_id)->first();
        return view('admin/agriretailerdetails',$data, compact('agri_retailer_details'));
    }
    //cattle doctor list here
     public function cattleDoctorList(Request $request){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $sort_search = null;
        $cattle_doctor_list = User::where('role',3);
        if ($request->search != null){
            $cattle_doctor_list = $cattle_doctore_list->where('users.name', 'like', '%'.$request->search.'%')
                            ->orWhere('users.mobile', "like", "%" . $request->search . "%")
                            ->orWhere('users.user_id', "like", "%" . $request->search . "%");
                            $sort_search = $request->search;
        }
        $cattle_doctor_list = $cattle_doctor_list ->select('users.*')
                                ->paginate(10);
       return view('admin/cattle_doctor_list',$data, compact('cattle_doctor_list','sort_search'));
    }
    public function viewCattleDoctorDetails($user_id){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $cattle_doc_details = User::where('user_id',$user_id)->first();
        return view('admin/cattledoctordetails',$data, compact('cattle_doc_details'));
    }
    public function viewEmployeeDetails($user_id){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $employeedata = Employee::where('user_id', $user_id)->first();
        $userdata = User::where('user_id', $employeedata->user_id)->first();
        return view('admin/employeedetails',$data, compact('employeedata','userdata'));
    }
    //crop insurance list here
     public function cropInsurance(Request $request){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $sort_search = null;
        $crop_insurance = CropInsurance::where('type',1);
        if ($request->search != null){
            $crop_insurance = $cattle_doctore_list->where('crop_insurances.name', 'like', '%'.$request->search.'%')
                            ->orWhere('crop_insurances.insurance_no', "like", "%" . $request->search . "%")
                            ->orWhere('crop_insurances.employee_id', "like", "%" . $request->search . "%")
                            ->orWhere('crop_insurances.pincode', "like", "%" . $request->search . "%")
                            ->orWhere('crop_insurances.name', "like", "%" . $request->search . "%")
                            ->orWhere('crop_insurances.mobile', "like", "%" . $request->search . "%");
                            $sort_search = $request->search;
        }
        $crop_insurance = $crop_insurance ->select('crop_insurances.*')
                                ->paginate(10);
       return view('admin/crop_insurances',$data, compact('crop_insurance','sort_search'));
    }
    public function viewCropInsuranceDetails($insurance_no){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $crop_insurance_details = CropInsurance::where('insurance_no', $insurance_no)->first();
        $emp_data = User::where('user_id', $crop_insurance_details->employee_id)->first();
		// dd($emp_data);
		// die;
		return view('admin/view_crop_insurance',$data, compact('crop_insurance_details','emp_data'));
    }
	//cattle insurance list here
     public function cattleInsurance(Request $request){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $sort_search = null;
        $crop_insurance = CropInsurance::where('type',2);
        if ($request->search != null){
            $crop_insurance = $cattle_doctore_list->where('crop_insurances.name', 'like', '%'.$request->search.'%')
                            ->orWhere('crop_insurances.insurance_no', "like", "%" . $request->search . "%")
                            ->orWhere('crop_insurances.employee_id', "like", "%" . $request->search . "%")
                            ->orWhere('crop_insurances.pincode', "like", "%" . $request->search . "%")
                            ->orWhere('crop_insurances.name', "like", "%" . $request->search . "%")
                            ->orWhere('crop_insurances.mobile', "like", "%" . $request->search . "%");
                            $sort_search = $request->search;
        }
        $crop_insurance = $crop_insurance ->select('crop_insurances.*')
                                ->paginate(10);
       return view('admin/cattle_insurances',$data, compact('crop_insurance','sort_search'));
    }
    public function viewCattleInsuranceDetails($insurance_no){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $crop_insurance_details = CropInsurance::where('insurance_no', $insurance_no)->first();
        $emp_data = User::where('user_id', $crop_insurance_details->employee_id)->first();
		return view('admin/view_cattle_insurance',$data, compact('crop_insurance_details','emp_data'));
    }
	 public function stateList(Request $request){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $sort_search = null;
        $state_list = State::orderBy('id','desc');
        if ($request->search != null){
            $state_list = $state_list->where('states.name', 'like', '%'.$request->search.'%');
                            $sort_search = $request->search;
        }
        $state_list = $state_list ->select('states.*')
                                ->paginate(10);
       return view('admin/state_list',$data, compact('state_list','sort_search'));
    }
	public function addState(){
		$data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
		return view('admin/addstate',$data);
	}
    public function uploadState(Request $request){
        $request->validate([
            'name' => 'required|string'
        ]);
		$addstate = new State;
		$addstate->name = $request->name;
		$addstate->save();
		if ($addstate) {
            return redirect()->back()->with(session()->flash('alert-success', 'State Added Successfully!'));
        } else {
            return redirect()->back()->with(session()->flash('alert-warning', 'Something went wrong. Please try again.')); 
        } 
    }
	public function fixAmount(){
		$data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
		$amount_details = FixInsuranceAmount::where('id',1)->first();
		return view('admin/fixamount',$data, compact('amount_details'));
	}
	public function updateCropInsurance(Request $request)
	{
		$request->validate([
			'crop_insurance_amount' => 'required|numeric'
		]);
		// dd($request->all());
		// die;
		$crop_insurance_amount = FixInsuranceAmount::where('id', 1)
                        ->update([
                            'crop_insurance_amount' => $request->crop_insurance_amount,
                        ]);
        if($crop_insurance_amount){
        return redirect()->back()->with(session()->flash('alert-success', 'Crop Insurance Amount Updated Successfully '));
        } else {
            return redirect()->back()->with(session()->flash('alert-warning', 'Something went wrong. Please try again.')); 
        } 
	}
	public function updateCattleInsurance(Request $request)
	{
		$request->validate([
			'cattle_insurance_amount' => 'required|numeric'
		]);
		// dd($request->all());
		// die;
		$cattle_insurance_amount = FixInsuranceAmount::where('id', 1)
                        ->update([
                            'cattle_insurance_amount' => $request->cattle_insurance_amount,
                        ]);
        if($cattle_insurance_amount){
        return redirect()->back()->with(session()->flash('alert-success', 'Cattle Insurance Amount Updated Successfully '));
        } else {
            return redirect()->back()->with(session()->flash('alert-warning', 'Something went wrong. Please try again.')); 
        } 
	}
	public function updateAgentAmount(Request $request)
	{
		$request->validate([
			'agent_amount' => 'required|numeric'
		]);
		// dd($request->all());
		// die;
		$agent_amount = FixInsuranceAmount::where('id', 1)
                        ->update([
                            'agent_amount' => $request->agent_amount,
                        ]);
        if($agent_amount){
        return redirect()->back()->with(session()->flash('alert-success', 'Agent Amount Updated Successfully '));
        } else {
            return redirect()->back()->with(session()->flash('alert-warning', 'Something went wrong. Please try again.')); 
        } 
	}
	public function kisanLoan(Request $request){
		$data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $sort_search = null;
        $kisan_loan = KisanLoan::orderBy('id','desc');
        if ($request->search != null){
            $kisan_loan = $kisan_loan->where('kisan_loans.name', 'like', '%'.$request->search.'%')
									->orWhere('kisan_loans.mobile', "like", "%" . $request->search . "%");
                            $sort_search = $request->search;
        }
        $kisan_loan = $kisan_loan ->select('kisan_loans.*')
                                ->paginate(10);
       return view('admin/kisan_loan',$data, compact('kisan_loan','sort_search'));
	}
	
}