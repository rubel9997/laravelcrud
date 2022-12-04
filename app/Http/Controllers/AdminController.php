<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    public function adminList(){
        $adminList=User::all();
        return view('user.index',compact('adminList'))->with('i',(request()->input('page',1) -1) *5);
    }


    public function adminCreate(){
        return view('user.create');
    }

    public function adminStore(Request $request){
        $request->validate([
            'adminName' => 'required',
            'adminUserName' => 'required',
            'adminEmail' => 'required',
            'adminPassword' => 'required',
        ]);

        $admins= new User();
        $admins->name=$request->adminName;
        $admins->username=$request->adminUserName;
        $admins->email=$request->adminEmail;
        $admins->role_id=$request->role_id;
        $admins->password=Hash::make($request->adminPassword);
        $admins->save();

        return redirect()->route('admin.list')->with('success','Admin Create Successfully');


    }


    public function adminEdit(Request $request){
        $adminLists=User::all();
        $adminUser=User::findOrfail($request->id);
        return view('user.edit',compact('adminUser','adminLists'));


    }

    public function adminUpdate(Request $request){
        //return $request;
        $request->validate([
            'adminName' => 'required',
            'adminUserName' => 'required',
            'adminEmail' => 'required',
            'adminPassword' => 'required',
        ]);


        $admins=User::findOrfail($request->id);
        $admins->name=$request->adminName;
        $admins->username=$request->adminUserName;
        $admins->email=$request->adminEmail;
        $admins->role_id=$request->role_id;
        $admins->password=Hash::make($request->adminPassword);
        $admins->save();

        return redirect()->route('admin.list')->with('success','Admin Update Successfully');

    }


    public function adminShow($id){
        $adminList=User::findOrfail($id);
        return view('user.show',compact('adminList'));
    }

    public function adminDelete($id){
        $adminDelete=User::findOrfail($id);
        $adminDelete->delete();
        return redirect()->back()->with('success', 'Admin Delete Successfully');
    }


}
