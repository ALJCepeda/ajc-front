<template>
  <main class="timeline-card border">
    <div class="header row-nw border-bottom">
      <div class="img row-nw ai-center">
        <a v-if="data.labelURL && data.labelURL !== ''"
          :href="data.labelURL"
          target="_blank">
          <simg :src="data.imageUrl"></simg>
        </a>

        <simg v-if="!data.labelURL" :src="data.imageUrl"></simg>
      </div>

      <div class="content">
        <div class="top">
          <a v-if="data.labelURL"
            :href="data.labelURL"
            target="_blank">
            {{ data.label }}
          </a>

          <span v-if="!data.labelURL">{{ data.label }}</span>
          <span v-if="data.type"> shared a {{ data.type }}</span>

          <span class="edit"
            v-if="form.editable && !form.editing"
            @click="form.editing = true">
            edit
          </span>

          <span class="edit"
            v-if="form.editable && form.editing"
            @click="form.cancel()">
            cancel
          </span>
        </div>

        <div class="bottom">
          {{ data.when | FromNow }}
        </div>
      </div>
    </div>

    <div class="message border-bottom">
      <p>
        {{ data.message }}
      </p>
    </div>

    <div class="editor" v-if="form.editable && form.editing">
      <div>
        <sinput label="When" type="datetime" v-model="data.when"></sinput>
        <sinput label="Image" type="text" v-model="data.imageUrl"></sinput>
        <sinput label="Link" type="text" v-model="data.labelURL"></sinput>
        <sinput label="Label" type="text" v-model="data.label"></sinput>
        <sinput label="Message" type="textarea" v-model="data.message"></sinput>
      </div>

      <div class="row-nw jc-center action-btns">
        <button class="btn btn-primary submit" @click="form.submit()" :disabled="!form.isDirty()">
          Submit
        </button>
        <button class="btn btn-danger" @click="form.reset()">Reset</button>
      </div>
    </div>
  </main>
</template>

<script lang="ts">
import Form from "@/models/Form";
import TimelineEntry from "ajc-shared/src/models/TimelineEntry";
import {Component, Prop} from "vue-property-decorator";
import Vue from 'vue';

@Component
export default class TimelineCard extends Vue {
  name:string = "TimelineCard";

  @Prop()
  form:Form<TimelineEntry>;

  data() {
    return {
      data: this.form.data
    };
  }
};
</script>

<style lang="less" scoped>
@import "~ajc-toolbelt/dist/less/flex.less";
@import "./../../less/variables.less";

.timeline-card {
  width: 100%;
  background: @color-white;
  color: black;
  max-width: 550px;
  min-width: 320px;

  .header {
    padding: 10px;

    .img {
      width: 10%;

      img {
        width: 100%;
        height: auto;
      }
    }

    .content {
      width: 90%;
      height: 100%;
      padding: 6px;

      .bottom {
        color: #90949c;
        font-size: 12px;
      }
    }
  }

  .message {
    min-height: 90px;
    padding: 10px;

    p {
      margin-top: 0;
      margin-bottom: 10px;
    }
  }

  .editor {
    padding-top: 15px;
  }

  .sinput {
    margin-bottom: 15px;
  }

  .action-btns {
    margin-top: 40px;
    margin-bottom: 20px;
  }

  .submit.btn {
    margin-right: 30px;
  }

  .edit {
    float: right;
    color: @color-blue;
    cursor: pointer;
  }
}
</style>
