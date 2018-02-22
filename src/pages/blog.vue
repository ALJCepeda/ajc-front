<template>
  <main class='blog border'>
    <header>
      <div class='title'>
        <i class="material-icons">&#xE02F;</i>Blog
      </div>
      <!--
        <div class='row-nw jc-between ai-center' style='margin-top:20px;'>
          <nav class='links'>
              <router-link to='/blog/all' class='active'>All Blogs<span class='count'> 82</span></router-link>
              <router-link to='/blog/general'>General<span class='count'> 82</span></router-link>
              <router-link to='/blog/technology'>Technology<span class='count'> 82</span></router-link>
              <router-link to='/blog/development'>Development<span class='count'> 82</span></router-link>
          </nav>

          <div>
            <input type='text' placeholder='Search for blogs'>
          </div>
        </div>
      -->
      </header>

      <section class='blog-list row-w jc-between'>
        <blog-card v-for='entry in manifest' :key='entry.id' v-bind:data='entry' @click.native='clickedBlog(entry)'></blog-card>
      </section>
  </main>
</template>

<script>
  import { mapState } from 'vuex';
  import blogCard from './../components/blog/blog-card.vue';

  export default {
    name: 'blog',
    components: { blogCard },
    props: [ ],
    computed: mapState([ 'manifest' ]),
    methods: {
      clickedBlog: function(blog) {
        this.$router.push(`/blog/${blog.id}`);
      }
    },
    created() {
      this.$store.dispatch('fetchBlogs');
    }
  };
</script>

<style lang='less' scoped>
  @import './../less/variables.less';
  @import './../less/flex.less';

  .blog-list {
    padding:20px 40px;
  }
</style>
