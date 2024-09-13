<script setup lang="ts">
import { ref, computed } from 'vue'


const { data } = await useFetch('http://api.weeb-tapes.de/api/v1/tapes');
const products = data.value.data;
const genreArray = ['OST', 'Pop rock', 'J-pop', 'rock'];
const selectedGenres = ref({});
const searchQuery = ref('');

const pageNumber = ref(0);
const pageSize = 6;

const filteredProducts = computed(() => {
  return products.filter(product => {
    const productGenres = product.genre.split(', ');
    const titleMatch = product.title.toLowerCase().includes(searchQuery.value.toLowerCase());
    return (productGenres.some(genre => selectedGenres.value[genre]) || Object.values(selectedGenres.value).every(genre => !genre)) && titleMatch;
  });
});

const pageCount = computed(() => Math.ceil(filteredProducts.value.length / pageSize));
const paginatedProducts = computed(() => {
  const start = pageNumber.value * pageSize;
  return filteredProducts.value.slice(start, start + pageSize);
});
function nextPage() {
  if (pageNumber.value < pageCount.value - 1) {
    pageNumber.value++;
  }
}
function prevPage() {
  if (pageNumber.value > 0) {
    pageNumber.value--;
  }
}
</script>

<template>
  <div class="bg-[#D7CEBD]">
    <h1 class="mb-8 text-2xl text-center">Catalog</h1>


    <form class="flex items-center max-w-sm mx-auto my-20" @submit.prevent>
      <label for="simple-search" class="sr-only">Search</label>
      <div class="relative w-full">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
          <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2"/>
          </svg>
        </div>
        <input
            type="text"
            id="simple-search"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Search branch name..."
            v-model="searchQuery"
        />
      </div>
    </form>


    <div class="flex justify-center mb-4">
      <div v-for="genre in genreArray" :key="genre" class="mr-4">
        <input type="checkbox" :id="genre" v-model="selectedGenres[genre]" />
        <label :for="genre">{{ genre }}</label>
      </div>
    </div>


    <div class="grid grid-cols-3 gap-60 mx-10">
      <div v-for="product in paginatedProducts" :key="product.id">
        <div class="max-w-[700px] max-h-[975px] min-h-[975px] overflow-y-scroll no-scrollbar bg-[#4F44D8] border-8 border-[#A297FF] shadow">
          <NuxtLink :to="`/products/${product.id}`">
            <img class="border-b-8 border-[#A297FF]" :src="`${product.url}`" alt="" />
          </NuxtLink>
          <div class="p-5">
            <NuxtLink :to="`/products/${product.id}`">
              <h5 class="card_text text-[#A297FF] mb-2 text-2xl font-bold tracking-tight">{{ product.title }}</h5>
            </NuxtLink>
            <p class="card_text text-[#A297FF] mb-3">{{ product.description }}</p>
            <NuxtLink :to="`/products/${product.id}`" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              Read more
              <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
              </svg>
            </NuxtLink>
          </div>
        </div>
      </div>
    </div>


    <div class="flex justify-center mt-4">
      <button :disabled="pageNumber === 0" @click="prevPage" class="mr-4">Previous</button>
      <button :disabled="pageNumber >= pageCount - 1" @click="nextPage">Next</button>
      <div class="ml-4">{{ pageNumber + 1 }} / {{ pageCount }}</div>
    </div>
  </div>
</template>