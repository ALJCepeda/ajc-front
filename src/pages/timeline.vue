<template>
  <div class='timeline'>
    <div class='row-nw jc-between hide-upto-tablet'>
      <intro></intro>

      <div class='stories'>
        <card></card>
      </div>
    </div>

    <div class='hide-downto-tablet'>
      <intro></intro>

      <div class='stories'>
        <card></card>
      </div>
    </div>
  </div>
</template>

<script>
  import intro from './../components/timeline/intro.vue';
  import card from './../components/timeline/card.vue';

  export default {
    name: 'timeline',
    components: { intro, card },
    methods: { },
    created() {
      this.$store.dispatch('timeline/indexes');
    }
  };
</script>

<style lang='less' scoped>
  @import './../less/flex.less';
  @import './../less/variables.less';
  .stories {
    max-width:60%;

    .upToTablet({
      max-width:100%;
    });
  }
</style>
