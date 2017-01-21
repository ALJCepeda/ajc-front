<template>
  <div id='app'>
    <main-nav></main-nav>

    <div class='pages'>
      <home></home>

      <hr>

      <codepad></codepad>
    </div>
  </div>
</template>

<script>
  import mainNav from './components/main-nav.vue';
  import home from './pages/home.vue';
  import codepad from './pages/codepad.vue';

  export default {
    name: 'app',
    components: { mainNav, home, codepad }
  };
</script>

<style lang='less'>
  @import './less/variables.less';

  #app {
    height:100vh;
    width:100vw;
  }

  hr {
    margin-top:40px;
    margin-bottom:40px;
    width:85%;
  }

  .pages {
  	height:@height-page;
  	width:100%;
  	overflow-y: auto;
  }
</style>
