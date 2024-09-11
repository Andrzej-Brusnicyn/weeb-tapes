<template>
  <div>
    <h1>Tapes</h1>
    <ul>
      <li v-for="product in products" :key="product.id">
        <h2>{{ product.title }}</h2>
        <p>{{ product.artist }}</p>
        <p>{{ product.description }}</p>
        <p>Price: {{ product.price }}</p>
        <p>Stock: {{ product.stock }}</p>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      products: []
    };
  },
  created() {
    this.fetchProducts();
  },
  methods: {
    fetchProducts() {
      fetch('http://api.weeb-tapes.de/api/v1/tapes')
          .then(response => response.json())
          .then(data => {
            this.products = data.data;
          })
          .catch(error => {
            console.error('Error fetching products:', error);
          });
    }
  }
}
</script>