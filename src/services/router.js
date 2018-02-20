import Vue from 'vue';
import VueRouter from 'vue-router';

import timeline from './../pages/timeline.vue';
import about from './../pages/about.vue';
import blog from './../pages/blog.vue';

Vue.use(VueRouter);

export default new VueRouter({
  mode: 'history',
  routes: [
    { path: '/', redirect: '/timeline' },
    { path: '/timeline', component: timeline },
    { path: '/about', redirect: '/about/overview' },
    { path: '/about/:section', component: about },
    { path: '/blog', redirect: '/blog/all' },
    { path: '/blog/:section', component: blog }
  ]
});
