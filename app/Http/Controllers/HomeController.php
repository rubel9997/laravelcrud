<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Exports\AdminUserExport;
use Maatwebsite\Excel\Facades\Excel;

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
        return view('home');
    }


    public function userlistshow(){
        $userlists=User::all();
        return view('user.index',compact('userlists'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function AdminExport(){

        return Excel::download(new AdminUserExport, 'users.xlsx');
    }

}
