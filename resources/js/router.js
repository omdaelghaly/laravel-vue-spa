

import Vue from 'vue'

export function loggedin(){
  return localStorage.getItem('token');   
}

import login from './components/log/Login'


import register from './components/log/Register'
import home from './components/home/Home'
import addnewschool from './components/home/Addnewschool'
import editschool from './components/home/Editschool'
import addemp from './components/salary/Addemp'
import editemp from './components/salary/Editemp'
import salary from './components/salary/Salary'
import dash from './components/admin/Dashboard'



import notfound from './components/nopage/Notfound'

const routes =[
   {path:'/login',component:login,name:'login',
            //  beforeEnter:((to, from, next) => {
            //       if (loggedin){next({ name: 'login' })
            //           }else{next({ name: 'home' })}
            //              })
                    },
  {path:'/register',component:register,name:'register',
            // beforeEnter:((to, from, next) => {
            //       if (loggedin !==null){next({ name: 'register' })
            //              }else{next({ name: 'home' })}
            //               })
                       },
  {path:'/home', component:home ,name:'home'},
  {path:'/addnewschool', component:addnewschool ,name:'addnewschool'},
  {path:'/editschool/:sid', component:editschool ,name:'editschool'},
  {path:'/addemp', component:addemp ,name:'addemp'},
  {path:'/editemp/:eid', component:editemp ,name:'editemp'},
  {path:'/salary', component:salary ,name:'salary'},
  {path:'/dashboard', component:dash ,name:'dash'},

  
  {path:'/:any', component:notfound ,name:'notfount'},
  {path:'/', component:notfound ,name:'notfount1'},


];









  export default routes;