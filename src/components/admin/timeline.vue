<template>
  <main class="about-info">
    <div class="row-nw jc-center">
      <timeline-card :form="form"></timeline-card>
    </div>
  </main>
</template>

<script lang="ts">
import TimelineCard from "@/components/timeline/card.vue";
import Form from "@/models/Form";
import moment from "moment";
import TimelineEntry from "ajc-shared/src/models/TimelineEntry";
import {Component} from "vue-property-decorator";
import Vue from 'vue';

const when = moment();

@Component({
  components: { TimelineCard }
})
export default class TimelineComponent extends Vue {
  name:string = "TimelineComponent";

  form:Form<TimelineEntry> = new Form({
    imageURL: "https://vuejs.org/images/logo.png",
    labelURL: "https://vuejs.org/",
    label: "Label",
    message: "Timeline Message",
    when: when
  }, {
    onSubmit(data) {
      console.log('Should submit', data);
      return Promise.resolve(data);
    },
    editable:true,
    editing:true
  });
}
</script>
