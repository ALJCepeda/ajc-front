<template>
  <div class='timeline'>
    <intro></intro>
    <stories></stories>
  </div>
</template>

<script>
  import intro from './../components/intro.vue';
  import stories from './../components/stories.vue';

  export default {
    name: 'timeline',
    components: { intro, stories }
  };
</script>

<style lang='less' scoped>
  @import './../less/flex.less';

  .timeline {
    .row-nw;.m-between;
  }
</style>
