<script setup>
import { ref } from 'vue';

const cartItems = ref([]);
const error = ref(null);

async function getCart() {
  const token = localStorage.getItem('authToken');
  const response = await fetch('http://api.weeb-tapes.de/api/cart', {
    method: 'GET',
    headers: {
      'Authorization': `Bearer ${token}`,
      'Accept': 'application/json',
    },
  });

  const data = await response.json();

  cartItems.value = data.cart_items;
}

async function removeItem(itemId) {
  const token = localStorage.getItem('authToken');

  const response = await fetch('http://api.weeb-tapes.de/api/cart/remove', {
    method: 'DELETE',
    headers: {
      'Authorization': `Bearer ${token}`,
      'Content-Type': 'application/json',
      'Accept': 'application/json',
    },
    body: JSON.stringify({
      tape_id: itemId,
    }),
  });

  if (response.ok) {
    getCart();
  } else {
    console.error('error');
  }
}

getCart();
</script>

<template>
  <div>
    <h1>Your Cart</h1>
    <div v-if="cartItems.length > 0">
      <div v-for="item in cartItems" :key="item.id">
        <h3>{{ item.tape.title || 'Unknown product' }}</h3>
        <p>Quantity: {{ item.quantity }}</p>
        <p>Price: {{ item.tape.price || 'Unknown price' }}</p>
        <p>Sum: {{ item.tape.price * item.quantity || 'Unknown sum' }}</p>

        <button @click="removeItem(item.tape.id)" class="bg-red-500 text-white px-4 py-2 mt-2 rounded">Remove</button>
      </div>
    </div>
    <div v-else>
      <p>Your cart is empty</p>
    </div>
  </div>
</template>
<style scoped>

</style>