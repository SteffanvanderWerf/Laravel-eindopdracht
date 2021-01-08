<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Band;
use App\Models\User;
class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Band $band)
    {   
        $user =Auth::user();
        $bands=Band::join('band_user','band_user.band_id','=','bands.id')->where('band_user.user_id',"=", $user->id)->get();
       
        return view('home', compact('bands'));
    }

    public function profileUpdate(Request $request){
        $user =Auth::user();
        
        //validation rules
        $request->validate([
            'name' =>'required|min:4|string|max:255|unique:users,name,'.$user->id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'username'=>'required|string|string|max:255|unique:users,username,'.$user->id,
        ]);
  
        $user->name = $request['name'];
        $user->username = $request['username'];
        $user->email = $request['email'];
        $user->update($request->all());

        return back()->with('message','Profiel bijgewerkt');
    }

}
