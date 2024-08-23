import Vue from "vue";
import App from "../App.vue"; // Adjust path based on your directory structure

Vue.config.productionTip = false;

new Vue({
  render: (h) => h(App),
}).$mount("#app");
