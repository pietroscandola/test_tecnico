import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./components/pages/Home.vue";

const router = new VueRouter({
  mode: "history",
  /*  linkExactActiveClass: "active", */

  routes: [{ path: "/", component: Home, name: "home" }],
});

export default router;
