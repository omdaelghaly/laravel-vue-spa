<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class Dash_statecontroller extends Controller
{

   public function savestate(Request $request){
        
        //validate
        $messages=[
            'name.required'=>'الاسم مطلوب',
            'name.min'=>'الحد الادنى هو 2 حروف',
            'name.unique' => ' هذا الاسم موجود  ',
             'name.max'  => ' اقصى حد هو  30 حرف'
        ];
        $rules=[
            'name'=>'required|min:2|max:30|unique:states',
        ];
    
        $validate = Validator::make($request->all(),$rules,$messages);   
    
                 if ($validate->fails()) {
                                return response()->json([
                                    'data'  => $validate->errors(),
                                    'status'=>'errors'
                                   ]);
                       };
        //save data in state
          State::create([
             'name'=>$request->name,
         ]);
            return response()->json(['data'=>'success']);

   }

///


//get state
  public function getstate(){
      $state = State::get();
      return response()->json(['data'=>$state]);
  }

//edit state 
public function editstate(Request $request){
        
    //validate
    $messages=[
        'name.required'=>'الاسم مطلوب',
        'name.min'=>'الحد الادنى هو 2 حروف',
        'name.unique' => ' هذا الاسم موجود  ',
         'name.max'  => ' اقصى حد هو  30 حرف'
    ];
    $rules=[
        'name'=>'required|min:2|max:30|unique:states',
    ];

    $validate = Validator::make($request->all(),$rules,$messages);   

             if ($validate->fails()) {
                            return response()->json([
                                'data'  => $validate->errors(),
                                'status'=>'errors'
                               ]);
                   };
    //save data in state
      $state= State::find($request->id);
      $state->name = $request->name;
      $state->update();
     
        return response()->json(['data'=>'success']);

        
}
// delete id
     public function deletestate(Request $request){
         $state = State::find($request->s_id);
         $state->delete();
     }



}
