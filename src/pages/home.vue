<template>
  <div class="timeline">
    <intro class="intro"></intro>

    <div class="cards">
      <timeline-card
        :model="entry"
        v-for="entry in entries"
        :key="entry.id"
        style="margin-bottom:15px;"
      ></timeline-card>
    </div>
  </div>
</template>

<script>
import intro from "@/components/timeline/intro.vue";
import TimelineCard from "@/components/timeline/card.vue";

export default {
  name: "timeline",
  components: { intro, TimelineCard },
  data: () => ({
    page: 1,
    entries: [],
    fetchingEntries: false
  }),
  methods: {
    fetchEntries() {
      this.fetchingEntries = true;
      this.$store
        .dispatch("timeline/entries", this.page)
        .then(entries => {
          this.entries = entries;
          this.fetchingEntries = false;
        });
    }
  },
  created() {
    this.fetchEntries();
  }
};
</script>

<style lang="less" scoped>
@import "~ajc-toolbelt/dist/less/resources/mixins.less";
@import "~ajc-toolbelt/dist/less/flex.less";
@import "./../less/variables.less";

.timeline {
  .row-w;
  .jc-between;

  .upTo(923px, {> * {margin: 0 auto;}});
}

.intro {
  width: 320px;
  box-sizing: content-box;
}

.cards {
  max-width: 550px;
  min-width: 320px;
}
</style>
