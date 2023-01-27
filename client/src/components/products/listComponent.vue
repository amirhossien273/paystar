<template>
  <div class="row">
    <div v-for="(item, index) in listProducts" :key="index" class="col-md-6">
        <Box :item="item" />
    </div>
  </div>
</template>
<script setup>
    import Box from "./boxComponent.vue";
</script>
<script>

export default {
    name: 'showproductsList',

    created() {
        this.$store.dispatch('getProducts').then(response => {});
    },
    computed: {listProducts() {return this.$store.state.products.list}},
}
</script>


