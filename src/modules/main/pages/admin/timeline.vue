<template>
  <main class="about-info">
    <div class="row-nw jc-center">
      <timeline-card :form="timelineEntry"></timeline-card>
    </div>
  </main>
</template>

<script lang="ts">
import {Component} from "vue-property-decorator";
import Vue from 'vue';
import Form from "@/models/Form";
import TimelineCard from "@/modules/timeline/components/card.vue";
import { TimelineActions } from "@/modules/timeline/store/actions";

@Component({
  components: { TimelineCard }
})
export default class TimelineComponent extends Vue {
  name:string = "TimelineComponent";

  timelineEntry = Form.fromAction(this.$store, TimelineActions.UPSERT, {
    imageURL: "https://vuejs.org/images/logo.png",
    labelURL: "https://vuejs.org/",
    label: "Label",
    message: "Timeline Message",
    when: new Date()
  }, {
    resolved: async (resp) => {
      this.timelineEntry.commit(resp);
      debugger;
    },
    async rejected(err) {
      debugger;
    },
    editable:true,
    editing:true
  })
}
</script>
