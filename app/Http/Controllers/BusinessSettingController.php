<?php

namespace App\Http\Controllers;

use App\Models\BusinessSetting;
use Illuminate\Http\Request;

class BusinessSettingController extends Controller
{
    public function index(){
        return view('test', ['businessSettings' => json_decode(BusinessSetting::first()->businessValue['heading'])]);
    }
}
