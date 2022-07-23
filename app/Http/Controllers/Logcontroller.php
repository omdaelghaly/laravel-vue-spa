<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Logcontroller extends Controller
{
   //login 
    public function login(Request $request){
     
        //$email    = $request->email;
        //$password = $request->password;
//from vuejs site issues
         $user = User::where('email', $request->email)->first();

        if ($user)
          {//checkpassword
            if(Hash::check($request->password, $user->password))
               {//success
                
                   return $user->createToken($request->device_name)->plainTextToken;

               }else{
                 return response()->json([
                     "status"=>"errors",
                     "password" => " كلمة المرور غير صحيحه ",
                 ]);
               }
            }else{
            return response()->json([
              "status"=>"errors",
               "email" => " هذا الأميل غير صحيح ",
            ]);
           }
           
           
   }


// registeration 
     

    public function register(Request $request){
            $messages=[
                'name.required'=>'الاسم مطلوب',
                'name.min'=>'الحد الادنى هو 5 حروف',
                'email.required'=>'الايميل مطلوب',
                'email.email'=>'اكتب ايميل صحيح',
                'email.unique'=>'هذا الايميل موجود ',
                'password.required'=>'كلمة المرور مطلوبة',
                'confirm.required'=>'تاكيد كلمه المرور مطلوب',
                'password.min'=>'الحد الادنى لكلمة المرور 5 احرف او ارقام ',
                'confirm.min'=>'الحد الادنى لكلمة المرور 5 احرف او ارقام ',
                'password.same'=>'لابد ان تكون كلمتا المرور متطابقتان',
                'confirm.same'=>'لابد ان تكون كلمتا المرور متطابقتان',
                 ];
            $rules=[
                'name'=>'required | min:5   ',
                'email'=>'required | email ',
                'password'=>'required | min:5 |same:confirm',
                'confirm'=>'required |min:5|same:password'
                 ];

                 $validate = Validator::make($request->all(),$rules,$messages);   

                 if ($validate->fails()) {
                                return response()->json([
                                                        'data'  => $validate->errors(),
                                                        'status'=>'errors'
                                                        ]);
                                           }else{
              
                          User::create([
                                 'name' => $request->name,
                                  'email'=> $request->email,
                                  'password'=>Hash::make($request->password),
                                          ]) ;
                             return response()->json(['status'=>'success']); 
                                          }       


     }



}
