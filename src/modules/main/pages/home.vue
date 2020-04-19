<template>
  <div class="timeline">
    <timeline-intro class="intro"></timeline-intro>

    <div class="cards">
      <timeline-card
        :form="form"
        v-for="form in forms"
        :key="form.id"
        style="margin-bottom:15px;"
      ></timeline-card>
    </div>
  </div>
</template>

<script lang="ts">
import TimelineIntro from "@/modules/timeline/components/info.vue";
import TimelineCard from "@/modules/timeline/components/card.vue";
import {TimelineActions} from "@/modules/timeline/store/actions";
import Form from "@/models/Form";

export default {
  name: "timeline",
  components: { TimelineIntro, TimelineCard },
  data: () => ({
    page: 1,
    forms: [],
    fetchingEntries: false
  }),
  methods: {
    async fetchEntries() {
      this.fetchingEntries = true;

      this.forms = await Form.loadWithAction(this.$store, TimelineActions.LOAD.with({
        page: this.page,
        limit: 10
      }), {
        editable: true,
        submitAction:TimelineActions.UPSERT,
        submitted: async (entry, form) => {
          form.editing = false;
          this.fetchingEntries = false;
        },
        removeAction:TimelineActions.REMOVE,
        removed: async (removedEntry, entryForm) => {
          this.forms = this.forms.filter(form => form !== entryForm);
        },
        controls: [
          { key:'id', label:'ID', type:'text', readonly:true, hideIfEmpty:true },
          { key:'when', label:'When', type:'datetime' },
          { key:'imageURL', label:'Image', type:'text' },
          { key:'labelURL', label:'Link', type:'text' },
          { key:'label', label:'Label', type:'text' },
          { key:'message', label:'Message', type:'editor' }
        ]
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
  margin-bottom: 20px;
}

.cards {
  max-width: 550px;
  min-width: 320px;
}
</style>
