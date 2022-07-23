



<template>
    <div>



   <div class="btn btn-success form-control " v-if="success" > {{msg}}</div>
   <div class="btn btn-danger form-control " v-if="xerror" > {{xmsg}}</div>
<br>  



<div class="container">


<form action="/savestate" >

  <div class="form-group row">
    <label  for="inputEmail3" class="d-none d-xs-none d-sm-none d-md-block d-lg-block d-xl-block col-sm-2 col-form-label"> اسم الحالة</label>
    <div class="col-sm-10">
      <input type="text" :style="{color:alertcolor}" v-model="state.name" :keyup="alertlength()" required class="form-control" id="" placeholder="ادخل اسم الحالة   ">
          <div  >
              <span ref="alertlength" v-if="length !=30 " :style="{float:'left',color:alertcolor}">{{length}}</span>
            <span  style="color:red ;float:right" v-if="errors.name">{{errors.name[0]}}</span>
          </div>

    </div>
  </div>
 
 <br> 
  <div class="form-group row ">
    <div class="col-sm-8 text-center">
      <button type="submit"  @click.prevent="savestate" class="btn btn-success ">اضافة</button>
      <button type="submit"  @click.prevent="editstate" class="btn btn-info "> تعديل  </button>
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
      <th scope="col">اسم الحالة</th>
      <th colspan="2"> اختيارات </th>
      
    </tr>
  </thead>
  <tbody>
    <tr v-for="(state,index) in states" :key="index" >
      <th scope="row">{{index+1}}</th>
      <td>{{state.name}}</td>
      <td> <button @click="setstate(state)"  class="btn btn-info">تعديل</button> </td>
      <td> <button @click="deletestate(state.id)" class="btn btn-danger">حذف</button> </td>
   
    </tr>
   
  </tbody>
</table>



    </div>
</template>

<script>
export default {
    data(){
        return{
            state:{
                id:'',
                name:'',
            },
            success:'',
            msg:'',
            errors:'',
            length:'',
            alertcolor:'',
            xerror:'',
            states:[],
            
        }
        
    },
    methods:{
        savestate(){
                  axios.post('api/savestate',this.state).then((res)=>{
                   //   console.log(res.data.data)  
                      if(res.data.state=='errors'){
                          this.errors=res.data.data
                      }else{
                         this.msg='تم الاضافة بنجاج  ';
                         this.success=true;
                         this.state.name='';
                         this.getstate();
                         setTimeout(()=>{
                             this.success=false;this.msg='';this.errors=''
                         },4000)
                                                    
                      }         
                 }) 
        },
        alertlength(){
            this.length=30 - this.state.name.length;
            if(this.length <= 10){
                    this.alertcolor="red";
                if(this.length <= 0){
                        this.xmsg='اقصى عدد للحروف هو 30 حرف';
                        this.xerror=true;
                }else{this.xerror=false; this.xmsg=''}
            }else{
               this.alertcolor="green";
            }
        },
        getstate(){
            axios.get('api/getstate').then((res)=>{
                this.states=res.data.data;

            })
        },
        setstate(inf){
           this.state = inf;
        },
        editstate(){
                axios.post('api/editstate',this.state).then((res)=>{
                     // console.log(res.data.data)  
                      if(res.data.state=='errors'){
                          this.errors=res.data.data
                      }else{
                         this.msg='تم التعديل بنجاج  ';
                         this.success=true;
                         this.state.name='';
                         this.getstate();
                         setTimeout(()=>{
                             this.success=false;this.msg='';this.errors=''
                         },4000)
                                                    
                      }         
                 }) 
        },
        fresh(){
            this.state.id='';
            this.state.name='';
            this.getstate();        
            },
             deletestate(stateid){
                  let that=this;
             let answer = window.confirm('هل تريد حذف ؟');
             if(answer){             
                  axios.post('api/deletestate',{'s_id':stateid}).then((res)=>{
                        this.msg='تم الحذف بنجاج  ';
                         this.success=true;
                         this.getstate();
                         setTimeout(()=>{
                             this.success=false;this.msg='';this.errors=''
                         },4000)
                       }) 
                }  
     },   
    },
 
     created(){
   this.getstate();
        }

}
</script>