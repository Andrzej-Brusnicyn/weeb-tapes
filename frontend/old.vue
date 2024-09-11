<template>
  <div>
    <h1>Tapes</h1>
    <div>
      <h2>First Product</h2>
      <p>{{ products[0]?.title }}</p>
      <p>{{ products[0]?.artist }}</p>
      <p>{{ products[0]?.description }}</p>
      <p>Price: {{ products[0]?.price }}</p>
      <p>Stock: {{ products[0]?.stock }}</p>
    </div>
    <ul>
      <li v-for="product in products">
        <h2>{{ product.title }}</h2>
        <p>{{ product.artist }}</p>
        <p>{{ product.description }}</p>
        <p>Price: {{ product.price }}</p>
        <p>Stock: {{ product.stock }}</p>
      </li>
    </ul>
  </div>
</template>

<script setup>
// fetch the products
const { data } = await useFetch('http://api.weeb-tapes.de/api/v1/tapes');
const products = data.value.data;
</script>


