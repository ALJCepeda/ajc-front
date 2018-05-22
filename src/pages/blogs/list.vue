<template>
  <main class='blogs-list border'>
    <header class='title'>
      <div class='content'>
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

      <section class='list row-w jc-between'>
        <blog-card v-for='entry in entries' :key='entry.id' v-bind:data='entry' @click.native='clickedBlog(entry)'></blog-card>
      </section>
  </main>
</template>

<script>
  import { mapState } from 'vuex';
  import blogCard from './../../components/blogs/card.vue';

  export default {
    name: 'blogs-list',
    components: { blogCard },
    props: [ ],
    computed: {
      entries() {
        return this.$store.getters['blogs/entriesByPage'](this.page);
      }
    },
    methods: {
      clickedBlog(blog) {
        this.$router.push(`/blogs/${blog.id}`);
      },
      fetchEntries() {
        this.fetchingEntries = true;
        this.$store.dispatch('blogs/entriesByPage', this.page).then(() => {
          this.fetchingEntries = false
        });
      }
    },
    data() {
      return {
        page:0,
        fetchingEntries:false
      }
    },
    created() {
      this.fetchEntries();
    }
  };
</script>

<style lang='less' scoped>
  @import './../../less/variables.less';
  @import '~ajc-toolbelt/less/flex.less';

  .blogs-list {
    .list {
      padding:20px 40px;

      .upToTablet({
        padding:20px 0px;
      });
    }
  }
</style>
