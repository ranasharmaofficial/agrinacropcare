<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\District;
use App\Models\Block;

class ExternalController extends Controller
{
    public function register(){
        $districtlist = District::get();
        return view('register', compact('districtlist'));
    }
    public function verification(){
        return view('verification');
    }
    public function login(){
        return view('login');
    }
    public function thankyou(){
        return view('thankyou');
    }
    public function privacyPolicy(){
        return view('privacy_policy');
    }
    public function termsCondition(){
        return view('term_condition');
    }
     public function aboutUs(){
        return view('about_us');
    }
    public function index(){
        
        return view('index');
    }
    public function events(){
        $events = Event::limit(1)->get();
        return view('events',compact('events'));
    }
    public function gallery(){
        $galleries = Gallery::get();
        return view('gallery',compact('galleries'));
    }

    public function enquiryContact(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'mobile' => 'required|string',
            'message' => 'required'
        ]);

        $contactpost = new Contact;
        $contactpost->name = $request->name;
        $contactpost->email = $request->email;
        $contactpost->mobile = $request->mobile;
        $contactpost->message = $request->message;
        $contactpost->save();
        if ($contactpost) {
            return redirect()->back()->with(session()->flash('alert-success', 'We have recived your query. Please! wait for response.'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.'));
        }
    }
    public static function getBlockNames(Request $request){
        $className = Block::where('district_id', $request->post('school'))->get();
        return $className;
    }
}