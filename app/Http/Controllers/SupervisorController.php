<?php

namespace App\Http\Controllers;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SupervisorController extends Controller
{
    //
        // supervisor model related function

        public function supervisor(){
            $supervisors=Supervisor::paginate(5);
            return view('admin.admin_supervisor.allSupervisor',compact('supervisors'));
        }
        public function addSupervisor(Request $request){
            $request->validate([
                'first_name'=>'required',
                'last_name'=>'required',
                'email'=>'required|max:80|unique:supervisors,email',
            ]);
            Supervisor::create([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email
            ]);
            return redirect()->route('admin.supervisor')->with('success','succesfully added');
        }

        public function editSupervisor(Request $request, $id){
            $supervisor=Supervisor::find($id);
             return view('admin.admin_supervisor.editSupervisor',compact('supervisor'));
        }

        public function updateSupervisor(Request $request, $id){
            $request->validate([
                'first_name'=>'required|min:3',
                'last_name'=>'required|min:3',
                'email'=>['required',Rule::unique('supervisors')->ignore($id)]
            ]);
            $supervisor=Supervisor::find($id)->update([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email
            ]);
            return redirect()->route('admin.supervisor')->with('update_supervisor_message','successfully update!');
        }

        public function deleteSupervisor($id){
            Supervisor::where('id',$id)->delete();
            return redirect()->route('admin.supervisor')->with('delete','successfully removed');
        }    
}
