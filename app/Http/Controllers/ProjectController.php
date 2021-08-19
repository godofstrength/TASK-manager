<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Project;
use App\models\Department;
use App\Models\Module;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index(Project $project){

      $department = $project->department;
       $company = $department->company;
       $alldepartments = $company->departments;
        $modules = $project->modules;
        $count_modules = count($modules);
       if($project){
        return view('pages.singleproject')->with(compact('modules', 'count_modules', 
    'company', 'alldepartments','project'));
       }else{
         return redirect()->back()->with('error', 'an error has occoured');
       }
        
    }

    public function allProjects(Company $company){
        $alldepartments = $company->departments;
        $total = [];
        foreach($alldepartments as $alldepartment){
            $projects = $alldepartment->projects;
            array_push($total, $projects);
        }
         return view('pages.allprojects')->with(compact('total', 'company', 'alldepartments'));
    }


    public function create(Request $request, $id){
        $department = Department::findorfail($id);
        $company = $department->company;
        // validate incoming request
        $data = $request->validate([
            'project_title' => 'required|string|max:255'
        ]);
        
      $project = Project::create([
            'name' => $data['project_title'],
            'department_id'=> $id,
        ]);
        if($project){
            return redirect()->back()->with('success', 'project created');
        }
        else{
            return redirect()->back()->with('error', 'an error has occoured');
        }
    }


    public function createModule(Project $project, Request $request){
        $data = $request->validate([
            'module_title' => 'required|string|max:255'
        ]);
            //create module
            $module = Module::create([
                'module_name' => $data['module_title'],
                'project_id' => $project->id
            ]);
            if($module){
                return redirect()->back()->with('success', 'module created');
            }
            else{
                return redirect()->back()->with('error', 'an error has occoured');
            }

    }
}
