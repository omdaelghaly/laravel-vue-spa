<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <body >
    

    
     
        <div id="app" >
   <!-- --  ----------header------------------------------------ ----------------------------------->
            <div class="row">
                <div class="col-12">
                        <Mynavbar></Mynavbar>
                </div>
           </div>

<!-- -- ---------------------------------end header------------- ---------------------------------------->
<!---- -------------------------body--------- -------------------------------------------------------- -->
  
      <div class="row">


<!-- ----------------   rout leftpart------------------------------- -------------------------------------->
<div class=" col-xs-12 col-sm-12 col-md-9- col-lg-9 col-xl-9 " 
     style="direction: rtl">
     <br>
               <router-view></router-view>
</div>


<!-------------------------------------------- ----------------------------------------------- -->


<!-- ------------------------right side bar-------------------------------------- -->
<div class="d-none d-md-none d-lg-block d-xl-block col-xs-12 col-sm-12 col-md-3- col-lg-3 col-xl-3 " >
<br><br><br><br>
  
   <sideleft></sideleft>

</div>

<!-- --------------------------------------end side bar---------------------------------- -->


      </div>
  </div>
<!-- --------------------------------------------------------------------- -->
   


    </body>
    <script src="{{asset('js/app.js')}}"></script>
</html>