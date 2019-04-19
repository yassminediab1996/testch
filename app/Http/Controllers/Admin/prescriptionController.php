<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Category;
use App\AdminModel\PrescDrug;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Doctor;
use App\AdminModel\Drug;
use App\AdminModel\Patient;
use App\AdminModel\Prescription;
class prescriptionController extends Controller
{
   public function index()
    {
        
        $presciption = Prescription::all();
        return view('admin.Prescriptions.index',compact('presciption'));

    }

      public function Create(Request $request)
    {
         $this->validate($request,[
            'drug_name' => 'required',
            'drug_time' => 'required',
        ]);
      
      $doc = Doctor::create(['name' => $request->doctor_name]);
      $patient =  Patient::create(['name' => $request->patient_name]);
      $prescription = Prescription::create([
          'date' => $request->date ,
          'doctor_id' =>$doc->id ,
          'patient_id' => $patient->id ,
          'drugs' => implode(',',$request->drug_name) ,
          'times' =>implode(',',$request->drug_time)
      ]);
      return redirect('17$es12/prescription');
    }

    public function update(Request $request)
    {
      
        unset($request['_token']);

        if($request->doctor_name)
        {
           $doc = Doctor::where('id',$request->doctor_id)->update(['name' => $request->doctor_name]); 
        }
         if($request->patient_name)
        {
          $patient =  Patient::where('id',$request->patient_id)->update(['name' => $request->patient_name]); 
        }
         if($request->patient_age)
        {
           Patient::where('id',$request->patient_id)->update(['age' => $request->patient_age]); 
        }
      
           Prescription::find((int)$request->prescription)->update([
               'date' => $request->date ,
               'doctor_id' =>$request->doctor_id ,
               'patient_id' => $request->patient_id ,
               'drugs' => implode(',',$request->drug_name) , 
               'times' =>implode(',',$request->drug_time) 
               ]);

         return redirect('17$es12/prescription');
    }
    public function Getinfo(Request $request)
    {
        // $request['o_price'] = Product::Price($request->id);
        return Prescription::find($request->id);
    }
    public function delete(Request $request)
    {
        Prescription::find($request->id)->delete();
        return redirect()->back();
    }
    
      public function GetDocInfo(Request $request)
    {
           
            $docinfo = Prescription::find($request->id);

            echo '<div id="myList2" class="table-responsive" >
                <table class="table table-bordered table-lg" id="myTable2">
                <tbody>
                <tr>
                  <td>Name Of Drug</td>
                  <td>Time Of Drugs</td>
                </tr>   ';

            echo '<tr id="tr2-'.$docinfo->id.'">
                   ';
                    $daoctors = explode(',',$docinfo->drugs);
                    $times = explode(',',$docinfo->times);

                        foreach($daoctors as $key => $doc){
                            echo '<tr>';
                        echo '<td>'.$doc.'</td>';
                        echo '<td>' .$times[$key].'</td>';
                        echo '</tr>';
                        }
                    echo'<td>
                    <ul class="icons-list">
                      <li class="text-primary-600"><a href="#" onclick="showEdit2('.$docinfo->id.')" data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></li>

                      <li class="text-danger-600" ><a href="#"  onclick="DeleteInfo('. $docinfo->id .')" data-popup="tooltip" title="" data-original-title="Remove"><i class="icon-trash"></i></a></li>
                   </ul>
                    </td>
                  </tr>';

            echo '</tbody></table></div>';
       
    }
}