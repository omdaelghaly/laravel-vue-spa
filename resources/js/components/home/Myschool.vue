<template>
  <div class="container" >


   <div class="btn btn-success form-control " v-if="success" > {{msg}}</div>
   <div class="btn btn-danger form-control " v-if="xerror" > {{xmsg}}</div>
<br>  
       <center>  <span style="color:red;" v-if="!schools">  لم يتم اضافة مدارس جديده حتى الان.....</span>  </center>



<!-- --------------------------------------------------------------------------- -->



<div class="container">
    <div class="row text-right">
        
                <div v-for="(school,index) in schools" :key="index" class="card col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 my-2 "
                     style="border:2px solid red;box-shadow:10px 10px #00ff00;border-radius:30px;margin:auto ;padding:0">
                      
                      <!-- school opition btns -->
                 <div style="border-radius:30px 20px;z-index:10;position:absolute;">
    
                          <a class="nav-link dropdown-toggle"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              ...
                           </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <router-link :to="{ name:'editschool', params:{sid:school.id } }"  class="dropdown-item">تعديل</router-link>
                                <a @click.prevent="deleteschool(school.id)"   class="dropdown-item">حذف</a>
        
                          </div>

                 </div>




                       <!-- ----------------- -->
                        <img :src="getschoolimg(school.image)" class="card-img-top "  
                            style="height:250px;width:100%; border-radius:30px ;">
                        <div class="card-body">
                            <h5 class="card-title">{{school.name}}</h5>
                            <p>{{school.about}}</p>
                            <p>{{school.type}}</p>
                            <p>{{school.address}}</p>
                 
                        </div>
                </div>

              
                   
    </div>
</div>

   
<!-- ---------------------------------------------------------------------- -->

  </div>
</template>

<script>
export default {
  data() {
    return {
             myid:'',
             schools:'',
             xerror:'',
             success:''
                
            };
            
  },
  methods: {
       
        
       getschoolimg(img) {
         return "images/school/"+img;
         },
        gotosalary(sid){
           this.$router.push('/salary/'+sid)
         },
         deleteschool(sid){    
                     let that=this;
             let answer = window.confirm('هل تريد حذف مدرسة؟');
             if(answer){             
          axios.post('api/deleteschool',{'id':sid}).then((res)=>{
                                console.log(res.data.data)

                if(res.data.status=='errors'){
                    //console.log(res.data.data)
                  }else{
                  this.success=true;
                  this.msg=" تم حذف مدرسة بنجاح"
                  this.getschools();
                  setTimeout(() => {
                   that.success=false;
                   that.msg='';
                    },5000) };
                    })
             }
         },
         getschools(){
              // get user auth id
    window.axios.defaults.headers.common['Authorization'] = `Bearer `+localStorage.getItem('token');

              // get user auth schools 
                 axios.post('api/getschools').then(res=>{
                  //console.log(res.data.data)
                   this.schools=res.data.data;
              });
         }
         
    
  },
  
    created(){
         this.getschools();
       
   
    },
    
};
</script> 