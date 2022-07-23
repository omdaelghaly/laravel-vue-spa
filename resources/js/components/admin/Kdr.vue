

<template>
    <div>



   <div class="btn btn-success form-control " v-if="success" > {{msg}}</div>
   <div class="btn btn-danger form-control " v-if="xerror" > {{xmsg}}</div>
<br>  



<div class="container">


<form action="/savekdr" ref="form-kdrs" >

  <div class="form-group row">
    <label  for="inputEmail3" class="d-none d-xs-none d-sm-none d-md-block d-lg-block d-xl-block col-sm-2 col-form-label"> الكادر </label>
    <div class="col-sm-10">
      <input type="text" :style="{color:alertcolor}" v-model="kdr.name" :keyup="alertlength(1,kdr.name)" required class="form-control" id="" placeholder="ادخل اسم الكادر  ">
          <div  >
              <span ref="xx"  v-if="xlength - (kdr.name).length  !=xlength " >{{ xlength - (kdr.name).length }}</span>
            <span  style="color:red ;float:right" v-if="errors.name">{{errors.name[0]}}</span>
          </div>

    </div>
  </div>

  <div class="form-group row">
    <label  for="inputEmail3" class="d-none d-xs-none d-sm-none d-md-block d-lg-block d-xl-block col-sm-2 col-form-label"> بدل معلم اول</label>
    <div class="col-sm-10">
      <input type="text" :style="{color:alertcolor}" v-model="kdr.bdl_m1" :keyup="alertlength()" required class="form-control" id="" placeholder="ادخل بدل معلم اول  ">
          <div  >
              <span  v-if="xlength - (kdr.bdl_m1).length !=xlength " :style="{float:'left',color:alertcolor}">{{ xlength - (kdr.bdl_m1).length }}</span>
            <span  style="color:red ;float:right" v-if="errors.bdl_m1">{{errors.bdl_m1[0]}}</span>
          </div>

    </div>
  </div>


  <div class="form-group row">
    <label  for="inputEmail3" class="d-none d-xs-none d-sm-none d-md-block d-lg-block d-xl-block col-sm-2 col-form-label">بدل اعتماد تانى </label>
    <div class="col-sm-10">
      <input type="text" :style="{color:alertcolor}" v-model="kdr.bdl_e2" :keyup="alertlength()" required class="form-control" id="" placeholder="ادخل بدل اعتماد تانى  ">
          <div  >
              <span v-if=" xlength - (kdr.bdl_e2).length !=xlength " :style="{float:'left',color:alertcolor}">{{ xlength - (kdr.bdl_e2).length }}</span>
            <span  style="color:red ;float:right" v-if="errors.bdl_e2">{{errors.bdl_e2[0]}}</span>
          </div>

    </div>
  </div>



    <div class="form-group row">
    <label  for="inputEmail3" class="d-none d-xs-none d-sm-none d-md-block d-lg-block d-xl-block col-sm-2 col-form-label">حافز الاداء </label>
    <div class="col-sm-10">
      <input type="text" :style="{color:alertcolor}" v-model="kdr.hafez_ada" :keyup="alertlength()" required class="form-control" id="" placeholder="ادخل حافز الاداء  ">
          <div  >
              <span  v-if="xlength - (kdr.hafez_ada).length !=xlength " :style="{float:'left',color:alertcolor}">{{ xlength - (kdr.hafez_ada).length}}</span>
            <span  style="color:red ;float:right" v-if="errors.hafez_ada">{{errors.hafez_ada[0]}}</span>
          </div>

    </div>
  </div> 
  
  
   <div class="form-group row">
    <label  for="inputEmail3" class="d-none d-xs-none d-sm-none d-md-block d-lg-block d-xl-block col-sm-2 col-form-label">حافز اداء 25% </label>
    <div class="col-sm-10">
      <input type="text" :style="{color:alertcolor}" v-model="kdr.hafez25" :keyup="alertlength()" required class="form-control" id="" placeholder="ادخل حافز الاداء 25%  ">
          <div  >
              <span  v-if="xlength - (kdr.hafez25).length !=xlength " :style="{float:'left',color:alertcolor}">{{ xlength - (kdr.hafez25).length }}</span>
            <span  style="color:red ;float:right" v-if="errors.hafez25">{{errors.hafez25[0]}}</span>
          </div>

    </div>
  </div>

  <div class="form-group row">
    <label  for="inputEmail3" class="d-none d-xs-none d-sm-none d-md-block d-lg-block d-xl-block col-sm-2 col-form-label"> المجموع </label>
    <div class="col-sm-10">
      <input type="text"  :style="{color:alertcolor}" v-model="kdr.all_sum" :keyup="alertlength()" required class="form-control" id="" placeholder="ادخل المجموع  ">
          <div  >
              <span v-if="xlength - (kdr.all_sum).length !=xlength " :style="{float:'left',color:alertcolor}">{{ xlength - (kdr.all_sum).length }}</span>
            <span  style="color:red ;float:right" v-if="errors.all_sum">{{errors.all_sum[0]}}</span>
          </div>

    </div>
  </div>


    <div class="form-group row">
    <label  for="inputEmail3" class="d-none d-xs-none d-sm-none d-md-block d-lg-block d-xl-block col-sm-2 col-form-label"> اساسى2014 </label>
    <div class="col-sm-10">
      <input type="text" :style="{color:alertcolor}"  v-model="kdr.main2014" :keyup="alertlength()" required class="form-control" id="" placeholder="ادخل اساسى 2014  ">
          <div  >
              <span  v-if=" xlength -  (kdr.main2014).length !=xlength " :style="{float:'left',color:alertcolor}">{{ xlength -  (kdr.main2014).length}}</span>
            <span  style="color:red ;float:right" v-if="errors.main2014">{{errors.main2014[0]}}</span>
          </div>

    </div>
  </div>


    <div class="form-group row">
    <label  for="inputEmail3" class="d-none d-xs-none d-sm-none d-md-block d-lg-block d-xl-block col-sm-2 col-form-label">جملة اساسى 2014 </label>
    <div class="col-sm-10">
      <input type="text" :style="{color:alertcolor}" v-model="kdr.all_main2014" :keyup="alertlength()" required class="form-control" id="" placeholder="ادخل الجملة على اساسى 2014  ">
          <div  >
              <span  v-if="xlength - (kdr.all_main2014).length!=xlength " :style="{float:'left',color:alertcolor}">{{ xlength - (kdr.all_main2014).length }}</span>
            <span  style="color:red ;float:right" v-if="errors.all_main2014">{{errors.all_main2014[0]}}</span>
          </div>

    </div>
  </div>


   

 <br> 
  <div class="form-group row ">
    <div class="col-sm-8 text-center">
      <button type="submit"  @click.prevent="savekdr" class="btn btn-success ">اضافة</button>
      <button type="submit"  @click.prevent="editkdr" class="btn btn-info "> تعديل  </button>
      <button type="submit"  @click.prevent="fresh" class="btn btn-primary "> اعادة تعيين </button>
    </div>
  </div>
