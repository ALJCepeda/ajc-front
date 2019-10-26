import Vue from "vue";
import VueRouter from "vue-router";

import home from "./../pages/home.vue";
import about from "./../pages/about.vue";
import blogsList from "./../pages/blogs/list.vue";
import blogsView from "./../pages/blogs/view.vue";
import notFound from "./../pages/notFound.vue";
import adminPage from "./../pages/admin.vue";

Vue.use(VueRouter);

const isAuthenticated = true;

export default new VueRouter({
  mode: "history",
  routes: [
    { path: "/", redirect: "/home" },
    { path: "/home", component: home },
    { path: "/about", redirect: "/about/overview" },
    { path: "/about/:section", component: about },
    { path: "/blogs", redirect: "/blogs/all" },
    { path: "/blogs/all", component: blogsList },
    { path: "/blogs/:id", component: blogsView },
    {
      path: "/admin",
      redirect: "/admin/timeline",
      beforeEnter: (to, from, next) => {
        if (!isAuthenticated) {
          next("/login");
        } else {
          next();
        }
      }
    },
    {
      path: "/admin/:section",
      component: adminPage,
      beforeEnter: (to, from, next) => {
        if (!isAuthenticated) {
          next("/login");
        } else {
          next();
        }
      }
    },
    { path: "*", component: notFound }
  ]
});
