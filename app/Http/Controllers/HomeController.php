<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


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
    public function index()
    {
        $user_id= auth()->user()->id;
        $user= User::find($user_id);
        return view('home')->with('user',$user);
    }
    public function upload(Request $request)
    {
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->move(public_path('images'),$filename);
            Auth()->user()->update(['image'=>$filename]);
        }
        return redirect()->back();
    }
    function deletemyaccountfn($id){
        user::find($id)->delete();
        return redirect('login');
    }

    public function viewusers()
    {
        $user_id= auth()->user()->id;
        $User= User::all()->where('id','!=',$user_id);
        return view('viewusers')->with('User',$User);
    }
    function deleteuseraccountfn($id){
        $delete=user::find($id)->delete();
        if($delete){
            return redirect()->back()->with('delt','user deleted successfully !');
        }
      
    }
}
