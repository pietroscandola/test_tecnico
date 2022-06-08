<template>
  <div id="app">
    <Navbar />
    <router-view></router-view>
  </div>
</template>

<script>
import Navbar from "./Navbar.vue";
export default {
  name: "App",
  components: { Navbar },
  data() {
    return {};
  },
  methods: {},
  mounted() {},
};
</script>

<style lang="scss" scoped></style>
