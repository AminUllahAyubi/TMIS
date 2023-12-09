<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Group;
use App\Models\Thesis;
use App\Models\Student;
use App\Models\Comments;
use App\Models\Supervisor;
use App\Models\GroupMembers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class GroupController extends Controller
{
    //
    public function group()
    {
        $groups = Group::orderBy('created_at','desc')->get();
        return view('admin.admin_group.group', compact('groups'));
    }
    // this function belongs to supervisor view.
    // when we click on supervisor name it return all related group to this supervisors
    public function viewSupervisorGroups($id){
        
        $groups = Group::where('supervisor_id',$id)->orderBy('created_at','desc')->get();
        return view('admin.admin_group.group', compact('groups'));
    }
    // this function belongs to admin.home view when we click on group id it return the group in group view

    public function viewGroupDetails($id){    
        $groups = Group::where('id',$id)->get();
        return view('admin.admin_group.group', compact('groups'));
    }
    

    public function addGroup(Request $request)
    {
            //here should show only announced thesis status  
        $thesises=Thesis::where('status','announced')->get();
        $supervisors=Supervisor::all();
        $students=Student::where('status','not_member')->get();
        $announcedThesisId='';
        $groupMembers=GroupMembers::all();
        return view('admin.admin_group.addGroup',compact('thesises','supervisors','students','announcedThesisId','groupMembers'));
    }
    
    public function storeGroup(Request $request){
        $request->validate([
            'thesis_id'=>'required',
            'supervisor_id'=>'required',
            'first_student_id'=>'required|unique:group_members,student_id|different:second_student_id,third_student_id,fourth_student_id',
            'second_student_id'=>'different:first_student_id,third_student_id,fourth_student_id',
            'third_student_id'=>'different:second_student_id,first_student_id,fourth_student_id',
            'fourth_student_id'=>'different:first_student_id,second_student_id,third_student_id',
            
        ]);
        $newAddGroup=Group::create([
            'thesis_id'=>$request->thesis_id,
            'supervisor_id'=>$request->supervisor_id,
        ]);
        
        $first=$request->first_student_id;
        $second=$request->second_student_id;
        $third=$request->third_student_id;
        $fourth=$request->fourth_student_id;
        if($second=="two"){
            $second=0;
        }

        if($third=='three'){
            $third=0;
        }
        
        if($fourth=='four'){
            $fourth=0;
        }
        $students=[$first,$second,$third,$fourth];
        

        foreach($students as $student){
            GroupMembers::create([
                'student_id'=>$student,
                'group_id'=>$newAddGroup->id
            ]);
            Student::where('id',$student)->update([
                'status'=>'member'
            ]);
        }

        Thesis::where('id',$request->thesis_id)->update([
            'status'=>'submited'
        ]);
        return redirect()->route('admin.group')->with('create_group_message','new group created!');
    }

    public function editGroup($groupId,$thesisId,$supervisorId,$firstStudentId,$secondStudentId,$thirdStudentId,$fourthStudentId){
        $thesises=Thesis::all();
        $supervisors=Supervisor::all();
        $students=Student::all();
        // passing current row info and new rows from three tables for admin_edit view
        return view('admin.admin_group.editGroup',compact(
        // current row information that we want to update
        'groupId','thesisId','supervisorId',
        'firstStudentId','secondStudentId',
        'thirdStudentId','fourthStudentId'
        // all row from tables passed
        ,'thesises',
        'supervisors',
        'students')
    );
    }
    public function deleteGroup($id,$thesisId)
    {
        Group::where('id',$id)->delete();
        Thesis::where('id',$thesisId)->update([
            'status'=>'announced'
        ]);
        return redirect()->route('admin.group')->with('delete_group_message','successfully removed');

    }
    public function updateGroup(Request $request,$groupId){
        $request->validate([
            
            // 'thesis_id'=>'required|unique:group',
            'supervisor_id'=>'required',
            'first_student_id'=>'required|unique:groups|different:second_student_id,third_student_id,fourth_student_id',
            'second_student_id'=>'unique:groups|different:first_student_id,third_student_id,fourth_student_id',
            'third_student_id'=>'unique:groups|different:second_student_id,first_student_id,fourth_student_id',
            'fourth_student_id'=>'unique:groups|different:first_student_id,second_student_id,third_student_id',
            
        ]);
        $group=Group::where('id',$groupId)->update([
            'thesis_id'=>'1',
            'supervisor_id'=>$request->supervisor_id,
            'first_student_id'=>$request->first_student_id,
            'second_student_id'=>$request->second_student_id,
            'third_student_id'=>$request->third_student_id,
            'fourth_student_id'=>$request->fourth_student_id
            ]);
        return redirect()->route('admin.group')->with('update_group_message','successfully updated');
    }

}
