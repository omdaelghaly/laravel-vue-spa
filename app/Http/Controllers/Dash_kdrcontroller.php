<?php


namespace App\Http\Controllers;

use App\Models\Kdr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Dash_kdrcontroller extends Controller
{

   public function savekdr(Request $request){
        
        //validate
        $messages=[
            'name.required'=>'الاسم مطلوب',
            'name.min'=>'الحد الادنى هو 2 حروف',
            'name.unique' => ' هذا الاسم موجود  ',
             'name.max'  => ' اقصى حد هو  30 حرف' ,

            'bdl_m1.required'=>'الاسم مطلوب',
             'bdl_m1.min'=>'الحد الادنى هو 2 حروف',
             'bdl_m1.unique' => ' هذا الاسم موجود  ',
              'bdl_m1.max'  => ' اقصى حد هو  30 حرف' ,

              'bdl_e2.required'=>'الاسم مطلوب',
              'bdl_e2.min'=>'الحد الادنى هو 2 حروف',
              'bdl_e2.unique' => ' هذا الاسم موجود  ',
               'bdl_e2.max'  => ' اقصى حد هو  30 حرف',

               'hafez_ada.required'=>'الاسم مطلوب',
               'hafez_ada.min'=>'الحد الادنى هو 2 حروف',
               'hafez_ada.unique' => ' هذا الاسم موجود  ',
                'hafez_ada.max'  => ' اقصى حد هو  30 حرف' ,

                'hafez25.required'=>'الاسم مطلوب',
                'hafez25.min'=>'الحد الادنى هو 2 حروف',
                'hafez25.unique' => ' هذا الاسم موجود  ',
                 'hafez25.max'  => ' اقصى حد هو  30 حرف' ,


                 'all_sum.required'=>'الاسم مطلوب',
                 'all_sum.min'=>'الحد الادنى هو 2 حروف',
                 'all_sum.unique' => ' هذا الاسم موجود  ',
                  'all_sum.max'  => ' اقصى حد هو  30 حرف' ,

                  'main2014.required'=>'الاسم مطلوب',
                  'main2014.min'=>'الحد الادنى هو 2 حروف',
                  'main2014.unique' => ' هذا الاسم موجود  ',
                   'main2014.max'  => ' اقصى حد هو  30 حرف' ,


                   'all_main2014.required'=>'الاسم مطلوب',
                   'all_main2014.min'=>'الحد الادنى هو 2 حروف',
                   'all_main2014.unique' => ' هذا الاسم موجود  ',
                    'all_main2014.max'  => ' اقصى حد هو  30 حرف' ,
        ];
        $rules=[
            'name'=>'required|min:2|max:30|unique:kdrs',
            'bdl_m1'=>'max:30|',
            'bdl_e2'=>'max:30|',    
           'hafez_ada'=>'max:30|',   
            'hafez_m1'=>'max:30|',
            'all_sum'=>'max:30|',
            'main2014'=>'max:30|', 
            'all_main2014'=>'max:30|',                

        ];
    
        $validate = Validator::make($request->all(),$rules,$messages);   
    
                 if ($validate->fails()) {
                                return response()->json([
                                    'data'  => $validate->errors(),
                                    'status'=>'errors'
                                   ]);
                       };
        //save data in kdr
        
        Kdr::create([
            'name'=>$request->name,
            'bdl_m1'=>$request->bdl_m1,
            'bdl_e2'=>$request->bdl_e2,
            'hafez_ada'=>$request->hafez_ada,
            'hafez25'=>$request->hafez25,
            'all_sum'=>$request->all_sum,
            'main2014'=>$request->main2014,
            'all_main2014'=>$request->all_main2014,
            ]);
            return response()->json(['data'=>'success']);

   }

///


//get kdr
  public function getkdr(){
      $kdr = Kdr::get();
      return response()->json(['data'=>$kdr]);
  }

//edit kdr 
public function editkdr(Request $request){
        
    //validate
    $messages=[
        'name.required'=>'الاسم مطلوب',
        'name.min'=>'الحد الادنى هو 2 حروف',
        'name.unique' => ' هذا الاسم موجود  ',
         'name.max'  => ' اقصى حد هو  30 حرف'
    ];
    $rules=[
        'name'=>'required|min:2|max:30|unique:kdrs',
    ];

    $validate = Validator::make($request->all(),$rules,$messages);   

             if ($validate->fails()) {
                            return response()->json([
                                'data'  => $validate->errors(),
                                'status'=>'errors'
                               ]);
                   };
    //save data in kdr
      $kdr= Kdr::find($request->id);
      $kdr->name = $request->name;
      $kdr->update();
     
        return response()->json(['data'=>'success']);

        
}
// delete id
     public function deletekdr(Request $request){
         $kdr = Kdr::find($request->k_id);
         $kdr->delete();
     }



}

