<script setup>
import { ref, computed } from 'vue';

const sortBy = ref('updated_at');
const sortDirection = ref('desc');
const genreArray = ['OST', 'Pop rock', 'J-pop', 'rock'];
const selectedGenres = ref([]);
const searchQuery = ref('');
const page = ref(1);

watch(selectedGenres, () => {
  page.value = 1;
});

watch([sortBy, sortDirection], () => {
  page.value = 1;
  refresh();
});

const filterParams = computed(() => ({
  genre: selectedGenres.value.join(',') || null,
  search: searchQuery.value || null,
  page: page.value,
  sort_by: sortBy.value,
  sort_direction: sortDirection.value,
}));

const { data, refresh } = await useFetch('http://api.weeb-tapes.de/api/v1/tapes', {
  params: filterParams,
});

const products = computed(() => data.value?.data || []);

function incrementPage() {
  page.value += 1;
  refresh();
}

function decrementPage() {
  page.value -= 1;
  refresh();
}

const currentPage = computed(() => data.value.meta.current_page);

const isFirstPage = computed(() => data.value.meta.current_page === 1);
const isLastPage = computed(() => data.value.meta.current_page === data.value.meta.last_page);


</script>

<template>
  <div class="bg-[#D7CEBD]">
    <h1 class="mb-8 text-2xl text-center">Catalog</h1>

    <div class="flex justify-center my-20 gap-x-8">
    <form @submit.prevent>
      <label for="simple-search" class="sr-only">Search</label>
      <div class="relative w-full">
        <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Search title name..." v-model="searchQuery" required />
      </div>
    </form>

      <div class="self-center">
        <select v-model="sortBy">
          <option value="title">Title</option>
          <option value="updated_at">Date</option>
        </select>

        <select v-model="sortDirection">
          <option value="asc">Ascending</option>
          <option value="desc">Descending</option>
        </select>
      </div>

    </div>

    <div class="flex justify-between">

      <div class="ml-16">
            <ul class="w-48 text-sm font-medium text-gray-900 bg-[#533222] border border-gray-200 rounded-lg">
            <li  v-for="genre in genreArray" :key="genre" class="w-full border-b border-gray-200 rounded-t-lg">
              <div class="flex items-center ps-3">
              <input type="checkbox" :id="genre" :value="genre" v-model="selectedGenres" class="w-4 h-4 text-blue-600 bg-[#533222] border-gray-300 rounded focus:ring-blue-500 focus:ring-2" />
              <label :for="genre" class="w-full py-3 ms-2 text-sm font-medium text-white">{{ genre }}</label>
              </div>
            </li>
            </ul>
      </div>

      <div class="">

      <div class="grid grid-cols-4 gap-20 mx-16">
        <div v-for="product in products" :key="product.id">
          <div class="max-w-[700px] max-h-[975px] min-h-[975px] overflow-y-scroll no-scrollbar bg-[#4F44D8] border-8 border-[#A297FF] shadow">
            <NuxtLink :to="`/products/${product.id}`">
              <img class="border-b-8 border-[#A297FF]" :src="`${product.url}`" alt="" />
            </NuxtLink>
            <div class="p-5">
              <NuxtLink :to="`/products/${product.id}`">
                <h5 class="card_text text-[#A297FF] mb-2 text-2xl font-bold tracking-tight">{{product.title}}</h5>
              </NuxtLink>
              <p class="card_text text-[#A297FF] mb-3">{{product.description}}</p>
              <NuxtLink :to="`/products/${product.id}`" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                Read more
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
              </NuxtLink>
            </div>
          </div>
        </div>

      </div>
      </div>
    </div>
  </div>

  <div class="flex justify-center gap-20">
    <button class="card_text flex items-center py-2 px-3 font-medium select-none border-8 border-[#A297FF] text-[#A297FF] bg-[#4F44D8] dark:bg-gray-800 hover:scale-110 transform transition duration-500 mt-5" @click="decrementPage" v-if="!isFirstPage">
      prev
    </button>
    <span class="card_text flex items-center py-2 px-3 font-medium select-none border-8 border-[#A297FF] text-[#A297FF] bg-[#4F44D8] mt-5">Page: {{currentPage}} </span>
    <button class="card_text flex items-center py-2 px-3 font-medium select-none border-8 border-[#A297FF] text-[#A297FF] bg-[#4F44D8] dark:bg-gray-800 hover:scale-110 transform transition duration-500 mt-5" @click="incrementPage" v-if="!isLastPage">
      next
    </button>
  </div>

</template>

<style scoped>
.card_text{
  font-family: commodoreFlat;
}
.no-scrollbar::-webkit-scrollbar {
  display: none;
}
</style>

