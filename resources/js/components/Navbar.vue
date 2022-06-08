<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid d-flex justify-content-between">
        <ul class="navbar-nav">
          <li>
            <router-link class="navbar-brand" to="/">
              <img src="../../../public/img/prodigy.png" alt="logo" />
            </router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'customer' }">
              Clienti</router-link
            >
          </li>
          <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'offer' }"
              >Offerte</router-link
            >
          </li>
        </ul>

        <div id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/login">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/register">Register</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  name: "Navbar",
};
</script>

<style></style>
