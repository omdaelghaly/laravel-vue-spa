 

 <template>
     <div>



 <div class="container">
     <div class="row ">
   <button  class="btn btn-secondary  mr-1" @click="dashcomp = 'daragat'"> دراجات المعلمين </button>
   <button class="btn btn-secondary mr-1" @click="dashcomp = 'status'"> الحالة الاجتماعيه  </button>
   <button class="btn btn-secondary mr-1" @click="dashcomp = 'kdr'"> كادر المعلمين </button>
     </div>
 </div>



  <hr>
     
     
             <component :is="dashcomp" />
         



     </div>
 </template>


 <script>

import kdr from './kdr.vue'
import status from './Status.vue'
import daragat from './Daragat.vue';

 export default {
     components:{kdr,status,daragat},
     data(){
         return{
              dashcomp:'daragat',
         }
         
     },
  beforeCreate(){
            let aa= localStorage.getItem('token');  
            console.log(aa) 
            if(aa==null){
            this.$router.push('/login')
            }
        }
 }
 </script>