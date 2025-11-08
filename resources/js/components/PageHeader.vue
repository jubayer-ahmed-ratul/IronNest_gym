<template>
  <header class="fixed top-0 left-0 w-full z-50">
    <!-- Inner container -->
    <div
      :class="[
        'w-full px-4 py-3 navbar flex items-center justify-between transition-all duration-500 ease-in-out',
        scrolled
          ? 'bg-white shadow-md max-w-[1400px] mx-auto rounded-md scale-100 opacity-100'
          : 'bg-transparent scale-100 opacity-100'
      ]"
    >
      <!-- Navbar Start -->
      <div class="navbar-start flex items-center gap-6">
        <!-- Mobile dropdown button -->
        <div class="dropdown">
          <label tabindex="0" class="btn btn-ghost lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
            </svg>
          </label>
          <ul
            tabindex="0"
            class="menu menu-sm dropdown-content rounded-box mt-2 w-52 p-0 shadow-lg"
          >
            <li><router-link :class="scrolled ? 'text-black text-lg' : 'text-white text-lg'" to="/" class="block px-4 py-2">Home</router-link></li>
            <li><router-link :class="scrolled ? 'text-black text-lg' : 'text-white text-lg'" to="/about" class="block px-4 py-2">About</router-link></li>
            <li><router-link :class="scrolled ? 'text-black text-lg' : 'text-white text-lg'" to="/contact" class="block px-4 py-2">Contact</router-link></li>
          </ul>
        </div>

        <router-link :class="['normal-case text-3xl font-bold', scrolled ? 'text-black' : 'text-white']" to="/">
          Iron<span class="text-[#ed563b]">Nest</span>
        </router-link>
      </div>

      <!-- Navbar Center (Desktop Menu) -->
      <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal m-0 p-0">
          <li>
            <router-link
              :class="[
                scrolled ? 'text-black text-lg px-6 py-3' : 'text-white text-lg px-6 py-3',
                'font-semibold transition-colors duration-300'
              ]"
              to="/"
            >
              Home
            </router-link>
          </li>
          <li>
            <router-link
              :class="[
                scrolled ? 'text-black text-lg px-6 py-3' : 'text-white text-lg px-6 py-3',
                'font-semibold transition-colors duration-300'
              ]"
              to="/about"
            >
              About
            </router-link>
          </li>
          <li>
            <router-link
              :class="[
                scrolled ? 'text-black text-lg px-6 py-3' : 'text-white text-lg px-6 py-3',
                'font-semibold transition-colors duration-300'
              ]"
              to="/contact"
            >
              Contact
            </router-link>
          </li>
        </ul>
      </div>

      <!-- Navbar End -->
      <div class="navbar-end">
        <button
          :class="[
            'px-5 py-3 rounded-[5px] font-bold shadow-md transition-colors duration-500',
            scrolled ? 'bg-gradient-to-r from-[#ed563b] to-[#ff8a65] text-white' : 'bg-white text-black'
          ]"
          @click="goToDashboard"
        >
          Dashboard
        </button>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  name: "PageHeader",
  data() {
    return {
      scrolled: false,
    };
  },
  methods: {
    goToDashboard() {
      window.location.href = "http://127.0.0.1:8000/admin";
    },
    handleScroll() {
      this.scrolled = window.scrollY > 50;
    },
  },
  mounted() {
    window.addEventListener("scroll", this.handleScroll);
  },
  beforeUnmount() {
    window.removeEventListener("scroll", this.handleScroll);
  },
};
</script>

<style scoped>
.menu li a:hover {
  background-color: rgba(255, 255, 255, 0.2);
  color: white;
}
</style>
