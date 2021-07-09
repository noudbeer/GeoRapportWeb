<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\SocietyUserResource;
use App\Models\SocietyUser;
use App\Models\User;
use App\Models\Society;

class CustomersManagementController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * show the form to attache user with society in society_client_table
     */
    public function index()
    {
        $society_user =  SocietyUserResource::collection(SocietyUser::all());
        return view('admin.customersManagement', compact('society_user'));
    }

    /**
     * attache user with society in society_client_table
     */
    public function addClients(Request $request) 
    {
        $society = Society::where('name', $request['inputSociety'])->get()->first();
        
        $users = collect(json_decode($request['users']));
        $users = $users->map(function($user_data) {
            $user = User::find($user_data->id);
            if($user != null)
                return $user;
            else {
                // jeter une erreur si l'utilisateur existe pas
                trigger_error("Erreur lors de la recheche de l'utilisateur ". $user_data);
            }
        });

        foreach($users as $user)
            if (! SocietyUser::checkExistRelation($user, $society))
                $user->clients()->attach($society->id);

        return redirect('/customersManagement');
    }
}
