<?php

namespace App\Http\Controllers;
use App\Models\AddChurch;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function navigate_to_homepage(){
        return view('index');    
    }

    public function navigate_to_registration(){
        $churches = AddChurch::all();
        return view('registrationforms.church-name', compact('churches'));
    }

    public function churchNameForm(){
        $churches = AddChurch::all();
        return view('registrationforms.church-name', compact('churches'));
    }
    public function personalDetailsForm(){
        return view('registrationforms.personal-details');
    }
    public function accomodationForm(){
        return view('registrationforms.accomodation');
    }
    public function transportationForm(){
        return view('registrationforms.transportation');
    }
    public function confirmationForm(){
        return view('registrationforms.confirmation');
    }
}
