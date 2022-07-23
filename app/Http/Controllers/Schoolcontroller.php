<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Schoolcontroller extends Controller
{
         
   public function saveschool(Request  $request)
   {

    //validate
    $messages=[
        'name.required'=>'الاسم مطلوب',
        'name.min'=>'الحد الادنى هو 7 حروف',
        'name.unique' => ' هذا الاسم موجود  '
    ];
    $rules=[
        'name'=>'required|min:7|unique:schools',
    ];

    $validate = Validator::make($request->all(),$rules,$messages);   

             if ($validate->fails()) {
                            return response()->json([
                                'data'  => $validate->errors(),
                                'status'=>'errors'
                                ]);
                   };
                   
                   //savedate 

                     if($request->has('photo')){
                        foreach($request->file('photo')as $file)
                        {
                            $a=rand(0,100);
                            $path=public_path('images/school');
                            $ext= $file->getClientOriginalExtension();

                            $filename=$a.time().'.'.$ext ;
                            $file->move($path,$filename);
           

                            //save 
                      School::create([
                             'user_id' => $request->myid ,
                             'name' => $request->name ,
                             'email' => $request->email ,
                             'address' => $request->address,
                             'type' => $request->type ,
                             'about' => $request->about ,
                             'image' =>$filename ,
                             ]);
                        }
                           return response()->json(['status'=>'success']); 

                                          
                     }else{
                 
                       School::create([
                            'user_id' => $request->myid ,
                            'name' => $request->name ,
                            'email' => $request->email ,
                            'adress' => $request->address,
                            'type' => $request->type ,
                            'about' => $request->about ,
                             'image' =>'default.jpg' , //default school image
                             ]);
                             return response()->json(['status'=>'success']); 
                     }

              
    }




//get schools for only auth user

     public function getschools(Request $request)
      {
         $id = auth('sanctum')->user()->id;
         $schools=  School::where('user_id',$id)->get();
        return response()->json(['data'=>$schools]);
                    
      }



//get or pick one school useing school id 
                 
      public function getthisschool(Request $request)
       {
              $myid = auth('sanctum')->user()->id;
              $sid = $request->sid;
              $school = School::where(['id'=>$sid,'user_id'=>$myid])->get();
           //check if school id blongs to auth user or not
           if($school)
              {
                return response()->json(['data'=>$school[0],'status'=>'success']);
              }else{
                return response()->json(['data'=>'unauth','status'=>'fail']);
              }

          }


          
 // update school
                   public function updateschool(Request  $request)
                       {

                          //validate
                                $messages=[
                                        'name.required'=>'الاسم مطلوب',
                                        'name.min'=>'الحد الادنى هو 7 حروف',
                                           ];
                                $rules=[
                                      'name'=>'required | min:7',
                                       ];
  
                $validate = Validator::make($request->all(),$rules,$messages);   

                        if ($validate->fails()) {
                            return response()->json([
                              'data'  => $validate->errors(),
                              'status'=>'errors'
                              ]);
                        };
                 
                 //updaaaaatedate 

                 if($request->has('image')){
                       
                    //remove old image 
                    $oldimage=$request->old_image;
                    $path=public_path('images/school');
                    if($oldimage!=='a.png'){
                    unlink($path.'/'.$oldimage);} //a.png is the default image
                     //set new one (image)
                    $a=rand(0,100);
                    $ext= $request->image->getClientOriginalExtension();
                    $filename=$a.time().'.'.$ext ;
                    $request->image->move($path,$filename);
         

                        //  update
                $school = School::find($request->id);
               
                   $school->name = $request->name ;
                   $school->email = $request->email ;
                   $school->address = $request->address ;
                   $school->type = $request->type ;
                   $school->about = $request->about ; 
                   $school->image =  $filename ; 
                   $school->update();
                  
                 return response()->json(['status'=>'success','data'=>$request->all()]); 
                
                }else{
                
                       //  update
                       $school = School::find($request->id);
               
                       $school->name = $request->name ;
                       $school->email = $request->email ;
                       $school->address = $request->address ;
                       $school->type = $request->type ;
                       $school->about = $request->about ; 
                       $school->update();
                  
                 
                 return response()->json(['status'=>'success','data'=>$request->all()]); 

                 }

            
        
             
  }                 


         public function deleteschool(Request $request){

             $school = School::find($request->id);

             if($school){
              $school->getemp->delete();
              $school->delete();
                 return response()->json(['status'=>'success']);
             }else{
              return response()->json(['status'=>'errors']);

             }
                   
          }








}
