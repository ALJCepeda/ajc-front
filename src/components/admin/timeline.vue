<template>
  <main class="about-info">
    <div class="row-nw jc-center">
      <card mode="new" :form="card"></card>
    </div>
  </main>
</template>

<script>
import card from "@/components/timeline/card";
import FormGroup from "@/models/FormGroup";

export default {
  name: "timeline",
  components: { card },
  data() {
    return {
      card: new FormGroup({
        imageUrl: "https://vuejs.org/images/logo.png",
        labelURL: "https://vuejs.org/",
        label: "Label",
        message: "Timeline Message",
        when:moment().format()
      })
    }
  }
};
</script>
