<template>
  <div class='timeline row-nw ai-between'>
    <intro></intro>
    <stories></stories>
  </div>
</template>

<script>
  import intro from './../components/timeline/intro.vue';
  import stories from './../components/timeline/stories.vue';

  export default {
    name: 'timeline',
    components: { intro, stories }
  };
</script>

<style lang='less' scoped>
  @import './../less/flex.less';
</style>
