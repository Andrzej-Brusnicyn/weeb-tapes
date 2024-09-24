<script setup>
const { id } = useRoute().params
const uri = 'http://api.weeb-tapes.de/api/v1/posts/' + id
console.log(uri)
const { data } = await useFetch(uri)
const post = data.value.data
</script>

<template>
{{post.title}}
  <hr>
  <div v-html="post.body"></div>
</template>

<style scoped>

</style>