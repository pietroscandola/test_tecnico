<template>
  <div id="customer">
    <Loader v-if="isLoading" />
    <ul
      class="d-flex align-items-center justify-content-center flex-wrap list-unstyled"
    >
      <li v-for="customer in customers" :key="customer.id">
        <div class="card m-3" style="width: 18rem">
          <div
            class="card-body d-flex flex-column justify-content-center align-items-center"
          >
            <h5 class="card-title">
              {{ customer.name }} {{ customer.surname }}
            </h5>
            <p class="card-text"><strong>Email</strong> {{ customer.email }}</p>
            <p class="card-text">
              <strong>Tel:</strong> {{ customer.phone_number }}
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
  name: "Customer",
  components: { Loader },
  data() {
    return {
      customers: [],
      isLoading: false,
    };
  },
  methods: {
    getCustomers() {
      this.isLoading = true;
      axios
        .get("http://localhost:8000/api/customers")
        .then((res) => {
          console.log(res.data);
          this.customers = res.data;
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
    this.getCustomers();
  },
};
</script>

<style lang="scss" scoped>
#customer {
  height: calc(100vh - 56px);
  background-image: url("../../../../public/img/corporate.jpg");
  background-position: center;
  background-size: cover;

  .card {
    height: 200px !important;
  }
}
</style>
