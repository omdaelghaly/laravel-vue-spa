

<template>
    <div>



   <div class="btn btn-success form-control " v-if="success" > {{msg}}</div>
   <div class="btn btn-danger form-control " v-if="xerror" > {{xmsg}}</div>
<br>  



<div class="container">


<form action="/savedaraga" >

  <div class="form-group row">
    <label  for="inputEmail3" class="d-none d-xs-none d-sm-none d-md-block d-lg-block d-xl-block col-sm-2 col-form-label"> اسم الدرجة</label>
    <div class="col-sm-10">
      <input type="text" :style="{color:alertcolor}" v-model="daraga.name" :keyup="alertlength()" required class="form-control" id="" placeholder="ادخل اسم الدرجة  ">
          <div  >
              <span ref="alertlength" v-if="length !=30 " :style="{float:'left',color:alertcolor}">{{length}}</span>
            <span  style="color:red ;float:right" v-if="errors.name">{{errors.name[0]}}</span>
          </div>

    </div>
  </div>
 
 <br> 
  <div class="form-group row ">
    <div class="col-sm-8 text-center">
      <button type="submit"  @click.prevent="savedaraga" class="btn btn-success ">اضافة</button>
      <button type="submit"  @click.prevent="editdaraga" class="btn btn-info "> تعديل  </button>
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
      <th scope="col">اسم الدرجة</th>
      <th colspan="2"> اختيارات </th>
      
    </tr>
  </thead>
  <tbody>
    <tr v-for="(daraga,index) in daragat" :key="index" >
      <th scope="row">{{index+1}}</th>
      <td>{{daraga.name}}</td>
      <td> <button @click="setdaraga(daraga)"  class="btn btn-info">تعديل</button> </td>
      <td> <button @click="deletedaraga(daraga.id)" class="btn btn-danger">حذف</button> </td>
   
    </tr>
   
  </tbody>
</table>



    </div>
</template>

<script>
export default {
    data(){
        return{
            daraga:{
                id:'',
                name:'',
            },
            success:'',
            msg:'',
            errors:'',
            length:'',
            alertcolor:'',
            xerror:'',
            daragat:[],
            storedaragat:[],
            
        }
        
    },
    methods:{
        savedaraga(){
                  axios.post('api/savedaraga',this.daraga).then((res)=>{
                   //   console.log(res.data.data)  
                      if(res.data.status=='errors'){
                          this.errors=res.data.data
                      }else{
                         this.msg='تم الاضافة بنجاج  ';
                         this.success=true;
                         this.daraga.name='';
                         this.getdaraga();
                         setTimeout(()=>{
                             this.success=false;this.msg='';this.errors=''
                         },4000)
                                                    
                      }         
                 }) 
        },
        alertlength(){
            this.length=30 - this.daraga.name.length;
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
        getdaraga(){
            axios.get('api/getdaraga').then((res)=>{
                this.daragat=res.data.data;
                this.storedaragat=res.data.data;

            })
        },
        setdaraga(inf){
           this.daraga = inf;
        },
        editdaraga(){
                axios.post('api/editdaraga',this.daraga).then((res)=>{
                     // console.log(res.data.data)  
                      if(res.data.status=='errors'){
                          this.errors=res.data.data
                      }else{
                         this.msg='تم التعديل بنجاج  ';
                         this.success=true;
                         this.daraga.name='';
                         this.getdaraga();
                         setTimeout(()=>{
                             this.success=false;this.msg='';this.errors=''
                         },4000)
                                                    
                      }         
                 }) 
        },
        fresh(){
            this.daraga.id='';
            this.daraga.name='';
            this.getdaraga();        
            },
             deletedaraga(daragaid){    
                        let that=this;
             let answer = window.confirm('هل تريد حذف ؟');
             if(answer){             

                  axios.post('api/deletedaraga',{'d_id':daragaid}).then((res)=>{
                        this.msg='تم الحذف بنجاج  ';
                         this.success=true;
                         this.getdaraga();
                         setTimeout(()=>{
                             this.success=false;this.msg='';this.errors=''
                         },4000)
                    })
             }   
     },   
    },
 
     created(){
            this.getdaraga();
        }

}
</script>