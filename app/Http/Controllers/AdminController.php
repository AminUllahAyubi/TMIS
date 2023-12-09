<?php
namespace App\Http\Controllers;

use PDF;
use App\Models\Thesis;
use App\Models\Student;
use App\Models\Supervisor;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    // dashboard page function
    public function adminLogin()
    {
        return view('admin.admin_profile.login');
        // return view('auth.login');
    }

    public function index()
    {
        $thesises = Thesis::where('status', 'published')->orderBy('created_at','desc')->get();

        $announcedThesises = Thesis::where('status', 'announced')->get();
        $publishedThesises = Thesis::where('status', 'published')->get();
        $researchThesises = Thesis::where(['status' => 'published', 'type' => 'research'])->get();

        $webAppThesises = Thesis::where(['status' => 'published', 'type' => 'web application'])->get();

        return view('admin.home', compact(['thesises', 'announcedThesises', 'researchThesises', 'webAppThesises','publishedThesises']));
    }

    public function filterThesis(Request $request)
    {
        if ($request->thesis_type == "all") {
            $thesises = Thesis::where('status', 'published')->get();
            $announcedThesises = Thesis::where('status', 'announced')->get();
            $publishedThesises = Thesis::where('status', 'published')->get();
            $researchThesises = Thesis::where(['status' => 'published', 'type' => 'research'])->get();
            $webAppThesises = Thesis::where(['status' => 'published', 'type' => 'web application'])->get();
            return view('admin.home', compact(['thesises', 'announcedThesises', 'researchThesises', 'webAppThesises','publishedThesises']));
        } else {
            $thesises = Thesis::where(['status' => 'published', 'type' => $request->thesis_type])->paginate(5);

            $announcedThesises = Thesis::where('status', 'announced')->get();
            $publishedThesises = Thesis::where('status', 'published')->get();
            $researchThesises = Thesis::where(['status' => 'published', 'type' => 'research'])->get();

            $webAppThesises = Thesis::where(['status' => 'published', 'type' => 'web application'])->get();

            return view('admin.home', compact(['thesises', 'announcedThesises', 'researchThesises', 'webAppThesises','publishedThesises']));
        }
    }
    //admin dashboard searchbar function 
    public function searchThesis(Request $request)
    {
        $searchName = Str::upper($request->searchedThesisName);
        $thesises = Thesis::where(['status'=>'published','name'=>$searchName])->paginate(5);
        $announcedThesises = Thesis::where('status', 'announced')->get();
        $publishedThesises = Thesis::where('status', 'published')->get();
        $researchThesises = Thesis::where(['status' => 'published', 'type' => 'research'])->get();
        $webAppThesises = Thesis::where(['status' => 'published', 'type' => 'web application'])->get();
        return view('admin.home', compact(['thesises', 'announcedThesises', 'researchThesises', 'webAppThesises','publishedThesises']));
    }
    // dashboard small div links function


    public function groupByTypeThesis($type){
        $thesises = Thesis::where(['status' => 'published', 'type' => $type])->paginate(5);

            $announcedThesises = Thesis::where('status', 'announced')->get();
            $publishedThesises = Thesis::where('status', 'published')->get();
            $researchThesises = Thesis::where(['status' => 'published', 'type' => 'research'])->get();

            $webAppThesises = Thesis::where(['status' => 'published', 'type' => 'web application'])->get();

            return view('admin.home', compact(['thesises', 'announcedThesises', 'researchThesises', 'webAppThesises','publishedThesises']));
        
    }
    public function deletePublishedThesis($id)
    {
        Thesis::find($id)->delete();
        return redirect()->back()->with('deletePublishedThesis', 'Thesis successfully deleted!');
    }
    public function viewThesis($id)
    {
        $thesis = Thesis::where('id', $id)->first();
        return view('admin.view', compact('thesis'));
    }
}
