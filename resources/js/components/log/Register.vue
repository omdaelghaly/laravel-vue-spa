<template>
    <div>
  


    <div id="registerform" class=" col-xl-4  col-lg-6  col-md-9 col-sm-12 " style="margin:0 auto">
    <div id="register" >

       <div style="border-ridus:30px" class="btn btn-success form-control " v-if="success" > تم التسجيل بنجاح</div>



        <h1 class="text-center"> التسجيل</h1>
        
        <form class="form-group" @submit.prevent="register" >
             
           <div class="form-group">
              <label  class="form-label" for="name"> الاسم </label>
              <input type="text" name="name" v-model="newuser.name" class="form-control" placeholder="الاسم" id="name">
               <center> <span style="color:red" v-if="errors.name">{{errors.name[0]}}</span></center>
            </div>


            <div class="form-group ">
                <label class="form-label" for="email"> البريد الالكترونى </label>
                <input class="form-control" v-model="newuser.email"  type="email" id="email" placeholder="البريد الالكترونى" required>
                  <center> <span style="color:red"  v-if="errors.email">{{errors.email[0]}}</span> </center> 
            </div>

            <div class="form-group ">
                <label class="form-label" for="password">كلمة المرور</label>
                <input class="form-control" v-model="newuser.password"  type="password" id="password" placeholder="كلمة المرور" required>
                    <center> <span style="color:red" v-if="errors.password">{{errors.password[0]}}</span> </center> 
            </div>

            <div class="form-group">
                <label class="form-label" for="pwd">تاكيد كلمة المرور </label>
                <input type="password" name="conpass" v-model="newuser.confirm" class="form-control" placeholder="تاكيد كلمة المرور" id="confpwd">
                <center> <span style="color:red" v-if="errors.confirm">{{errors.confirm[0]}}</span></center>
            </div>
             
             <br>
             <div class="form-group">
                <input class="btn btn-success w-100" type="submit" value="تسجيل">
              </div>   
        </form>


            <br>
    <center>
          <router-link  to="/login"   class="dropdown-item">  لديا حساب.. تسجيل الدخول </router-link>
    </center>



    </div>
    </div>







    </div>
</template>





<script>
export default {
  data() {
    return {
      newuser: {
                name: "",
                email: "",
                 password: "",
                 confirm: "",
                  },
            errors:[],
            success:false,
            
                     
            };
           },
  methods: {
         register(){
                      this.errors='';
                      let that=this;
                  axios.post("api/register", this.newuser)
                  .then((res) => {
                         if(res.data.status=='errors')
                              {this.errors=res.data.data}
                          else{
                               console.log('saved successfully');
                               this.success=true;
                             setTimeout(function(){
                                  this.success=false;
                                  that.$router.push("/Login");
                               },3000)
                          };
                    });
               },
               
           },

       beforeCreate(){
            let aa= localStorage.getItem('token');  
            console.log(aa) 
            if(aa!=null){
            this.$router.push('/home')
            }
        }
 
  
};
</script>




<style>
#registerform{
    border-radius: 70px 0px 70px ;
    background-color: skyblue;
    margin-top:100px;
    direction: rtl;
    
    
}
#register{
    padding:20px
}
.form-label{
  float: right;
}


</style>