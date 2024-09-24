<template>
  <div>
    <input v-model="title" type="text" placeholder="Title" />

    <textarea ref="textarea" v-model="text" rows="10" cols="50" placeholder="Body"></textarea>

    <div>
      <button @click="formatText('bold')">Жирный</button>
      <button @click="formatText('italic')">Курсив</button>
      <button @click="formatText('underline')">Подчёркнутый</button>
      <button @click="formatText('h1')">Заголовок 1</button>
      <button @click="formatText('h2')">Заголовок 2</button>
    </div>

    <button @click="submitPost">Submit</button>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const title = ref('');
const text = ref('');
const textarea = ref(null);

function formatText(style) {
  const input = textarea.value;
  const start = input.selectionStart;
  const end = input.selectionEnd;

  if (start === end) {
    return;
  }

  const selected = input.value.slice(start, end);

  switch (style) {
    case 'bold':
      input.setRangeText(`<strong>${selected}</strong>`);
      break;
    case 'italic':
      input.setRangeText(`<em>${selected}</em>`);
      break;
    case 'underline':
      input.setRangeText(`<u>${selected}</u>`);
      break;
    case 'h1':
      input.setRangeText(`<h1>${selected}</h1>`);
      break;
    case 'h2':
      input.setRangeText(`<h2>${selected}</h2>`);
      break;
  }

  text.value = input.value;
};

const submitPost = async () => {
  const token = localStorage.getItem('authToken');

  const response = await fetch('http://api.weeb-tapes.de/api/v1/posts', {
    method: 'POST',
    headers: {
      'Authorization': `Bearer ${token}`,
      'Content-Type': 'application/json',
      'Accept': 'application/json',
    },
    body: JSON.stringify({
      title: title.value,
      body: text.value,
    }),
  });

  if (response.ok) {
    alert('Post successfully created');
  }
};
</script>

<style scoped>
textarea {
  width: 100%;
  margin-bottom: 10px;
}
input {
  width: 100%;
  margin-bottom: 10px;
  padding: 8px;
}
button {
  margin: 5px;
  padding: 8px 12px;
}
</style>