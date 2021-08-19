<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Department;
use App\Models\Company;
use App\Models\CompanyUser;
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
    public function index(){
        if(Auth::id()){
            $user_id = Auth::id();
            // find user companies
            $companies = User::find($user_id)->companies;

            return view('home')->with('companies', $companies);

        }
       else{
        return redirect()->route('login');
       }   
    }

   

    public function createCompany(Request $request){
        $user_id = Auth::id();
        if($user_id){
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'image' => 'required|image|file|max:6000|mimetypes:image/png,image/jpeg,image/jpg'
            ]);
    
        if($request->image){  
            // save the image
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
        }
    
            // create the department    
            $company = Company::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'photo' => $imageName
            ]);
            //create the pivot
            $company_user = CompanyUser::create([
                'user_id' => $user_id,
                'company_id' => $company->id
            ]);
    
    
            if(!is_null($company)){
                    session()->flash('success', 'Company created successfully');
               
                return redirect('home');
            }else{
                return redirect()->back()->withErrors(['errors' => 'An error has occoured.']);
                }
    }
       
}
}
