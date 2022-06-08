import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./components/pages/Home.vue";
import Customer from "./components/pages/Customer.vue";
import Offer from "./components/pages/Offer.vue";

const router = new VueRouter({
  mode: "history",
  linkExactActiveClass: "active",

  routes: [
    { path: "/", component: Home, name: "home" },
    { path: "/clienti", component: Customer, name: "customer" },
    { path: "/offerte", component: Offer, name: "offer" },
  ],
});

export default router;
