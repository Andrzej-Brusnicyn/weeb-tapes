<template>
  <div class="bg-[#D7CEBD] flex flex-col justify-center">
    <NuxtLink to="/blogEdit">To blog edit</NuxtLink>

    <form @submit.prevent="saveTape" class="max-w-sm mx-auto">
      <div class="mb-5">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
        <input v-model="title" type="text" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
      </div>
      <div class="mb-5">
        <label for="artist" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Artist</label>
        <input v-model="artist" type="text" id="artist" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
      </div>
      <div class="mb-5">
        <label for="url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Url</label>
        <input v-model="url" type="text" id="url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
      </div>
      <div class="mb-5">
        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
        <input v-model="price" type="number" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
      </div>
      <div class="mb-5">
        <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
        <input v-model="stock" type="number" id="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
      </div>
      <div class="mb-5">
        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
        <textarea v-model="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
      </div>
      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        {{ editingTapeId ? 'Update Tape' : 'Create Tape' }}
      </button>
    </form>

    <h1 class="mb-8 text-2xl" >Admin panel</h1>
    <div class="flex justify-center">
      <div class="grid grid-cols-3 gap-60 mx-10">
        <div v-for="product in products">
          <div class="max-w-[700px] max-h-[975px] min-h-[975px] overflow-y-scroll no-scrollbar bg-[#4F44D8] border-8 border-[#A297FF] shadow">
            <NuxtLink :to="`/products/${product.id}`">
              <img class="border-b-8 border-[#A297FF]" :src="`${product.url}`" alt="" />
            </NuxtLink>
            <div class="p-5">
              <NuxtLink :to="`/products/${product.id}`">
                <h5 class="card_text text-[#A297FF] mb-2 text-2xl font-bold tracking-tight">{{product.title}}</h5>
              </NuxtLink>
              <p class="card_text text-[#A297FF] mb-3">{{product.description}}</p>
              <NuxtLink :to="`/products/${product.id}`" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
              </NuxtLink>
              <div>
                <button @click="editTape(product)" class="bg-yellow-600 p-5 text-black">edit</button>
                <button @click="deleteTape(product.id)" class="bg-red-600 p-5 text-black">delete</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script setup>
definePageMeta({
  middleware: ["permission"]
})
import { ref } from 'vue';

const title = ref('');
const artist = ref('');
const url = ref('');
const description = ref('');
const price = ref('');
const stock = ref('');
const editingTapeId = ref(null);


async function saveTape() {
  const tapeData = {
    title: title.value,
    artist: artist.value,
    url: url.value,
    description: description.value,
    price: price.value,
    stock: stock.value,
  };
  const token = localStorage.getItem('authToken')

  console.log('NewDataObject:', tapeData);

  let response;

  if (editingTapeId.value) {
    response = await fetch(`http://api.weeb-tapes.de/api/v1/tapes/${editingTapeId.value}`, {
      method: 'PUT',
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${token}`,
      },
      body: JSON.stringify(tapeData),
    });
  } else {
    response = await fetch('http://api.weeb-tapes.de/api/v1/tapes', {
      method: 'POST',
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${token}`,
      },
      body: JSON.stringify(tapeData),
    });
  }

    await fetchTapes();
    resetForm();
    alert('Tape created!');

}

const products = ref([]);
async function fetchTapes() {
  const response = await fetch('http://api.weeb-tapes.de/api/v1/tapes');
    const data = await response.json();
    products.value = data.data;
}

function editTape(tape) {
  editingTapeId.value = tape.id;
  title.value = tape.title;
  artist.value = tape.artist;
  url.value = tape.url;
  description.value = tape.description;
  price.value = tape.price;
  stock.value = tape.stock;
}

async function deleteTape(productId) {
  const url = `http://api.weeb-tapes.de/api/v1/tapes/${productId}`;
  console.log(`deleting: ${url}`);

  const token = localStorage.getItem('authToken')

  const response = await fetch(url, {
    method: 'DELETE',
    headers: {
      'Authorization': `Bearer ${token}`,
    },
  });

  if (response.ok) {
    await fetchTapes();
    alert('Delete successful!');
  }
}

function resetForm() {
  editingTapeId.value = null;
  title.value = '';
  artist.value = '';
  url.value = '';
  description.value = '';
  price.value = '';
  stock.value = '';
}

fetchTapes();
</script>

<style scoped>
.card_text{
  font-family: commodoreFlat;
}
.no-scrollbar::-webkit-scrollbar {
  display: none;
}
</style>
