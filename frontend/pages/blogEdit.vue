<script setup lang="ts">
definePageMeta({
  middleware: ["permission"]
})
import MarkdownEditor from '~/components/MarkdownEditor.vue';
</script>

<template>
  <div>
    <MarkdownEditor />
  </div>
</template>

<style scoped>

</style>