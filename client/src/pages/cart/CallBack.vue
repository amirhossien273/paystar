<template>
  <div>
     <div>لطفا چند لحظه صبر کنید...</div> 
  </div>
</template>

<script>

export default {
    name: 'callbackpage',

    methods: {
        checkPage(){
            if(!this.$store.state.auth.isLogin){
              this.$router.push({name: 'login'});
            }
// http://127.0.0.1:5173/call-back?status=1212&order_id=5c00302e-eb07-4cb8-938f-0c57c349d876&ref_num=3466y45&transaction_id=423432&card_number=e988856d-a51b-4d92-ad0e-8661f82e99f1&tracking_code=werdfssdf
            if(!this.$route.query.status || !this.$route.query.order_id || !this.$route.query.ref_num || !this.$route.query.transaction_id){
                this.$router.push({name: 'login'});
            }

            if(this.$route.query.status != 1){
               this.$router.push({name: 'login'});
            }
          let data = {status : this.$route.query.status,
           order_id : this.$route.query.order_id,
           ref_num : this.$route.query.ref_num,
           transaction_id : this.$route.query.transaction_id,
           card_number : this.$route.query.card_number,
           tracking_code : this.$route.query.tracking_code}
           console.log(data);
            this.$store.dispatch('callBack',data).then(response => {
                alert(`خرید شما با موفقیت انجام شد شماره پیگیری شما ${response.transaction_id} می یاشد.`);
                setTimeout(function(){
                    this.$router.push({name: 'login'});
                },1000)
            }).catch(error => {alert('تراکنش شما با خطا مواجه شد')});
        },
    },

    beforeMount(){
      this.checkPage()
    }

}
</script>


