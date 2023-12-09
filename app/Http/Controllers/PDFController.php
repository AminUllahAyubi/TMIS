<?php

  

namespace App\Http\Controllers;

  

use PDF;

use App\Models\User;

use App\Models\Thesis;
use Illuminate\Http\Request;

  

class PDFController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function generatePDFofAnnouncedThesis()

    {

        $thesises=Thesis::where('status','announced')->get();
  

        $data = [

            'title' => 'Announced Thesis',

            'date' => date('m/d/Y'),

            'thesises' => $thesises

        ]; 


        $pdf = PDF::loadView('announcedThesisPDF', $data);

     

        return $pdf->download('announcedThesisList.pdf');

    }

}

?>