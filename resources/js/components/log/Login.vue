<template >
    <div>

    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->



    <div id="loginform" class=" col-xl-4  col-lg-6  col-md-9 col-sm-12 " style="margin:0 auto">
    <div id="login" >

        <h1 class="text-center">تسجيل الدخول </h1>
        
        <form class="form-group" @submit.prevent="login" >
            <div class="form-group ">
                <label class="form-label" for="email"> البريد الالكترونى </label>
                <input class="form-control" v-model="form.email"  type="email" id="email" required>
                  <center> <span   v-if="errors.email">{{errors.email}}</span> </center> 
            </div>

            <div class="form-group ">
                <label class="form-label" for="password">كلمة المرور</label>
                <input class="form-control" v-model="form.password"  type="password" id="password" required>
                    <center> <span id="n" v-if="errors.password">{{errors.password}}</span> </center> 
         
            </div>

            <div class="form-group form-check">
                <label class="form-check-label" for="check"> تذكرنى </label>
                <input class="form-check-input" type="checkbox" id="check">
            </div>

           
           
            <input class="btn btn-success w-100" type="submit" value="تسجيل الدخول">
        
            </form>


            <br><br>
  <center>
       <router-link to="/register"   class="dropdown-item"> ليس لديا حساب .... انشاء حساب جديد   </router-link>
   </center>



    </div>
    </div>




    </div>
</template>



<script>
export default {
  
    data() {
        return{
            form:{
                email:'',
                password:'',
                device_name:'browser',
            },
            errors:{},
        }
        
    },
    methods:{
          login(){
                    this.errors={};
              this.$store.commit('setout','');
              axios.post('api/login',this.form).then((res)=>{
                  if(res.data.status=='errors'){
                     this.errors=res.data;
                   //  console.log(res.data)
                   }else{
                      localStorage.removeItem('token');
                     localStorage.setItem('token',res.data);
                    this.getauthuser();
                      //console.log(res.data)
                    }
              })
          },
          
         async getauthuser(){
               window.axios.defaults.headers.common['Authorization'] = `Bearer `+localStorage.getItem('token');
               axios.get('api/user/').then((response)=>{
               this.$store.commit('setauth',response.data);
                this.user = response.data;
                this.xuser = response.data.email
                this.admin = response.data.level
                this.token = localStorage.getItem('token');
                }).catch((errors)=>{
                   console.log(errors)
                    });
              await this.$router.push('/home');

            } 

          
        
    },
    beforeCreate(){
            let aa= localStorage.getItem('token');  
            //console.log(aa) 
            if(aa !=null){
            this.$router.push('/home')
            }
        } 
}
</script>


<style>
#loginform{
    border-radius: 70px 0px 70px ;
    background-color: skyblue;
    margin-top:100px;
    
    
}
#login{
    padding:20px
}
</style>