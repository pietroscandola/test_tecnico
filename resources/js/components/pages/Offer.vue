<template>
  <ul
    class="d-flex align-items-center justify-content-center flex-wrap list-unstyled"
  >
    <li v-for="offer in offers" :key="offer.id">
      <div class="card m-3">
        <img src="" class="card-img-top" alt="" />
        <div class="card-body">
          <h5 class="card-title">{{ offer.name }}</h5>
          <p class="card-text">
            <strong>Descrizione</strong><br />
            {{ offer.description }}
          </p>
          <a href="#" class="btn btn-primary">Vedi dettagli</a>
        </div>
      </div>
    </li>
  </ul>
</template>

<script>
export default {
  name: "Offer",
  data() {
    return {
      offers: [],
    };
  },
  methods: {
    getOffers() {
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
          console.log("OK API");
        });
    },
  },
  mounted() {
    this.getOffers();
  },
};
</script>

<style>
.card {
  height: 300px;
  width: 18rem;
}
</style>
