import Vue from "vue";
import VueRouter from "vue-router";
import Home from "./Home";
import OrderTracking from "./OrderTracking";
import ProductOrder from "./ProductOrder";
import OrderInfo from "./OrderInfo";

Vue.use(VueRouter);

export const routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/ProductOrder',
        component: ProductOrder
    },
    {
        path:'/orderTracking',
        component: OrderTracking
    },
    {
        path:'/OrderInfo',
        component: OrderInfo
    }
];
