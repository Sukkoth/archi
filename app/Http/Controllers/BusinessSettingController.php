<?php

namespace App\Http\Controllers;

use App\Models\BusinessSetting;
use Illuminate\Http\Request;

class BusinessSettingController extends Controller
{
    public function index(){
        $aboutCompany = BusinessSetting::where('businessName', 'aboutUs')->first()->businessValue;
        $companyContact = BusinessSetting::where('businessName', 'contact')->first()->businessValue;

        return view('admin.edit_info', compact('aboutCompany', 'companyContact'));
    }

    public function updateAboutCompany(Request $request){
        $this->validate($request, [
            "companyName" => "required",
            "companyDescription" => "required",
            "companySlogan" => "required",
        ]);
        $company = BusinessSetting::where('businessName', 'aboutUs')->first();
        $settings = array();
        array_push($settings, [
            "name" => $request->companyName,
            "description" => $request->companyDescription,
            "slogan" => $request->companySlogan,
            "experience" => $request->companyExperienceYears
        ]);
        $company->businessValue = $settings[0];
        if($company->save()){

        return response()->json(["data" => [
            "message" => "Company info updated successfully",
            "code" => 200,
        ]], 200);

        }else{
            return response()->json(["error" => [
                "message" => "Data not updated",
                "code" => "400",
            ]], 400);
        }
    }

    public function update_company_contact(Request $request){
        $this->validate($request, [
            "companyEmail" => "required",
            "companyAddress" => "required",
            "companyPhone" => "required",
        ]);
        $company = BusinessSetting::where('businessName', 'contact')->first();
        $settings = array();
        array_push($settings, [
            "email" => $request->companyEmail,
            "address" => $request->companyAddress,
            "phone" => $request->companyPhone,
            "telephone" => $request->companyTelephone
        ]);
        $company->businessValue = $settings[0];
        if($company->save()){

        return response()->json([
            "message" => "Company contact updated successfully",
        ], 200);

        }else{
            return response()->json(["error" => [
                "message" => "Data not updated",
                "code" => "400",
            ]], 400);
        }
    }
}
