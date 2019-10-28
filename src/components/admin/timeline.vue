<template>
  <main class="about-info">
    <div class="row-nw jc-center">
      <timeline-card mode="readonly" :form="card"></timeline-card>
    </div>
  </main>
</template>

<script>
import TimelineCard from "@/components/timeline/card";
import Form from "@/models/Form";
import moment from "moment";

export default {
  name: "timeline",
  components: { TimelineCard },
  data() {
    const when = moment();
    return {
      card: new Form({
        imageUrl: "https://vuejs.org/images/logo.png",
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
      })
    }
  }
};
</script>
