<template>
  <div id="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="visually-hidden"></span>
    </div>
  </div>
</template>

<script>
export default {
  name: "Loader",
};
</script>

<style lang="scss" scoped>
#loader {
  position: fixed;
  top: 0;
  right: 0;
  left: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, 0.6);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1;
  .spinner-border {
    width: 150px;
    height: 150px;
  }
}
</style>
