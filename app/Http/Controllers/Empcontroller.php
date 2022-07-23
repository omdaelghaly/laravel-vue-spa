<?php
namespace App\Http\Controllers;

use App\Models\Daraga;
use App\Models\Emp;
use App\Models\Kdr;
use App\Models\School;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Empcontroller extends Controller
{
    public function getaddinfo()
    {

                 
      $myid = auth('sanctum')->user()->id;
      $school = School::select('id','name')->where(['user_id'=>$myid])->get();
      $kdr    =Kdr::select('id','name')->get();
      $daraga= Daraga::select('id','name')->get(); 
      $state= State::select('id','name')->get();          
      return response()->json([
        'schools'=>$school,
        'kdrs'   =>$kdr,
        'daragas' =>$daraga,
        'states'  =>$state,
        ]);
    }



    public function addemp(Request $request)
    {
               //validate
    $messages=[
      'name.required'=>'الاسم مطلوب',
      'name.min'=>'الحد الادنى هو 2 حروف',
      'name.unique' => ' هذا الاسم موجود  ',
       'name.max'  => ' اقصى حد هو  30 حرف',

       //'email.required'=>'الاسم مطلوب',
       'email.unique' => ' هذا االايميل موجود  ',
        'email.email'  => ' ليس ايميل  ',

        //'address.required'=>'الاسم مطلوب',
        //'address.min'=>'الحد الادنى هو 2 حروف',
        //'address.unique' => ' هذا الاسم موجود  ',
         'address.max'  => ' اقصى حد هو  30 حرف'
  ];
  $rules=[
    'name'=>'required|min:2|max:30|unique:emps',
    'email'=>'email|unique:emps',
    'address'=>'max:30',
  ];

  $validate = Validator::make($request->all(),$rules,$messages);   

           if ($validate->fails()) {
                          return response()->json([
                              'data'  => $validate->errors(),
                              'status'=>'errors'
                             ]);
                 };

        Emp::create([
          'name'=>$request->name,
          'school_id'=>$request->school_id,
          'kdr_id'=>$request->kdr_id,
          'daraga_id'=>$request->daraga_id,
          'state_id'=>$request->state_id,
          'email'=>$request->email,
          'address'=>$request->address,
          ]);
       return response()->json(['status'=>'success' , 'data'=>$request->all()]);

    }



     public function getallempsinfo(Request $request)
     {
       $sid  =$request->sid;
       $myid =$request->myid;
       $emp = Emp::where(['school_id'=>$sid])
       ->with('getempsalary')->get();
            
      return response()->json(['data'=>$emp]);
     }
   


     public function getemps(Request $request){
      $myid = auth('sanctum')->user()->id;
      $school = Emp::select('id','school_id','name','kdr_id','daraga_id','state_id','email','address')->where([ 'school_id'=>$request->empschool_id])->get();
      return response()->json(['data'=>$school]);
     }


     public function updateemp(Request $request)
     {
                //validate
     $messages=[
       'name.required'=>'الاسم مطلوب',
       'name.min'=>'الحد الادنى هو 2 حروف',
       'name.unique' => ' هذا الاسم موجود  ',
        'name.max'  => ' اقصى حد هو  30 حرف',
 
       'email.required'=>'الاسم مطلوب',
        'email.unique' => ' هذا الاسم موجود  ',
         'email.email'  => ' ليس ايميل  ',
 
         //'address.required'=>'الاسم مطلوب',
         //'address.min'=>'الحد الادنى هو 2 حروف',
         //'address.unique' => ' هذا الاسم موجود  ',
          'address.max'  => ' اقصى حد هو  30 حرف'
   ];
   $rules=[
     'name'=>'required|min:2|max:30|unique:emps',
     'email'=>'email',
     'address'=>'max:30',
   ];
 
   $validate = Validator::make($request->all(),$rules,$messages);   
 
            if ($validate->fails()) {
                           return response()->json([
                               'data'  => $validate->errors(),
                               'status'=>'errors'
                              ]);
                  };
 
      //  $emp =  Emp::find($request->id);
      //    $emp->name      = $request->name;
      //    $emp->school_id =  $request->school_id ;
      //    $emp->kdr_id    = $request->kdr_id;
      //    $emp->daraga_id =$request->daraga_id;
      //    $emp->state_id  = $request->state_id;
      //    $emp->email     = $request->email;
      //    $emp->address   = $request->address;
      //      $emp->update();
        return response()->json(['status'=>'success' , 'data'=>$request->all()]);
 
     }



  public function deleteemp(Request $request){
    $emp =  Emp::find($request->id);
    if($emp){
      $emp->delete();
      return response()->json(['status'=>'success']);
    }else{
      return response()->json(['status'=>'errors']);
    }

  }



}
