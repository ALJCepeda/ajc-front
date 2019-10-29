<template>
  <main class="about-info">
    <div class="row-nw jc-center">
      <timeline-card :form="form"></timeline-card>
    </div>
  </main>
</template>

<script lang="ts">
import TimelineCard from "@/modules/timeline/components/TimelineCard.vue";
import Form from "@/models/Form";
import {Component} from "vue-property-decorator";
import Vue from 'vue';
import TimelineActions from "@/modules/timeline/TimelineActions";

@Component({
  components: { TimelineCard }
})
export default class TimelineComponent extends Vue {
  name:string = "TimelineComponent";

  form = Form.fromAction(this.$store, TimelineActions.UPSERT, {
    imageURL: "https://vuejs.org/images/logo.png",
    labelURL: "https://vuejs.org/",
    label: "Label",
    message: "Timeline Message",
    when: new Date()
  }, {
    async resolved(resp) {

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
