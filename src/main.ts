import Vue from "vue";

import "./less/index.less";
import "bootstrap/dist/css/bootstrap.min.css";

import store from "./vuex";
import data from "./services/data";
import router from "./router";
import App from "./App.vue";

import registerGlobals from "@/services/functions/registerGlobals";

Vue.config.devtools = true;
Vue.config.productionTip = false;

registerGlobals(Vue);

Promise.all([
  //store.dispatch('blogs/manifest'),
  //store.dispatch('timeline/manifest')
]).then(() => {
  new Vue({
    router,
    store,
    data: function() {
      return { data };
    },
    render: h => h(App)
  }).$mount("#app");
});

/* Home script */
//$('.home-carousel').slick();
