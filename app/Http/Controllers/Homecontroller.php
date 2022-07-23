<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;



class Homecontroller extends Controller
{

    function __construct()
    {

    // $this->middleware('auth');      
    }
    
    public function index(){
        return view('welcome');
        
    }

   
       





 
    


      

}
