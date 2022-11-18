<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentStoreRequest;
use App\Models\Appointment;
use App\Models\BusinessSetting;
use Brian2694\Toastr\Facades\Toastr;
use Error;
use Exception;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function create()
    {
        $companyContact = BusinessSetting::where('businessName', 'contact')->first()->businessValue;
        return view('appointment', compact('companyContact'));
    }

    public function store(AppointmentStoreRequest $request)
    {

        try {
            Appointment::create($request->validated());
            Toastr::success('Appointment submitted. You will be contacted when approved');
            return back();
        } catch (Exception $error) {
            Toastr::error('Something went wrong, try again later');
            return back();
        };
    }

    public function show(Request $request)
    {
        $this->validate($request, [
            'phoneNumber' => 'required'
        ]);

        $appointments = Appointment::where('phoneNumber', $request->phoneNumber)->get();
        if (count($appointments)) {
            return response()->json($appointments, 200);
        } else {
            return response()->json([
                "errors" =>
                [
                    "message" => "You have not requested any appointments yet",
                ]
            ], 404);
        }
    }

    public function delete(Request $request)
    {

        try {
            Appointment::find($request->id)->delete();
            return response()->json([
                "message" => "Appointment Withdrawn"
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                "errors" =>
                [
                    "message" => $error->getMessage()
                ]
            ], 500);
        }
    }
}
