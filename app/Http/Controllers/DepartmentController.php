<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Project;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    //
    public function index(Department $department){
        if(Auth::id()){
            $company = $department->company;
            $alldepartments = $company->departments;
            $projects = $department->projects;
            $project_count = (count($projects));
            return view('departmentindex')->with(compact('department','alldepartments', 'projects', 'project_count', 'company'));
        }
       else{
           return redirect('/login');
       }
    }
    public function createproject(Request $request, Department $department){
        
        // validate request
        $data = $request->validate([
            'project_title' => 'required|string|max:255'
        ]);
        

       $project = Project::create([
            'name' => $data['project_title'],
            'department_id' => $department->id
        ]);
        if($project){
            return redirect()->back()->with('success', 'project created');
        }
        else{
            return redirect()->back()->with('error', 'an error has occoured');
            
        }
    }
}
