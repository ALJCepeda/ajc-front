<template>
  <main class='blog border'>
    <div class='top-bar'>
      <span>Back</span>
    </div>

    <div v-html='html'></div>
  </main>
</template>

<script>
  import { mapState, mapGetters } from 'vuex';

  export default {
    name: 'blogView',
    computed: Object.assign({
        html() {
          return this.$store.state.blogs[this.$route.params.id];
        }
      },
      mapGetters([ 'getBlogById' ]),
      mapState([ 'blogs' ])
    ),
    created() {
      this.$store.dispatch('fetchBlog', this.$route.params.id);
    }
  };
</script>

<style lang='less' scoped>
  @import './../less/variables.less';
  @import './../less/flex.less';

  .blog {
    background:@color-white;
  }
</style>
