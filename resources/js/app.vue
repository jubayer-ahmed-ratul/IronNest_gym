<template>
  <div class="" id="app">
    <PageHeader />
    <main class=" min-h-screen ">
      <router-view />
    </main>
    <PageFooter />
  </div>
</template>

<script>
import PageHeader from './components/PageHeader.vue';
import PageFooter from './components/PageFooter.vue';

export default {
  name: 'App',
  components: {
    PageHeader,
    PageFooter,
  },
};
</script>

<style>

</style>
