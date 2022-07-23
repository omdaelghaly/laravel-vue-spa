
<template>
    <div>

<nav class="navbar navbar-expand-lg navbar-light bg-primary p-0 m-o"  v-show="this.$store.getters.user.name">
  <a class="navbar-brand" href="#"> Salary </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ">
      <li class="nav-item dropdown">
        <router-link  class="nav-link btn btn-primary " to="/home"><h5 style="color:white">   الرئيسية  </h5></router-link> 
      </li>
      <li class="nav-item dropdown">
           <router-link class="nav-link btn btn-primary " to="/addemp"><h5 style="color:white">  موظف </h5></router-link>
      </li>

           <li class="nav-item dropdown" v-show="this.$store.getters.user.level" >
           <router-link class="nav-link btn btn-primary " to="/dashboard"> <h5 style="color:white">  كنترول  </h5> </router-link>
            </li>

     
      </ul>





  <div class="btn-group " >
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img :src="getmyimage()" id="profileimage">
       
        {{this.$store.getters.user.name}}

  </button>
  <div class="dropdown-menu">
   
   
    <a v-show="this.$store.getters.user.level"><router-link to="/dashboard"   class="dropdown-item"  >  كنترول </router-link></a>
    <a class="dropdown-item" @click.prevent="logout()">تسجيل الخروج </a>   
 
  </div>
</div>

             
  </div>
</nav>

 

    </div>
</template>




<script>
export default {
  
     data(){
        return{
              user:{},
              token:'',
              check:'',
              admin:'',
         }
    },
    methods:{
       getmyimage(){
         return 'images/profile/'+this.$store.getters.user.profileimage ;
       },
       logout(){
         localStorage.removeItem('token');
         this.token=null;
        this.$store.commit('setauth','');
         this.$router.push('/login')
       },
      getauthuser(){

               window.axios.defaults.headers.common['Authorization'] = `Bearer `+localStorage.getItem('token');
               axios.get('api/user/').then((response)=>{
               this.$store.commit('setauth',response.data);
                this.user = this.$store.getters.user;
                this.admin = this.$store.getters.user.level
                this.token = localStorage.getItem('token');
                }).catch((errors)=>{
                   console.log(errors)
                    });
            } 
      
    },
    created(){
        
       this.getauthuser();

    },

   //when u write a fake url with fake id or do something wrong the app 
   //may stoped soo this function solve this problem
  
    watch:{
           xuser:function(val){
            if(val==null){
           // this.$router.push('/home');
                      this.getauthuser();
              }
           }
      },
    //    token:function(val){
    //      if(val==null){
    //           setTimeout(()=>{
    //                let tk=localStorage.getItem('token');
    //                 this.token=tk;
    //              },2000) ;
                 
               
    //      }
    //   }

 
     
   // },
  

  


}
</script>


<style>
#profileimage{
  widows: 30px;
  height: 30px;
  border-radius: 50%;
}
*a {
color: white
}
.nav-link{
  color:white
}
</style>