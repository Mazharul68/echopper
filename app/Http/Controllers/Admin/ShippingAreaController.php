<?php

namespace App\Http\Controllers\Admin;

use carbon\carbon;
use App\Models\shipThana;
use App\Models\shipDistrict;
use App\Models\shipDivision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShippingAreaController extends Controller
{
    //Division 
    public function division(){
        $divisions = shipDivision::orderBy('id','DESC')->get();
        
     return view('admin.shipdivision.create',compact('divisions'));
    }
    //Division Store
    public function DivisionStore(Request $request){

        $request->validate([
            'division_name'=> 'required',

        ]);
        
        shipDivision:: insert([
        'division_name' => $request->division_name,
        'created_at' => carbon::now(),
    ]);
    $notification=array(
        'message'=>'Division Insert Success',
        'alert-type'=>'success'
         );
        return Redirect()->back()->with($notification);
    }

    // Division Edit
    public function DivisionEdit($division_id){

        $divisions = shipDivision::findOrFail($division_id);
        
        return view('admin.shipdivision.edit',compact('divisions'));
    }
    // Update Division
    public function UpdateDivision(Request $request){

        $division = $request->id;

        shipDivision::findOrFail($division)->update([
        'division_name' => $request->division_name,
        'created_at' => carbon::now(),
        ]);
        $notification=array(
            'message'=>'Division Update Success',
            'alert-type'=>'success'
             );
            return Redirect()->route('division')->with($notification);
    }

    //Divition Delete
    public function DivisionDelete($division_id){

        shipDivision::findOrFail($division_id)->delete();

        $notification=array(
            'message'=>'Division Successfully delete',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
    }

    /// District Area Here
    public function District(){

        $divisions = shipDivision::orderBy('division_name','ASC')->get();
        $district = shipDistrict::with('division')->orderBy('id','DESC')->get();
        
     return view('admin.shipdistrict.create',compact('district','divisions'));
    }

    // District Store
    public function districtStore(Request $request){

        $request->validate([
            'division_id'=> 'required',
            'district_id'=> 'required',
        ]);
        
        shipDistrict:: insert([
        'division_id' => $request->division_id,
        'district_name' => $request->district_name,
        'created_at' => carbon::now(),
    ]);
    $notification=array(
        'message'=>'District Insert Success',
        'alert-type'=>'success'
         );
        return Redirect()->back()->with($notification);
    }

    // District Edit
    public function DistrictEdit($district_id){

        $divisions = shipDivision::orderBy('division_name','ASC')->get();
         $district = shipDistrict::findOrFail($district_id);
        
     return view('admin.shipdistrict.edit',compact('district','divisions'));
    
    }

    //Update District
    public function UpdateDistrict(Request $request){

        $district_id = $request->id;

        shipDistrict::findOrFail($district_id)-> update([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => carbon::now(),
        ]);
        $notification=array(
            'message'=>'District Update Success',
            'alert-type'=>'success'
             );
            return Redirect()->route('district')->with($notification);
       
    }
    // District Delete
    public function DistrictDelete($district_id){

        shipDistrict::findOrFail($district_id)->delete();

        $notification=array(
            'message'=>'District Successfully delete',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
    }
/////////////////////////////////////////Thana///////////////////////////////
public function thana(){

    $divisions = shipDivision::orderBy('division_name','ASC')->get();
    $thana = shipThana::with('division','district')->orderBy('id','DESC')->get();

    return view('admin.thana.create',compact('thana','divisions'));
}

    // Get District With Ajax
    public function GetDistrict($division_id){

    $ship = shipDistrict::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
    return json_encode($ship);

}
    ///////  Thana Store
    public function ThanaStore(Request $request){

        $request->validate([
            'division_id'=> 'required',
            'district_id'=> 'required',
            'thana_name'=> 'required',
        ],[
            'division_id.required' => 'Select Division'
        ]);
        
        shipThana:: insert([
        'division_id' => $request->division_id,
        'district_id' => $request->district_id,
        'thana_name' => $request->thana_name,
        'created_at' => carbon::now(),
    ]);
    $notification=array(
        'message'=>'Thana Insert Success',
        'alert-type'=>'success'
         );
        return Redirect()->back()->with($notification);
    }

    /////// Thana Edit
    public function ThanaEdit($thana_id){

        $divisions = shipDivision::orderBy('division_name','ASC')->get();
        $thana = shipThana::findOrFail($thana_id);
        return view('admin.thana.edit',compact('divisions','thana'));
    }

    //////////Update Thana
    public function UpdateThana(Request $request){

        $thana_id = $request->id;

        shipThana::findOrFail($thana_id)->update([

            'division_id' => $request->division_id,
            'thana_name' => $request->thana_name,
            'updated_at' => carbon::now(),
        ]);
        $notification=array(
            'message'=>' Update Success',
            'alert-type'=>'success'
             );
            return Redirect()->route('thana')->with($notification);
       
    }

      /////// Thana Delete
      public function ThanaDelete($thana_id){

        shipThana::findOrFail($thana_id)->delete();

        $notification=array(
            'message'=>'Successfully delete',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
    }

}
