<template>
    <div>


<div class="container">

<br>

   <div class="btn btn-success form-control " v-if="success">{{msg}}</div>


 <span class="d-flex justify-content-center bd-highlight "><h3>   تحرير بيانات موظف </h3> </span>

<hr>
<br>

<form action="/addemp" >

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label"> اسم الموظف</label>
    <div class="col-sm-10">
      <input type="text" v-model="emp.name" required class="form-control" id="" placeholder="ادخل اسم الموظف  ">
          <span style="color:red" v-if="errors.name">{{errors.name[0]}}</span>
    </div>
  </div>
  
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label"> مكان العمل </label>
         <div class="col-sm-10">
                  <select class="form-control"   v-model="emp.school_id" >
                    <option disabled>اختر مدرسة</option>
                    <option v-for="school in schools" :key="school.id" :value="school.id"> {{school.name}} </option>
                  
                 </select>    
        </div>
  </div>
   

     <div class="form-group row">
    <label  class="col-sm-2 col-form-label"> الكادر </label>
         <div class="col-sm-10">
                  <select class="form-control"   v-model="emp.kdr_id" >
                    <option disabled>اختر الكادر</option>
                    <option v-for="kdr  in kdrs" :key="kdr.id" :value="kdr.id"> {{kdr.name}} </option>
                  
                 </select>    
        </div>
  </div>
   
     <div class="form-group row">
    <label  class="col-sm-2 col-form-label"> الدرجة </label>
         <div class="col-sm-10">
                  <select class="form-control"   v-model="emp.daraga_id" >
                    <option disabled>اخترالدرجة </option>
                    <option v-for="daraga in daragas" :key="daraga.id" :value="daraga.id"> {{daraga.name}} </option>
                  
                 </select>    
        </div>
  </div>
   
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">  الحالة الاجتماعية</label>
         <div class="col-sm-10">
                  <select class="form-control"   v-model="emp.state_id" >
                    <option disabled>اختر الحالة </option>
                    <option v-for="state in states" :key="state.id" :value="state.id"> {{state.name}} </option>
                  
                 </select>    
        </div>
  </div>
   





   <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label"> الايميل  </label>
    <div class="col-sm-10">
      <input type="email"  v-model="emp.email" class="form-control" id="" placeholder="ادخل ايميل الموظف  ">
                <span style="color:red" v-if="errors.email">{{errors.email[0]}}</span>

    </div>
  </div>

   <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label"> العنوان </label>
    <div class="col-sm-10">
      <input type="text"  v-model="emp.address"  class="form-control" id="" placeholder="ادخل عنوان الموظف  ">
                   <span style="color:red" v-if="errors.address">{{errors.address[0]}}</span>

    </div>
  </div>
 
 
 <br>
  
  
    


  <div class="form-group row ">
    <div class="col-sm-8 text-center ml-1">
      <button type="submit"  @click.prevent="addemp" class="btn btn-success ">اضافة</button>
      <button type="submit"  @click.prevent="updateemp" class="btn btn-info "> تعديل  </button>
      <button type="submit"  @click.prevent="fresh" class="btn btn-primary "> اعادة تعيين </button>
    </div>
  </div>

</form>
</div>


