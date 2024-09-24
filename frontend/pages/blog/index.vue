<script setup>
const { data } = await useFetch('http://api.weeb-tapes.de/api/v1/posts/')
const posts = data.value.data
console.log('data: ', data);
console.log('posts: ', posts);
</script>

<template>
  <h1 class="m-8 text-2xl" >Blog</h1>
  <div class="flex flex-col items-center text-center justify-center px-36 pt-20">

    <div class="self-center" v-for="post in posts" :key="post.id">
      <div class="max-w-[700px] max-h-[975px] min-h-[200px] bg-[#4F44D8] border-8 border-[#A297FF] shadow">
        <div class="p-5">
          <NuxtLink :to="`/blog/${post.id}`">
            <h5 class="card_text text-[#A297FF] mb-2 text-2xl font-bold tracking-tight">{{post.title}}</h5>
          </NuxtLink>
          <p class="card_text text-[#A297FF] mb-3">{{post.body}}</p>
        </div>
      </div>
    </div>

  </div>
</template>

<style scoped>

</style>