<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\SocietyUserResource;
use App\Models\SocietyUser;

class CustomersManagementController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $society_user =  SocietyUserResource::collection(SocietyUser::all());
        return view('admin.customersManagement', compact('society_user'));
    }
}
