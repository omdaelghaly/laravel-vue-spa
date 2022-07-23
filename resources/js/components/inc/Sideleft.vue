
<template>
    <div>

     

         <ul class="navbar-nav  "     v-if="this.$store.getters.user"  >
      
        <li class="nav-item dropdown">
        <router-link  class="nav-link btn btn-primary " to="/home"><h5 style="color:white">   الرئيسية  </h5></router-link> 
      </li>
      
      <li class="nav-item dropdown">
           <router-link class="nav-link btn btn-primary " to="/addemp"><h5 style="color:white">  موظف </h5></router-link>
      </li>

     <li class="nav-item dropdown" v-show="this.$store.getters.user.level">
           <router-link class="nav-link btn btn-primary " to="/dashboard"> <h5 style="color:white">  كنترول  </h5> </router-link>
       </li>


     
        </ul>

       
        
    </div>
</template>