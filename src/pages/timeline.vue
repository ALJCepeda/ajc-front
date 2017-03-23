<template>
  <div class='timeline row-nw ai-between'>
    <intro></intro>
    <stories :image='image'
             :name='name'></stories>
  </div>
</template>

<script>
  import intro from './../components/intro.vue';
  import stories from './../components/stories.vue';

  export default {
    name: 'timeline',
    components: { intro, stories },
    props: ['name', 'image']
  };
</script>

<style lang='less' scoped>
  @import './../less/flex.less';
</style>
