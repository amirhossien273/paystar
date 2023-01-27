<template>
  <div>
    <List />
  </div>
</template>
<script setup>
    import List from '../../components/products/listComponent.vue'
</script>
<script>

export default {
    name: 'productsList',

    methods: {
        checkPage(){
            if(!this.$store.state.auth.isLogin){
               this.$router.push({name: 'login'});
            }
        },
    },

    beforeMount(){
      this.checkPage()
    }

}
</script>


