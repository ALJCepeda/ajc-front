<template>
  <div id='app'>
    <main-nav :image='mainImg'></main-nav>
    <timeline :image='mainImg'></timeline>
    <!--<div class='pages'>
      <home></home>

      <hr>

      <codepad></codepad>
    </div>-->
  </div>
</template>

<script>
  import mainNav from './components/main-nav.vue';
  import timeline from './pages/timeline.vue';
  import home from './pages/home.vue';
  import codepad from './pages/codepad.vue';

  export default {
    name: 'app',
    components: { mainNav, home, codepad, timeline },
    data: function() {
      return {
        mainImg: require('./assets/images/me.jpeg')
      };
    }
  };
</script>

<style lang='less' scoped>
  @import './less/variables.less';
  @import './less/flex.less';

  #app {
    width:100%;
    max-width:1025px;
  }

  hr {
    margin-top:40px;
    margin-bottom:40px;
    width:85%;
  }

  .pages {
  	width:100%;
  	overflow-y: auto;
  }
</style>
