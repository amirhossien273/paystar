<template>
  <div class="row">
      <Box :cart="cart" />
   
      <form style="display:none" method="post" :action="this.$store.state.payment.payment.url">
         <input  type="hidden" name="token" :value="this.$store.state.payment.payment.token" />
         <button type="submit" ref="submitBtn">Submit</button>
    </form>
  </div>
  <div>
    <button  @click="paymentCart(cart.id)" class="btn btn-success">پرداخت محصول</button>
  </div>
</template>
<script setup>
    import Box from "./tabaleComponent.vue";
</script>
<script>

export default {
    name: 'showCart',

    created() {
        this.$store.dispatch('getCart').then(response => {});
    },

    computed: {cart() {return this.$store.state.cart.cart}},

    methods: {
        paymentCart(id) {
            this.$store.dispatch('connentToPaystar',id).then(response => {
                 this.$refs.submitBtn.click();
            });
        }
    }
}
</script>


