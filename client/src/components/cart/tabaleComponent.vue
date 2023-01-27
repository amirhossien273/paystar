<template>
  <div style="width: 628px;" class="row">
     <table style="text-align: center;" class="table table-dark">
  <thead>
    <tr>
     <th scope="row">ردیف</th>
     <th scope="row">عکس</th>
     <th scope="row">نام</th>
     <th scope="row">تعداد</th>
     <th scope="row">قیمت</th>
     <th scope="row">قیمت کل</th>
     </tr>
  </thead>
  <tbody>
    <tr v-for="(item, index) in cart.order" :key="index" class="table-active">
        <td scope="row">{{index + 1}}</td>
        <td scope="row">عکس</td>
        <td scope="row">{{item.product.title}}</td>
        <td scope="row">{{item.count}}</td>
        <td scope="row">{{item.product.price}}</td>
        <td scope="row">{{item.product.price * item.count}}</td>
    </tr>
    <tr>
    </tr>
    <tr>
      <td colspan="5" class="table-active">قیمت کل</td>
      <td>{{this.countOrder(cart.order)}}</td>
    </tr>
  </tbody>
</table>

  </div>
</template>
<script>

export default {
    name: 'tableCart',
    props:['cart'],

    methods: {
        countOrder(orders){
            let count = 0;

            if(orders != undefined ){
                orders.map(function(item, index){
                    count += item.product.price * item.count;
                });
            }
            this.$store.commit('ADD_COUNT_ORDER_TO_CART', count);
           return count;
        },
    },
}
</script>


