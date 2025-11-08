import './bootstrap';
import { createApp } from 'vue';
import App from './app.vue';
import router from './router'; // import the router

const app = createApp(App);
app.use(router); // tell Vue to use Vue Router
app.mount('#app'); // make sure this matches your Blade div id