</form>


</div>


        <hr>


        <table class="table table-striped text-center">
  <thead>
    <tr style="background:skyblue ">
      <th scope="col">م</th>
      <th scope="col">الكادر</th>
      <th scope="col">بدل معلم اول </th>
      <th scope="col">بدل اعتماد ثانى</th>
      <th scope="col">حافز الاداء</th>
      <th scope="col">حافز الاداء 25%</th>
      <th scope="col">المجموع </th>
      <th scope="col">اساسى 2014</th>
      <th scope="col"> الجملة على اساسى 2014 </th>
      <th colspan="2"> اختيارات </th>
      
    </tr>
  </thead>
  <tbody>
    <tr v-for="(kdr,index) in kdrs" :key="index" >
      <th scope="row">{{index+1}}</th>
      <td>{{kdr.name}}</td>
      <td>{{kdr.bdl_m1}}</td>
      <td>{{kdr.bdl_e2}}</td>
      <td>{{kdr.hafez_ada}}</td>
      <td>{{kdr.hafez25}}</td>
      <td>{{kdr.all_sum}}</td>
      <td>{{kdr.main2014}}</td>
      <td>{{kdr.all_main2014}}</td>
      <td> <button @click="setkdr(kdr)"  class="btn btn-info">تعديل</button> </td>
      <td> <button @click="deletekdr(kdr.id)" class="btn btn-danger">حذف</button> </td>
   
    </tr>
   
  </tbody>
</table>



    </div>
</template>

<script>
export default {
    data(){
        return{
            kdr:{
                id:'',
                name:'',
                bdl_m1:'',
                bdl_e2:'',
                hafez_ada:'',
                hafez25:'',
                all_sum:'',
                main2014:'',
                all_main2014:'',
            },
            success:'',
            msg:'',
            errors:'',
            xlength:30,
            alertcolor:'',
            xerror:'',
            kdrs:[],
            
            
        }
        
    },
    methods:{
        savekdr(){
                  axios.post('api/savekdr',this.kdr).then((res)=>{
                      console.log(res.data.data)  
                      if(res.data.status=='errors'){
                          this.errors=res.data.data
                      }else{
                         this.msg='تم الاضافة بنجاج  ';
                         this.success=true;
                          this.kdr.name=''; 
                        // this.$refs.form-kdrs.reset();
                       //  this.$refs.form.resetValidation()

                         this.getkdr();
                         setTimeout(()=>{
                             this.success=false;this.msg='';this.errors=''
                         },4000)
                                                    
                      }         
                 }) 
        },
        
        alertlength(a,val){
         // if(val.length < 50){
            // this.$refs.xx.style.color='red'
         // }
            //this.length=30 - this.kdr.field.length;
            // if(this.length <= 10){
            //         this.alertcolor="red";
            //     if(this.length <= 0){
            //             this.xmsg='اقصى عدد للحروف هو 30 حرف';
            //             this.xerror=true;
            //     }else{this.xerror=false; this.xmsg=''}
            // }else{
            //    this.alertcolor="green";
            // }
        },
        getkdr(){
            axios.get('api/getkdr').then((res)=>{
                this.kdrs=res.data.data;

            })
        },
        setkdr(inf){
          //console.log(inf);
         // console.log(this.kdr)
          this.kdr= inf;
        },
        editkdr(){
                axios.post('api/editkdr',this.kdr).then((res)=>{
                     // console.log(res.data.data)  
                      if(res.data.status=='errors'){
                          this.errors=res.data.data
                      }else{
                         this.msg='تم التعديل بنجاج  ';
                         this.success=true;
                         this.kdr.name='';
                         this.getkdr();
                         setTimeout(()=>{
                             this.success=false;this.msg='';this.errors=''
                         },4000)
                                                    
                      }         
                 }) 
        },
        fresh(){
            this.kdr.id='';
            this.kdr.name='';
            this.getkdr();        
            },
             deletekdr(kdrid){
                     let that=this;
             let answer = window.confirm('هل تريد حذف ؟');
             if(answer){             
                  axios.post('api/deletekdr',{'k_id':kdrid}).then((res)=>{
                        this.msg='تم الحذف بنجاج  ';
                         this.success=true;
                         this.getkdr();
                         setTimeout(()=>{
                             this.success=false;this.msg='';this.errors=''
                         },4000)
                        })
             }   
     },   
    },
 
     created(){
            this.getkdr();
        }

}
</script>
