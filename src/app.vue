<template>
  <div class='app'>
    <main-nav></main-nav>
    <router-view></router-view>
  </div>
</template>

<script>
  import mainNav from './components/main-nav.vue';

  export default {
    name: 'app',
    components: { mainNav }
  };
</script>

<style lang='less' scoped>
  @import './less/variables.less';
  @import './less/flex.less';

  .app {
    width:100%;
    max-width:1025px;
  }
</style>
