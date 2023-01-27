<template>
  <div class="greetings">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <form @submit.prevent="handleLogin" class="row g-3">
                    <div class="col-auto">
                        <label  class="visually-hidden">email</label>
                        <input type="text" v-model="user.email" @input="updateUserData" name="email" class="form-control" placeholder="email">
                    </div>
                    <div class="col-auto">
                        <label class="visually-hidden">Password</label>
                        <input type="password" v-model="user.password" @input="updateUserData" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="col-auto">
                        <button   class="btn btn-primary mb-3">login</button>
                    </div>
                </form>
            </div>
        </div>
  </div>
</template>
<script>
export default {
    name: 'Login',

    data() {
        return {
          user: this.$store.state.auth.user
        }
    },

    methods: {
        checkPage(){
             if(this.$store.state.auth.isLogin){
                this.$router.push({name: 'productList'});
             }
        },

        updateUserData(e) {
            this.$store.commit('updateUserData', {[e.target.name]: e.target.value});
        },

        handleLogin() {
            this.loading = true;
            this.$store.dispatch('Login', this.$store.state.auth.user)
                .then( success => {
                    console.log(this.$store.state.auth.isLogin);
                    localStorage.setItem('token', success.token);
                    this.$store.commit('updateISLogin', {isLogin: true});
                    this.$router.push({name: 'productList'});
                    console.log(this.$store.state.auth.isLogin);
                })
                .catch( error => {

                })
                .finally( () => { this.loading = false })
        }
    },

    beforeMount(){
      this.checkPage()
    }
}
</script>
