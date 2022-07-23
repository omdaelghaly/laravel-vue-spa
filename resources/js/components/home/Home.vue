<template>
    <div>
      
      <div class="container">
          <div class="row">

                <router-link class="btn btn-info col-3" to="/addnewschool"> اضف مدرسة جديده</router-link>

          </div>
        </div>
    

<hr>

                   <myschool></myschool>


            
   
   
   
    </div>
</template>


<script>
import myschool from './Myschool.vue';
export default {
components:{myschool},

     data(){
        return{



               }
    },   
    beforeCreate(){
            let aa= localStorage.getItem('token');  
            //console.log(aa) 
            if(aa==null){ this.$router.push('/login')}
            }
   
}
</script>
