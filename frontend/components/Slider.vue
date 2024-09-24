<template>
  <div class="flex justify-center w-screen">
    <div class="carousel w-[2320px] overflow-hidden" @wheel="handleWheel">
      <div class="inner whitespace-nowrap transition-transform duration-700" ref="inner" :style="innerStyles">
        <div class="card w-[240px] inline-flex bg-[#4F44D8] font-bold text-white border-8 border-b-8 border-r-4 border-l-4 border-[#A297FF] mr-5" v-for="card in cards">
          <NuxtLink class="p-5" :to="`/products/${card.id}`">
            <div class="card_text flex flex-col text-center text-[#A297FF]">
              {{ card.title }}
              <img class="block object-center w-48 h-48" :src="`${card.url}`" alt="">
            </div>
          </NuxtLink>
        </div>
      </div>
    </div>
  </div>
  <div class="flex justify-center gap-20">
    <button class="card_text flex items-center py-2 px-3 font-medium select-none border-8 border-[#A297FF] text-[#A297FF] bg-[#4F44D8] dark:bg-gray-800 hover:scale-110 transform transition duration-500 mt-5" @click="prev">⪻ prev</button>
    <button class="card_text flex items-center py-2 px-3 font-medium select-none border-8 border-[#A297FF] text-[#A297FF] bg-[#4F44D8] dark:bg-gray-800 hover:scale-110 transform transition duration-500 mt-5" @click="next">next ⪼</button>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'

const { data } = await useFetch('http://api.weeb-tapes.de/api/v1/alltapes')
const products = data.value.data

const cards = ref(products.slice(0, 11))
const innerStyles = ref({})
const step = ref('')
const transitioning = ref(false)
const inner = ref(null)

function setStep() {
  step.value = inner.value.scrollWidth / cards.value.length + 'px'
}

function next() {
  if (transitioning.value) return
  transitioning.value = true

  moveLeft()
  afterTransition(() => {
    const card = cards.value.shift()
    cards.value.push(card)
    resetTranslate()
    transitioning.value = false
  })
}

function prev() {
  if (transitioning.value) return
  transitioning.value = true

  moveRight()
  afterTransition(() => {
    const card = cards.value.pop()
    cards.value.unshift(card)
    resetTranslate()
    transitioning.value = false
  })
}

function moveLeft() {
  innerStyles.value = {
    transform: `translateX(-${step.value})
                translateX(-${step.value})`
  }
}

function moveRight() {
  innerStyles.value = {
    transform: `translateX(${step.value})
                translateX(-${step.value})`
  }
}

function afterTransition(callback) {
  const listener = () => {
    callback()
    inner.value.removeEventListener('transitionend', listener)
  }
  inner.value.addEventListener('transitionend', listener)
}

function resetTranslate() {
  innerStyles.value = {
    transition: 'none',
    transform: `translateX(-${step.value})`
  }
}

function handleWheel(event) {
  event.preventDefault()
  if (event.deltaY > 0) {
    next()
  } else {
    prev()
  }
}

onMounted(() => {
  setStep()
  resetTranslate()
})
</script>

<style scoped>
.card_text{
  font-family: commodoreFlat;
}


</style>

<!--https://github.com/luveqz/vue-3-carousel-tutorial/tree/composition-api?tab=readme-ov-file-->