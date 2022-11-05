<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentStoreRequest;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    public function create(){
        return view('appointment');
    }

    public function store(AppointmentStoreRequest $request){
        Appointment::create($request->validated());
    }
}