<hr>

  <div class="form-group row">
    <label  class="col-sm-2 col-form-label"> اختر مدرسه للتعديل على موظفيها</label>
         <div class="col-sm-10">
                  <select class="form-control" @change="getemps"  v-model="empschool_id" >
                    <option disabled>اختر مدرسة</option>
                    <option v-for="school in schools" :key="school.id" :value="school.id"> {{school.name}} </option>
                  
                 </select>    
        </div>
  </div>


        <table class="table table-striped text-center">
  <thead>
    <tr style="background:skyblue ">
      <th scope="col">م</th>
      <th scope="col">  اسم الموظف </th>
      <th scope="col">  المدرسة </th>
      <th scope="col"> الكادر  </th>
      <th scope="col">  الدرجة </th>
      <th scope="col">  الحالة </th>
      <th scope="col">  الايميل </th>
      <th colspan="2"> اختيارات </th>
      
    </tr>
  </thead>
  <tbody>
    <tr v-for="(emp,index) in emps" :key="index" >
      <th scope="row">{{index+1}}</th>
      <td>{{emp.name}}</td>
      <td>{{changedata(schools,emp.school_id)}}</td>
      <td>{{changedata(kdrs,emp.kdr_id)}}</td>
      <td>{{changedata(daragas,emp.daraga_id)}}</td>
      <td>{{changedata(states,emp.state_id)}}</td>
      <td>{{emp.email}}</td>
      
      <td> <button @click="setemp(emp)"  class="btn btn-info">تعديل</button> </td>
      <td> <button @click="deleteemp(emp.id)" class="btn btn-danger">حذف</button> </td>
   
    </tr>
   
  </tbody>
</table>






  
    </div>
</template>



<script>
export default {
    data(){
        return{
            emp:{
                id:'',
                name:'',
                school_id:'',
                kdr_id:'',
                daraga_id:'',
                state_id:'',
                email:'',
                address:'',
                
            },
            success:false,
            errors:'',
            sid:'',
            schools:[],
            kdrs:[],
            daragas:[],
            states:[],
            emps:'',
            empschool_id:'',
            msg:''
        }
        
    },
    methods:{
        addemp(e){
                e.preventDefault();
                let that=this;
                axios.post('api/addemp',this.emp).then(res=>{
                 // console.log(res.data)
                  if(res.data.status=='errors'){
                        this.errors=res.data.data;
                        //console.log(res.data.data)
                  }else{
                  this.success=true;
                  this.msg=" تم اضافة موظف بنجاح"
                  this.resetinputs();
                  this.getemps();
                  setTimeout(() => {
                   that.success=false;
                   that.msg='';
                   //that.$router.push('/salary');
                    },5000) };
                });
        },
        resetinputs(){
          this.emp={
              id:'',
                name:'',
                school_id:'',
                kdr_id:'',
                daraga_id:'',
                state_id:'',
                email:'',
                address:'',
          }
       
        },
        setemp(emp){
          this.emp = emp;
        },
        getemps(){
          axios.post('api/getemps',{'empschool_id':this.empschool_id}).then((res)=>{
            this.emps=res.data.data;
          // console.log(res.data.data)
          })
        },
        updateemp(){
                let that=this;
                axios.post('api/updateemp',this.emp).then(res=>{
                 // console.log(res.data)
                  if(res.data.status=='errors'){
                        this.errors=res.data.data;
                       /// console.log(res.data.data)
                  };
                  if(res.data.status=='success'){
                  this.success=true;
                  this.msg=' تم التعديل بنجاح'
                  this.resetinputs();
                  this.getemps();
                  setTimeout(() => {
                   that.success=false;
                   that.msg=''
                   //that.$router.push('/salary');
                    },4000) };
                });
        },
        changedata(obj,val){
          let index=obj.findIndex(o=>o.id===val);
           return obj[index].name;
        },
        fresh(){
              this.resetinputs();
              
        },
        deleteemp(id){
                          let that=this;
             let answer = window.confirm('هل تريد حذف موظف؟');
             if(answer){             
          axios.post('api/deleteemp',{'id':id}).then((res)=>{
                if(res.data.status=='errors'){
                    //console.log(res.data.data)
                  }else{
                  this.success=true;
                  this.msg=" تم الحذف  بنجاح"
                  this.getemps();
                  setTimeout(() => {
                   that.success=false;
                   that.msg='';
                    },5000) };
                    })
             }
        },
    },
     created(){
           window.axios.defaults.headers.common['Authorization'] = `Bearer `+localStorage.getItem('token');
                   axios.get('api/getaddinfo').then(res=>{
                   console.log(res.data.myid)
                   this.schools=res.data.schools;
                   this.kdrs=res.data.kdrs;
                   this.states=res.data.states;
                   this.daragas=res.data.daragas;
                    });

                    
          
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