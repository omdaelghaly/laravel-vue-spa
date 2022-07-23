/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


import VueRouter from 'vue-router'
Vue.use(VueRouter)
import store from './store/store'


import mynavbar from './components/inc/Mynavbar'
import sideleft from './components/inc/sideleft'


import routes from './router'
 



const router = new VueRouter({ 
    mode:'history',
    routes ,    
  })



const app = new Vue({
    el: '#app',
    router,
    store,
    components:{
        mynavbar,sideleft
    },
    data(){
        return{

        }
    },


    methods:{
       
       
        
    },
   beforeCreate(){
            let aa= localStorage.getItem('token');  
           // console.log(aa) 
            if(aa==null){
            this.$router.push('/login')
            }
      
                    
  
           }
   
    

});
