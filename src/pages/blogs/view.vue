<template>
  <main class='blogs-view border'>
    <iframe id='view' width='100%' height='100%' frameBorder="0"></iframe>
  </main>
</template>

<script>
  import { mapState, mapGetters } from 'vuex';

  export default {
    name: 'blogs-view',
    methods: {
      updateFrame: function(blog) {
        var iframe = document.getElementById('view');
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
    computed: {
      html() {
        return this.$store.getters['blogs/content'](this.$route.params.id);
      }
    },
    watch: {
      html: function(blog) {
        this.updateFrame(blog);
      }
    },
    created() {
      this.$store.dispatch('blogs/content', this.$route.params.id);
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
  @import '~ajc-toolbelt/less/flex.less';

  .blogs-view {
    #view {
      height:100vh;
      background:@color-white;
    }
  }
</style>
