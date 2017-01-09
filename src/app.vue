<template>
  <div id='app'>
    <main-nav></main-nav>

    <div class='pages'>
      <home></home>
    </div>
  </div>
</template>

<script>
  import mainNav from './components/main-nav.vue';
  import home from './pages/home.vue';

  export default {
    name: 'app',
    components: { mainNav, home }
  };
</script>

<style lang='less'>
  @import './less/variables.less';

  #app {
    height:100vh;
    width:100vw;
  }
</style>
