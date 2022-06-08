<template>
  <div id="home">
    <div class="container text-center">
      <div class="row">
        <div class="col-12 title">
          <h1 class="mt-5">We create Innovative and Tailored Solution</h1>
          <h5 class="mt-3">
            Enterprise Next Generation Solutions for medium and big companies
          </h5>
        </div>
        <div class="col-12 press-release">
          <img
            src="../../../../public/img/millionaire.png"
            alt="logo millionaire"
          />
          <img src="../../../../public/img/fanpage.png" alt="logo fanpage" />
          <img src="../../../../public/img/today.png" alt="logo today" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Home",

  data() {
    return {};
  },
  methods: {},
};
</script>

<style lang="scss" scoped>
#home {
  height: calc(100vh - 56px);
  background-image: url("../../../../public/img/corporate.jpg");
  background-position: center;
  background-size: cover;
  .title {
    margin-top: 200px;
  }
  .press-release {
    margin-top: 100px;
    display: flex;
    justify-content: space-around;
  }
}
</style>
