<?php

namespace App\Http\Controllers;

use App\Models\GroupMembers;
use App\Models\Thesis;
use App\Models\Student;
use App\Models\Supervisor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Dotenv\Store\File\Reader;
use Symfony\Component\CssSelector\Node\FunctionNode;

class ThesisController extends Controller
{
    //index(General home page all functions)
    
    public function index(){
        $thesises=Thesis::where('status','published')->paginate(5);
        
        return view('home.index',compact('thesises'));
    }

    public function searchThesis(Request $request){
        $searchName=Str::upper($request->searchedThesisName);
        $thesises=Thesis::where('name','like',"%".$searchName."%")->paginate(5);
        return view('home.index',compact('thesises'));
    }
    public function viewThesis($id){
    
        $thesis=Thesis::where('id',$id)->first();
        return view('home.view',compact('thesis'));
    }

    public function filterThesis($name){
        $thesises = Thesis::where(['status' => 'published', 'type' => $name])->paginate();
        return view('home.index', compact(['thesises']));
    
    }

                                    //downloading the view thesis book and proposal
    public function downloadProposal($id){
        $thesis=Thesis::find($id);
        return response()->download(public_path('/'.$thesis->proposal));
    }
    
    public function downloadBook($id){
        $thesis=Thesis::find($id);
        return response()->download(public_path('/'.$thesis->book));
    } 
    // admin page thesis model functions
    public function createThesis(){
        return view('admin.admin_thesis.createThesis');
    }    
    public function storeThesis(Request $request){
        $request->validate([
            'thesis_name'=>'unique:theses,name|required',
            'thesis_description'=>'required',
            'thesis_type'=>'required',
        ]);
        Thesis::create([
            'name'=>$request->thesis_name,
            'description'=>$request->thesis_description,
            'type'=>$request->thesis_type,
            'status'=>'announced'
        ]);
        return redirect()->route('admin.announcedThesises');
    }
    // view all published thesis
    public function publishedThesises(){
        $publishedThesises=Thesis::where('status','published')->get();
        return view('admin.admin_thesis.publishedThesis',compact('publishedThesises'));
    }
    // view all announced thesis
    public function announcedThesises(){
        $announcedThesises=Thesis::where('status','announced')->get();
        return view('admin.admin_thesis.announcedThesis',compact('announcedThesises'));
    }
    // delete thesis from announced thesis page
    public function deleteAnnouncedThesis($id){
        Thesis::find($id)->delete();
        return redirect()->back()->with('delete','Thesis successfully deleted!');

    }
    // edit announced thesis
    public function editAnnouncedThesis($id){
        $thesis=Thesis::find($id);
        return view('admin.admin_thesis.updateAnnouncedThesis',compact('thesis','id'));
    }
    public function updateAnnouncedThesis(Request $request,$id){
        $request->validate([
            'thesis_name'=>'required|unique:theses,name',
            'thesis_description'=>'required',
            'thesis_type'=>'required'
        ]);
        Thesis::find($id)->update([
            'name'=>$request->thesis_name,
            'description'=>$request->thesis_description,
            'type'=>$request->thesis_type
        ]);
        // return redirect()->route('admin.announcedThesises')->with('updateAnnouncedThesis','Thesis successfully updated!');
        return redirect()->back()->with('updateAnnouncedThesis','Thesis successfully updated!');
    
    }



    // view all submited thesis
    public function submitedThesises(){
        $submitedThesises=Thesis::where('status','submited')->get();
        return view('admin.admin_thesis.submitedThesis',compact('submitedThesises'));
    }
    // this function lead to add project to group when anyone click on submitToGroup Button in announced thesis page submitToGroup links
    public function submitThesisToGroup($announcedThesisId){
        $thesises=[];
        $supervisors=Supervisor::all();
        $students=Student::where('status','not_member')->get();
        return view('admin.admin_group.addGroup',compact('thesises','announcedThesisId','supervisors','students'));
    }

    // this function belong to publishing thesis when you click the link in submitedThesis page then this
    // will route you to the publish thesis details page 
    public function publishThesis($id){
        
        $thesis=Thesis::where('id',$id)->first();
        return view('admin.admin_thesis.publishThesisDetails',compact('thesis'));
        
    }

    //this function belongs to publishThesis page which publish the specific  page  
    public function publish(Request $request,$id){
        $request->validate([
            'thesisProposal'=>'required|mimes:pdf,docx',
            'thesisBook'=>'required|mimes:pdf,docx',
            'thesisImage' => 'required|mimes:jpg,bmp,png'
        ]);
        $thesis_img=$request->thesisName.'Image.'.strtolower($request->thesisImage->getClientOriginalExtension());
        $thesis_book=$request->thesisName.'Book.'.strtolower($request->thesisBook->getClientOriginalExtension());
        $thesis_proposal=$request->thesisName.'Proposal.'.strtolower($request->thesisProposal->getClientOriginalExtension());
        
        $filesLocation='files/'.$request->thesisName;

        $lastThesisImage=$filesLocation.'/'.$thesis_img;
        $lastThesisBook=$filesLocation.'/'.$thesis_book;
        $lastThesisProposal=$filesLocation.'/'.$thesis_proposal;
        
        $request->thesisBook->move($filesLocation,$thesis_book);
        $request->thesisImage->move($filesLocation,$thesis_img);
        $request->thesisProposal->move($filesLocation,$thesis_proposal);

        $thesis=Thesis::find($id)->update([
            'proposal'=>$lastThesisProposal,
            'book'=>$lastThesisBook,
            'image'=>$lastThesisImage,
            'status'=>'published'                  
        ]);

        $thesises = Thesis::where('status', 'published')->paginate(5);

        $announcedThesises = Thesis::where('status', 'announced')->get();
        $publishedThesises = Thesis::where('status', 'published')->get();
        $researchThesises = Thesis::where(['status' => 'published', 'type' => 'research'])->get();

        $webAppThesises = Thesis::where(['status' => 'published', 'type' => 'web application'])->get();

        return view('admin.home', compact(['thesises', 'announcedThesises', 'researchThesises', 'webAppThesises','publishedThesises']));
    
    }
}
