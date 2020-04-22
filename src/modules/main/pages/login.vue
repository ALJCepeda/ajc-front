<template>
  <main class="login col-center">
    <h3 style="margin-bottom:25px;">Login page</h3>

    <sform class="form" :form="form"></sform>
  </main>
</template>

<script lang="ts">
  import Vue from 'vue';
  import {Component} from "vue-property-decorator";
  import Form from "@/models/Form";
  import {MainActions} from "@/modules/main/store/actions";

  @Component
  export default class LoginComponent extends Vue {
    form = Form.withAction(this.$store, {
      username:'vlegm',
      password:'Password123'
    }, {
      isDirty(): boolean {
        return true;
      },
      submitAction: MainActions.LOGIN,
      submitted: this.onSubmit,
      controls:[
        { key:'username', label:'Username', type:'text' },
        { key:'password', label:'Password', type:'text'}
      ]
    });

    async onSubmit() {
      this.$router.push({ name:'AdminPage' });
    }
  }
</script>

<style lang="less" scoped>

</style>
