<template>
  <section
    class="relative w-full h-[700px] flex flex-col items-center justify-center bg-cover bg-center"
    :style="{ backgroundImage: `url('https://i.ibb.co.com/k6sQZfc0/victor-freitas-Wv-DYd-XDzkhs-unsplash-min.jpg')` }"
  >
    <!-- Dark overlay -->
    <div class="absolute inset-0 bg-gray-900 bg-opacity-50"></div>

    <!-- Content -->
    <div class="relative text-center text-white px-4 space-y-4">
      <!-- Headline (New Title) -->
      <h1 class="text-4xl md:text-6xl font-bold mb-10">Discover Your Next Adventure</h1>

      <!-- Title line -->
      <div class="w-24 h-1 bg-orange-500 mx-auto  my-2 rounded"></div>

      <!-- Buttons -->
      <div class="flex justify-center gap-4 ">
        <button class="bg-orange-500 hover:bg-orange-600 text-black font-semibold px-6 py-3 rounded">
          Get Started
        </button>
        <button class="border border-white hover:bg-white hover:text-black font-semibold px-6 py-3 rounded">
          Learn More
        </button>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "Banner",
};
</script>

<style scoped>
/* Optional: add fade-in animation if desired */
</style>
