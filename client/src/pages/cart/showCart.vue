<template>
  <div>
     <Cart />
  </div>
</template>
<script setup>
    import Cart from "../../components/cart/cartComponent.vue";
</script>
<script>

export default {
    name: 'showCartPage',

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


