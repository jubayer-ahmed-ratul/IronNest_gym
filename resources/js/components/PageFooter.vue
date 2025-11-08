<template>
  <footer class=" bottom-0 left-0 w-full bg-gray-800 text-white p-4 text-center">
    <p class="text-sm">&copy; {{ new Date().getFullYear() }} My Laravel + Vue App. All rights reserved.</p>
  </footer>
</template>

<script>
export default {
  name: 'PageFooter',
};
</script>

<style scoped>
/* Optional: shadow on top of footer */
footer {
  box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
}
</style>
