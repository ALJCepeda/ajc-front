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
import {TimelineUpsert} from "@/modules/timeline/store/actions";

@Component({
  components: { TimelineCard }
})
export default class TimelineComponent extends Vue {
  name:string = "TimelineComponent";

  timelineEntry = Form.withAction(this.$store, {
    imageURL: "https://vuejs.org/images/logo.png",
    labelURL: "https://vuejs.org/",
    label: "Label",
    message: "Timeline Message",
    when: new Date()
  }, {
    storeActions: {
      submit: new TimelineUpsert()
    },
    editable:true,
    editing:true
  });
}
</script>
