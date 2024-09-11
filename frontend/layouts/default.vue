<script setup>
import { ref, onMounted, watch } from 'vue';
const isAuthenticated = ref(false);
const isAuthChecked = ref(false);
const checkAuth = () => {
  isAuthenticated.value = !!localStorage.getItem('authToken');
  isAuthChecked.value = true;
};
onMounted(checkAuth);

async function logout() {
  const url = `http://api.weeb-tapes.de/api/logout`;
  const token = localStorage.getItem('authToken')

  const response = await fetch(url, {
    method: 'POST',
    headers: {
      'Authorization': `Bearer ${token}`,
      'Accept': 'application/json',
    },
  });
  localStorage.removeItem('authToken');

  if (response.ok) {
    alert('Logout successful!');
  }
}
</script>

<template>
  <div class="bg-[#D7CEBD]">
  <header class='flex shadow-md py-4 px-4 sm:px-10 bg-[#533222] min-h-[70px] tracking-wide relative z-50'>
    <div class='flex flex-wrap items-center justify-between gap-5 w-full'>
      <div id="collapseMenu"
           class='max-lg:hidden lg:!block max-lg:before:fixed max-lg:before:bg-black max-lg:before:opacity-50 max-lg:before:inset-0 max-lg:before:z-50'>
        <ul
            class='lg:flex gap-x-5 max-lg:space-y-3 max-lg:fixed max-lg:bg-white max-lg:w-1/2 max-lg:min-w-[300px] max-lg:top-0 max-lg:left-0 max-lg:p-6 max-lg:h-full max-lg:shadow-md max-lg:overflow-auto z-50'>
          <li class='max-lg:border-b border-gray-300 max-lg:py-3 px-3'>
            <NuxtLink to="/" class='hover:text-[#007bff] text-[#A09D9C] block font-semibold text-[15px]'>Home</NuxtLink>
          </li>
          <li class='max-lg:border-b border-gray-300 max-lg:py-3 px-3'>
            <NuxtLink to="/products" class='hover:text-[#007bff] text-[#A09D9C] block font-semibold text-[15px]'>Catalog</NuxtLink>
          </li>
          <li class='max-lg:border-b border-gray-300 max-lg:py-3 px-3'>
            <NuxtLink to="/forum" class='hover:text-[#007bff] text-[#A09D9C] block font-semibold text-[15px]'>Forum</NuxtLink>
          </li>
          <li class='max-lg:border-b border-gray-300 max-lg:py-3 px-3'>
            <NuxtLink to="/blog" class='hover:text-[#007bff] text-[#A09D9C] block font-semibold text-[15px]'>Blog</NuxtLink>
          </li>
          <li class='max-lg:border-b border-gray-300 max-lg:py-3 px-3'>
            <NuxtLink to="/about" class='hover:text-[#007bff] text-[#A09D9C] block font-semibold text-[15px]'>About</NuxtLink>
          </li>
          <li class='max-lg:border-b border-gray-300 max-lg:py-3 px-3'>
            <NuxtLink to="/admin" class='hover:text-[#007bff] text-[#A09D9C] block font-semibold text-[15px]'>Admin</NuxtLink>
          </li>
        </ul>
      </div>

      <div v-if="isAuthChecked">
      <div v-if="isAuthenticated" class='flex max-lg:ml-auto space-x-10'>
          <button @click="logout"
              class='card_text flex items-center py-2 px-3 font-medium select-none border-8 border-[#A297FF] text-[#A297FF] bg-[#4F44D8] dark:bg-gray-800 hover:scale-110 transform transition duration-500'>Logout</button>
      </div>

      <div v-else class='flex max-lg:ml-auto space-x-10'>
        <NuxtLink to="/loginform">
        <button
            class='card_text flex items-center py-2 px-3 font-medium select-none border-8 border-[#A297FF] text-[#A297FF] bg-[#4F44D8] dark:bg-gray-800 hover:scale-110 transform transition duration-500'>Login</button>
        </NuxtLink>
        <NuxtLink to="/registrform">
        <button
            class='card_text flex items-center py-2 px-3 font-medium select-none border-8 border-[#A297FF] text-[#A297FF] bg-[#4F44D8] dark:bg-gray-800 hover:scale-110 transform transition duration-500'>Sign
          up</button>
        </NuxtLink>
      </div>
    </div>
    </div>
  </header>
  <section class="mb-20">
    <slot />
  </section>
  <footer class='flex justify-center text-white shadow-md py-4 px-4 sm:px-10 bg-[#533222] min-h-[70px] tracking-wide relative z-50'>
  <p class="text-center">2024, Minsk</p>
  </footer>
  </div>
</template>

<style scoped>
  .router-link-exact-active {
    color: white;
  }
  header{
    font-family: commodoreFlat;
  }
</style>

<!--https://readymadeui.com/tailwind-ecommerce/product-list-->