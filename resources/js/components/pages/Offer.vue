<template>
  <div id="offer">
    <Loader v-if="isLoading" />
    <ul
      class="container d-flex align-items-center justify-content-center flex-wrap list-unstyled"
    >
      <li v-for="offer in offers" :key="offer.id">
        <div class="card m-3">
          <img src="" class="card-img-top" alt="" />
          <div class="card-body">
            <h5 class="card-title">
              <strong>Nome Offerta: </strong>{{ offer.name }}
            </h5>
            <p class="card-text">
              <strong>Descrizione</strong><br />
              {{ offer.description }}
            </p>
          </div>
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
import Loader from "../Loader.vue";
export default {
  name: "Offer",
  components: { Loader },
  data() {
    return {
      offers: [],
      isLoading: false,
    };
  },
  methods: {
    getOffers() {
      this.isLoading = true;
      axios
        .get("http://localhost:8000/api/offers")
        .then((res) => {
          console.log(res.data);
          this.offers = res.data;
        })
        .catch((err) => {
          console.error(err);
        })
        .then(() => {
          this.isLoading = false;
          console.log("OK API");
        });
    },
  },
  mounted() {
    this.getOffers();
  },
};
</script>

<style lang="scss" scoped>
#offer {
  height: calc(100vh - 56px);
  background-image: url("../../../../public/img/corporate.jpg");
  background-position: center;
  background-size: cover;
  .card {
    height: 250px;
    width: 18rem;
  }
}
</style>
