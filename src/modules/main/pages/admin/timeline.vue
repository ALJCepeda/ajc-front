<template>
  <main class="about-info">
    <div class="row-nw jc-center">
      <timeline-card :form="timelineEntry"></timeline-card>
    </div>
  </main>
</template>

<script lang="ts">
import { Component } from "vue-property-decorator";
import Vue from "vue";
import TimelineCard from "@/modules/timeline/components/card.vue";
import { TimelineActions } from "@/modules/timeline/store/actions";
import { withAction } from "@/factories/FormFactory";
import {AppActions} from "@/modules/main/store/actions";

@Component({
  components: { TimelineCard }
})
export default class TimelineComponent extends Vue {
  name = "TimelineComponent";

  timelineEntry = withAction(
    this.$store,
    {
      imageURL: "https://vuejs.org/images/logo.png",
      labelURL: "https://vuejs.org/",
      label: "Label",
      message: "Timeline Message",
      when: new Date()
    },
    {
      storeActions: () => ({
        submit: TimelineActions.UPSERT
      }),
      editable: true,
      editing: true
    }
  );

  created() {
    TimelineActions.PAGE.$dispatch(this.$store, {
      page: 1,
      skip: 3,
      limit: 5
    });
  }
}
</script>
