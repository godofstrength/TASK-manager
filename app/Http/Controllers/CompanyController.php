<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\InviteMail;

class CompanyController extends Controller{
    //
    public function index(Company $company){
        $alldepartments = $company->departments;
        $count_departments = count($alldepartments);
        return view('dashboard', compact('alldepartments', 'count_departments', 'company'));
    }


    public function createDepartment(Request $request, Company $company){
        // validate info
       $data = $request->validate([
            'title' => ['required', 'string', 'max:255']
        ]);
        $data = $request['title'];

        // create the department    
        $department = Department::create([
            'name' => $data,
            'company_id' => $company->id
        ]);
        if($department){
            session()->flash('success', 'department created successfully');
            return back();
        }else{
            return redirect()->back()->withErrors(['errors' => 'An error has occoured.']);
        }
}

public function members(Request $request, Company $company){
    if($company){
        $alldepartments = $company->departments;
        $count_departments = count($alldepartments);
        return view('pages.members', compact('alldepartments', 'count_departments', 'company'));
    }else{
        return redirect()->back()->withErrors(['Company does not Exist']);
    }
}
// invite member
public function inviteMember(Request $request, Company $company){
    if($company){
        $data = $request->validate([
            'email_invite' => 'required|email|max:255'
       ]);
   $email = $data['email_invite'];
      //build email
         $details = [
             'title' => 'Mail from task manager app',
             'body' => 'you have been invited to a workspace by '.$company->name
         ];
       // send mail
         Mail::to($email)->send(new InviteMail($details));
         return redirect()->back()->with('success', 'An invitation has been sent to <b>'.$email.'<b>');  
     }else{
      return route('/login');
     }
   
  }
  
}
