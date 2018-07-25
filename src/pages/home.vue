<template>
  <div class='timeline'>
    <intro></intro>

    <div class='cards'>
      <card :model='entry' v-for='entry in entries' :key='entry.id'></card>
    </div>
  </div>
</template>

<script>
  import intro from './../components/timeline/intro.vue';
  import card from './../components/timeline/card.vue';

  export default {
    name: 'timeline',
    components: { intro, card },
    data: () => ({
      page:1,
      entries:[],
      fetchingEntries:false
    }),
    methods: {
      fetchEntries() {
        this.fetchingEntries = true;
        this.$store.dispatch('timeline/entriesByPage', this.page).then(entries => {
          this.entries = Array.from(entries.values());
          this.fetchingEntries = false
        });
      }
    },
    created() {
      this.fetchEntries();
    }
  };
</script>

<style lang='less' scoped>
  @import '~ajc-toolbelt/less/flex.less';
  @import './../less/variables.less';

  .timeline {
    .row-nw;.jc-between;
  }
</style>
