<template>
  <div class="login">
    <h3>Login page</h3>

    <sform class="form" :form="form"></sform>
  </div>
</template>

<script lang="ts">
  import Vue from 'vue';
  import {Component} from "vue-property-decorator";
  import Form from "@/models/Form";
  import {AppActions} from "@/modules/main/store/actions";

  @Component
  export default class LoginComponent extends Vue {
    form = Form.withAction(this.$store, {
      email:'',
      password:''
    }, {
      submitAction: AppActions.LOGIN,
      controls:[
        { key:'email', label:'Email', type:'text' },
        { key:'password', label:'Password', type:'text'}
      ]
    });
  }
</script>

<style lang="less" scoped>

</style>
