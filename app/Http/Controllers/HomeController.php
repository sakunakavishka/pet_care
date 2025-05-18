<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index()
    {
        if (Auth::user()->usertype == 'user')
        {
            return view('user.dashboard');
        }
        else 
        {
            $data = User::where('usertype', 'user')->get();
            return view ('admin.dashboard',compact('data'));
        }
    }
    public function user_delete($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->back();
    }
    
}
