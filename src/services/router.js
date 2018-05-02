import Vue from 'vue';
import VueRouter from 'vue-router';

import home from './../pages/home.vue';
import about from './../pages/about.vue';
import blogsList from './../pages/blogs/list.vue';
import blogsView from './../pages/blogs/view.vue';

Vue.use(VueRouter);

export default new VueRouter({
  mode: 'history',
  routes: [
    { path: '/', redirect: '/home' },
    { path: '/home', component: home },
    { path: '/about', redirect: '/about/overview' },
    { path: '/about/:section', component: about },
    { path: '/blogs', redirect: '/blogs/all' },
    { path: '/blogs/:id(\\d+)', component: blogsView },
    { path: '/blogs/:section', component: blogsList }
  ]
});
