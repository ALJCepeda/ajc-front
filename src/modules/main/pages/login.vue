<template>
  <main class="login col-center">
    <h3 style="margin-bottom:25px;">Login page</h3>

    <sform class="form" :form="form" />
  </main>
</template>

<script lang="ts">
import Vue from "vue";
import { Component } from "vue-property-decorator";
import { AppActions } from "@/modules/main/store/actions";
import { withAction } from "@/factories/FormFactory";

@Component
export default class LoginComponent extends Vue {
  form = withAction(
    this.$store,
    {
      username: "vlegm",
      password: "Password123"
    },
    {
      isDirty(): boolean {
        return true;
      },
      storeActions: () => ({
        submit: AppActions.LOGIN.done(deferred => {
          deferred
            .then(() => this.onSuccess())
            .catch(err => console.error("Need to broadcast error", err));
        })
      }),
      controls: [
        { key: "username", label: "Username", type: "text" },
        { key: "password", label: "Password", type: "text" }
      ]
    }
  );

  async onSuccess() {
    return this.$router.push({ name: "AdminPage" });
  }
}
</script>

<style lang="less" scoped></style>
