<template>
  <main class="about-info">
    <div class="row-nw jc-center">
      <card mode="readonly" :form="card"></card>
    </div>
  </main>
</template>

<script>
import card from "@/components/timeline/card";
import Form from "@/models/Form";
import moment from "moment";

export default {
  name: "timeline",
  components: { card },
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
