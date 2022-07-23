

import Vue from "vue"
import Vuex from "vuex"

Vue.use(Vuex);

const store = new Vuex.Store({
       state:{
           user:'',
           rooms:'',
           oldroom:''
         },
       mutations: {
        setauth(state, user) {
            state.user = user;
        },
        setrooms(state,rooms){
            state.rooms=rooms;
        },
        setoldroom(state,room){
            state.oldroom= room;
        }
    },
       getters:{
        user:function(state){
            return state.user;
        },
        oldroom:function(state){
            return state.oldroom;
        }

       }

});


export default store;