require("./bootstrap");

window.Vue = require("vue");
axios = require("axios");

import App from "./components/App.vue";
import router from "./routes.js";
import axios from "axios";

const root = new Vue({
  el: "#root",
  router,
  render: (h) => h(App),
});
