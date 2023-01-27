<template>
  <div>
    <div class="card" style="width: 18rem;">
        <img :src="item.image" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{item.title}}</h5>
            <p class="card-text">{{item.discription}}</p>
            <p class="card-text">{{item.price}}</p>
            <button  class="btn btn-primary">add cart</button>
        </div>
    </div>
  </div>
</template>

<script>

export default {
    props:['item'] ,
    name: 'boxProductsList',

}
</script>


