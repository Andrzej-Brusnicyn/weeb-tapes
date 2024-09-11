
<template>
  <div class="flex flex-col justify-center bg-[#D7CEBD]">
    <div class="bg-cover bg-no-repeat w-full"
         style="background-image: url('https://www.zastavki.com/pictures/originals/2015/Creative_Wallpaper_Film_music_cassettes_093627_.jpg');">
      <h1 class="py-10 font-black text-8xl md:text-9xl bg-[#D7CEBD] mix-blend-lighten uppercase text-center opacity-90">
        Weeb <br>
        Tapes <br>
        Shop
      </h1>
    </div>
    <div class="overflow-hidden bg-[#D7CEBD] shadow-sm p-4">
      <div class="marquee-content flex gap-10 items-center animate-marquee">
        <img src="https://images.vexels.com/content/270787/preview/rainbow-cassette-icon-ae1762.png" alt="">
        <img src="https://images.vexels.com/content/270787/preview/rainbow-cassette-icon-ae1762.png" alt="">
        <img src="https://images.vexels.com/content/270787/preview/rainbow-cassette-icon-ae1762.png" alt="">
        <img src="https://images.vexels.com/content/270787/preview/rainbow-cassette-icon-ae1762.png" alt="">
        <img src="https://images.vexels.com/content/270787/preview/rainbow-cassette-icon-ae1762.png" alt="">
      </div>
    </div>
    <h3 class="font-commodore font-bold my-8 text-5xl text-center">Immerse yourself in the world of retro sound with Weeb Tapes Shop — bring back the magic of analog audio</h3>
    <h4 class="font-commodore my-8 text-3xl text-center">Anime soundtracks, J-pop, and J-rock on cassette tapes for true audiophiles and retro enthusiasts</h4>
    <div class="flex justify-center gap-x-60 my-20">
    <NuxtLink to="/about"><p class="font-commodore text-center text-xl">Learn More</p></NuxtLink>
    <NuxtLink to="/products"><p class="font-commodore text-center text-xl">Shop Now</p></NuxtLink>
    </div>
    <h5 class="font-commodore ml-32 mb-5 text-xl">New Arrivals:</h5>
    <Slider />
    </div>
</template>

<script setup>
import Slider from '~/components/Slider.vue';
</script>

<style scoped>
h1{
  text-shadow:
      -1px -1px 0 black,
      1px -1px 0 black,
      -1px 1px 0 black,
      1px 1px 0 black;
}
.font-commodore{
  font-family: commodore;
}

</style>
