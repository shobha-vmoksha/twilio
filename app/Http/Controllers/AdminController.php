<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Company;

class AdminController extends Controller
{
    //
    function index()
    {

        return view('dashboard.admin.index');
    }

    function profile()
    {
        return view('dashboard.admin.profile');
    }
    function setting()
    {
        return view('dashboard.admin.setting');
    }

    //admin section


    //index
    public function adminHome()
    {
        $alluser = Company::all();
        return view('dashboard.admin.pages.adminhome', compact('alluser'));
    }

    //create
    public function createuser()
    {
        return view('dashboard.admin.pages.createuser');
    }

    //add
    public function adduser(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:20',
            'phone_number' => 'required|max:10',
            'email' => 'required|email',
            'password' => 'required',
            //'password_confirm' => 'required|same:password'  
            'phone_number' => 'required|max:10',

        ]);
        $newuser = new Company;
        $newuser->name = $request->name;
        $newuser->user_id = '2';
        $newuser->phone_number = $request->phone_number;
        $newuser->email = $request->email;
        $newuser->password = $request->password;
        $newuser->password = Hash::make($request->password);
        $newuser->save();
        return redirect('admin/adminindex')->with(['success' => "{$newuser->name}  Added Successfully"]);
    }

    //edit
    public function edit($id)
    {
        // dd($id);
        $data = Company::where('id', $id)->get();
        $data = $data[0];
        // dd($data);
        return view("dashboard.admin.pages.edituser", compact('data', 'id'));
    }

    //edited


    public function editeduser(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:20',
            'phone_number' => 'required|max:10',
            'email' => 'required|email',
            //  'password'=> 'required',
        ]);
        // dd($request->all());
        $editeduser = Company::find($request->id);
        //dd($editedcustomer->$id);
        $editeduser->name = $request->name;
        $editeduser->user_id = '2';
        $editeduser->phone_number = $request->phone_number;
        $editeduser->email = $request->email;
       // dd($editeduser);
        //  $editeduser->password = $request->password;
        $editeduser->save();
        // return redirect('admin/index')->with('success', 'Customer Updated successfully!');
        return redirect('admin/adminindex')->with(['warning' => "{$editeduser->name} Information Updated Successfully"]);
    }



    public function editeduserx(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:20',
            'phone_number' => 'required|max:10',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // dd($request->all());
        $editeduser = Company::find($request->id);
        // dd($editeduser->$id);
        $editeduser->name = $request->name;
        $editeduser->user_id = '2';
        $editeduser->phone_number = $request->phone_number;
        $editeduser->email = $request->email;
        $editeduser->password = $request->password;
        dd($editeduser->phone_number);
        $editeduser->save();
        return redirect('admin/adminindex')->with('success', 'Updated successfully!');
    }


    //delete
    public function delete($id)
    {
        //dd($id);
        $userdata = Company::find($id);
        $userdata->delete();
        return redirect()->back()->with(['warning' => "{$userdata->name}  Deleted Successfully"]);
        //return redirect('blog/' . $projectid)->with('warning', "Deleted Successfully");
    }
}
