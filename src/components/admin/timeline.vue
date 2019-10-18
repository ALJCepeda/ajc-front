<template>
  <main class='about-info'>
    <form>
      <div class="row-nw jc-center">
        <simg :src="form.image" />
      </div>

      <sinput label="Image" type="text" v-model="form.image" />
      <sinput label="Link" type="text" v-model="form.link" />
      <sinput label="Label" type="text" v-model="form.label" />
      <sinput label="Message" type="textarea" v-model="form.message" />

      <div class="row-nw jc-center action-btns">
        <button class="btn btn-primary" type="submit">Submit</button>
        <button class="btn btn-danger" type="reset" @click="clickedClear()">Clear</button>
      </div>
    </form>
  </main>
</template>

<script>
  class FormGroup {
    constructor(initialValues) {
      this.initialValues = initialValues;
      this.setInitialValues();
    }

    setInitialValues() {
      for(const key in this.initialValues) {
        this[key] = this.initialValues[key];
      }
    }
  }

  export default {
    name: 'timeline',
    data: function() {
      return {
        cow:'first',
        form: new FormGroup({
          message: 'A message',
          image: 'https://vuejs.org/images/logo.png',
          link:'a link',
          label:'',
        })
      };
    },
    methods: {
      clickedClear() {
        this.form.setInitialValues();
      }
    },
     created() {
      this.form.message = "After it was created";
     }
  };
</script>


<style lang="less" scoped>
  img {
    max-width:175px;
    margin-bottom:30px;
  }

  button[type="submit"] {
    margin-right:30px;
  }

  .action-btns {
    margin-top:40px;
  }
</style>
