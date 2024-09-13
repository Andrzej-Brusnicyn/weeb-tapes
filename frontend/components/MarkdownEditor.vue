<template>
  <div>
    <textarea ref="textarea" v-model="text" rows="10" cols="50"></textarea>
    <div>
      <button @click="formatText('bold')">Жирный</button>
      <button @click="formatText('italic')">Курсив</button>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const text = ref('');
const textarea = ref(null);

const formatText = (style) => {
  const input = textarea.value;
  const start = input.selectionStart;
  const end = input.selectionEnd;

  if (start === end) {
    return;
  }

  const selected = input.value.slice(start, end);

  if (style === 'bold') {
    input.setRangeText(`<strong>${selected}</strong>`);
  } else if (style === 'italic') {
    input.setRangeText(`<em>${selected}</em>`);
  }

  text.value = input.value;
};
</script>

<style scoped>
textarea {
  width: 100%;
  margin-bottom: 10px;
}
</style>