<?php

namespace App\Http\Controllers;

use App\Models\Daraga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Dash_daragacontroller extends Controller
{

   public function savedaraga(Request $request){
        
        //validate
        $messages=[
            'name.required'=>'الاسم مطلوب',
            'name.min'=>'الحد الادنى هو 2 حروف',
            'name.unique' => ' هذا الاسم موجود  ',
             'name.max'  => ' اقصى حد هو  30 حرف'
        ];
        $rules=[
            'name'=>'required|min:2|max:30|unique:daragas',
        ];
    
        $validate = Validator::make($request->all(),$rules,$messages);   
    
                 if ($validate->fails()) {
                                return response()->json([
                                    'data'  => $validate->errors(),
                                    'status'=>'errors'
                                   ]);
                       };
        //save data in dragat
          Daraga::create([
             'name'=>$request->name,
         ]);
            return response()->json(['data'=>'success']);

   }

///


//get daraga
  public function getdaraga(){
      $daraga = Daraga::get();
      return response()->json(['data'=>$daraga]);
  }

//edit daraga 
public function editdaraga(Request $request){
        
    //validate
    $messages=[
        'name.required'=>'الاسم مطلوب',
        'name.min'=>'الحد الادنى هو 2 حروف',
        'name.unique' => ' هذا الاسم موجود  ',
         'name.max'  => ' اقصى حد هو  30 حرف'
    ];
    $rules=[
        'name'=>'required|min:2|max:30|unique:daragas',
    ];

    $validate = Validator::make($request->all(),$rules,$messages);   

             if ($validate->fails()) {
                            return response()->json([
                                'data'  => $validate->errors(),
                                'status'=>'errors'
                               ]);
                   };
    //save data in dragat
      $daraga= Daraga::find($request->id);
      $daraga->name = $request->name;
      $daraga->update();
     
        return response()->json(['data'=>'success']);

        
}
// delete id
     public function deletedaraga(Request $request){
         $daraga = Daraga::find($request->d_id);
         $daraga->delete();
     }



}
