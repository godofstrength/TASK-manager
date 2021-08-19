<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Module;
use App\Models\Task;
use App\Models\Department;
use Carbon\Carbon;

class ModuleController extends Controller
{
    //
    public function index(Module $module){
        // get the Department
        $project = $module->project;
        $department = Department::findorfail($project->id);
      $company = $department->company;
      $alldepartments = $company->departments;
        //get tasks of the module
        $tasks = $module->tasks;
        $count_tasks = count($tasks);
        return view('pages.modules')->with(compact('module', 'tasks', 'count_tasks', 'alldepartments', 'company'));
    }
    public function createTask(Request $request, Module $module){
       
    //  check if deadline is lesser than current date 
        $now = Carbon::now();
        $other_date = $request['deadline'];
        $result = $now->lt($other_date);

        // validate incoming request
        $data =  $request->validate([
            'task_title' => 'required|string|max:255',
            'deadline' => 'required',
            'members' => 'nullable|max:255|string'
        ]);
        if($result == true){
            // create the task
            $task = Task::create([
                'task_name' => $data['task_title'],
                'module_id' => $module->id,
                'status' => 'pending',
                'deadline' => $data['deadline'],
                'members' => $data['members']
            ]);
            if($task){
                return redirect()->back()->with('success', 'Task created');
            }else{
                return redirect()
                ->back()
                ->withErrors(['Unable to perform request']);
            }

        }else{
            return redirect()->back()->withErrors(['Deadline cannot be past date']);
        }
    }

    public function deleteTask(Task $task){
        if($task->delete()){
            return response()->json([
                'success' => 'Task deleted'
            ],200);
        }else{
            return response()->json([
                'error' => 'Unable to perform request'
            ], 400);
        }

    }
    public function startTask(Task $task){
        // check if the task exists
        if($task){ 
            if($task->status == 'pending'){
                $task->status = 'ongoing';
                $task->save();
                return response()->json([
                    'success' => 'Task started'
                ], 200);
            }
            else if($task->status == 'ongoing'){
                return response()->json([
                    'error' => 'Task already running' ], 400);
        }else{
            return response()->json([
                'error' => 'Task already completed'
            ]);
        }
        }else{
            return response()->json([
                'error' => 'Task not found'
            ], 404);
        }      
    }
    public function completeTask(Task $task){
        if($task){ 
            if($task->status == 'ongoing'){
                $task->status = 'completed';
                $task->save();
                return response()->json([
                    'success' => 'Task completed'
                ], 200);
            }
            else if($task->status == 'completed'){
                return response()->json([
                    'error' => 'Task already completed' ], 400);
        }else{
            return response()->json([
                'error' => 'Start task first'
            ]);
        }
        }else{
            return response()->json([
                'error' => 'Task not found'
            ], 404);
        }      
    } 
}
