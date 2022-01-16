<template>
    <div class="orderInfo">
        <div class="container">
            <h2 class="text-center">.سفارش شما با موفقیت ثبت شد</h2>
            <h4 class="text-center">
                {{info.data.orderCode}}
                :کد رهگیری سفارش شما
            </h4>
            <router-link to="/" class="btn btn-success">بازگشت به صفحه اصلی</router-link>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "OrderInfo",
    data() {
        return {
            info: null
        }
    },
    mounted() {
        axios.get('api/getOrder')
            .then(
                res => (this.info = res)
            )
    }
}
</script>

<style scoped>

</style>
