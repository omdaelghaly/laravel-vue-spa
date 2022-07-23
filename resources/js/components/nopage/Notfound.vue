

<template>
    <div>

          <div class="btn-danger text-center">
              <h4> هذه الصفحه غير متوفرة الان ..... سيتم تحولك للرئيسية </h4>
          </div>


    </div>
</template>


<script>
export default {
    data(){
            return{
                loggedin:localStorage.getItem('token')
            }
    },
    created(){
                setTimeout(()=>{
            if(this.loggedin){
                this.$router.push('/home')
            }else{
                this.$router.push('/login')
            }
        },4000)
    }
}
</script>