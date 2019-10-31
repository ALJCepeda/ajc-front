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
      $dispatch(this.$store, TimelineActions.LOAD)({
        page:this.page,
        limit:10
      }).then((resp) => {
        this.entries = resp.map(entry => {
          return Form.withAction(this.$store, entry, {
            submitAction:TimelineActions.UPSERT,
            submitted: (entry, form) => {
              form.editing = false;
            },
            removed: (removedEntry) => {
              this.entries = this.entries.filter(entry => entry.id !== removedEntry.id);
            },
            removeAction:TimelineActions.REMOVE,
            editable: true
          });
        });
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
