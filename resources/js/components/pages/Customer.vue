<template>
  <ul
    class="d-flex align-items-center justify-content-center flex-wrap list-unstyled"
  >
    <li v-for="customer in customers" :key="customer.id">
      <div class="card m-3" style="width: 18rem">
        <img src="" class="card-img-top" alt="" />
        <div class="card-body">
          <h5 class="card-title">{{ customer.name }} {{ customer.surname }}</h5>
          <p class="card-text"><strong>Email</strong> {{ customer.email }}</p>
          <p class="card-text">
            <strong>Tel:</strong> {{ customer.phone_number }}
          </p>
          <a href="#" class="btn btn-primary">Vedi dettagli</a>
        </div>
      </div>
    </li>
  </ul>
</template>

<script>
export default {
  name: "Customer",
  data() {
    return {
      customers: [],
    };
  },
  methods: {
    getCustomers() {
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
          console.log("OK API");
        });
    },
  },
  mounted() {
    this.getCustomers();
  },
};
</script>

<style></style>
