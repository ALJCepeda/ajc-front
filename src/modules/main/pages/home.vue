<template>
  <div class="timeline">
    <timeline-intro class="intro"></timeline-intro>

    <div class="cards">
      <timeline-card
        :form="entry"
        v-for="entry in entries"
        :key="entry.id"
        style="margin-bottom:15px;"
      ></timeline-card>
    </div>
  </div>
</template>

<script>
import TimelineIntro from "@/modules/timeline/components/info.vue";
import TimelineCard from "@/modules/timeline/components/card.vue";
import $dispatch from "@/services/functions/dispatch";
import {TimelineActions} from "@/modules/timeline/store/actions";
import Form from "@/models/Form";

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

      //TODO Restore types
      Form.manyFromAction(this.$store, TimelineActions.LOAD.with({
        page: this.page,
        limit: 10
      }), {
        submitAction:TimelineActions.UPSERT,
        submitted: (entry, form) => {
          form.editing = false;
          this.fetchingEntries = false;
        },
        removed: (removedEntry) => {
          this.entries = this.entries.filter(entry => entry.id !== removedEntry.id);
        },
        removeAction:TimelineActions.REMOVE,
        editable: true
      }).then(forms => {
        this.entries = forms;
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
