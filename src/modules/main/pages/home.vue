<template>
  <div class="timeline">
    <timeline-intro class="intro"></timeline-intro>

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
import TimelineIntro from "@/modules/timeline/components/TimelineInfo.vue";
import TimelineCard from "@/modules/timeline/components/TimelineCard.vue";

export default {
  name: "timeline",
  components: { TimelineIntro, TimelineCard },
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
@import "../../../../node_modules/ajc-toolbelt/dist/less/resources/mixins.less";
@import "../../../../node_modules/ajc-toolbelt/dist/less/flex.less";
@import "../../../less/variables.less";

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
