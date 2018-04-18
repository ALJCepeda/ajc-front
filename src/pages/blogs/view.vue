<template>
  <main class='blog border'>
    <iframe id='blogView' width='100%' height='100%' frameBorder="0"></iframe>
  </main>
</template>

<script>
  import { mapState, mapGetters } from 'vuex';

  export default {
    name: 'blogs/view',
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
          const entry = this.$store.state.blogs.entries[this.$route.params.id];
          return entry;
        }
      },
      mapGetters('blogs', [ 'id' ]),
      mapState('blogs', [ 'entries' ])
    ),
    watch: {
      html: function(blog) {
        this.updateFrame(blog);
      }
    },
    created() {
      this.$store.dispatch('blogs/fetch', this.$route.params.id);
    },
    mounted() {
      if(_.isString(this.html)) {
        this.updateFrame(this.html);
      }
    }
  };
</script>

<style lang='less' scoped>
  @import './../../less/variables.less';
  @import './../../less/flex.less';

  .blog {
    height:100vh;
    background:@color-white;
  }
</style>
