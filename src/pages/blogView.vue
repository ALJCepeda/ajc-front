<template>
  <main class='blog border'>
    <iframe id='blogView' width='100%' height='100%' frameBorder="0"></iframe>
  </main>
</template>

<script>
  import { mapState, mapGetters } from 'vuex';

  export default {
    name: 'blogView',
    methods: {
      updateFrame: function(blog) {
        var iframe = document.getElementById('blogView');
        var doc = iframe.document;
        if(iframe.contentDocument){
            doc = iframe.contentDocument;
        }
        else if(iframe.contentWindow){
            doc = iframe.contentWindow.document;
        }
        doc.open();
        doc.writeln(blog);
        doc.close();
      }
    },
    computed: Object.assign({
        html() {
          return this.$store.state.blogs[this.$route.params.id];
        }
      },
      mapGetters([ 'getBlogById' ]),
      mapState([ 'blogs' ])
    ),
    watch: {
      html: function(blog) {
        this.updateFrame(blog);
      }
    },
    created() {
      this.$store.dispatch('fetchBlog', this.$route.params.id);
    },
    mounted() {
      if(_.isString(this.html)) {
        this.updateFrame(this.html);
      }
    }
  };
</script>

<style lang='less' scoped>
  @import './../less/variables.less';
  @import './../less/flex.less';

  .blog {
    height:100vh;
    background:@color-white;
  }
</style>
