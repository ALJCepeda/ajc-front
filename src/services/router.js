import Vue from 'vue';
import VueRouter from 'vue-router';

import timeline from './../pages/timeline.vue';
import about from './../pages/about.vue';
import blogList from './../pages/blogs/list.vue';
import blogView from './../pages/blogs/view.vue';

Vue.use(VueRouter);

export default new VueRouter({
  mode: 'history',
  routes: [
    { path: '/', redirect: '/timeline' },
    { path: '/timeline', component: timeline },
    { path: '/about', redirect: '/about/overview' },
    { path: '/about/:section', component: about },
    { path: '/blog', redirect: '/blog/all' },
    { path: '/blog/:id(\\d+)', component: blogView },
    { path: '/blog/:section', component: blogList }
  ]
});
