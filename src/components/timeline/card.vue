<template>
  <main class="timeline-card border">
    <div class="header row-nw border-bottom">
      <div class="img row-nw ai-center">
        <a v-if="form.labelURL && form.labelURL !== ''"
          :href="form.labelURL"
          target="_blank">
          <simg :src="form.imageUrl" />
        </a>

        <simg v-if="!form.labelURL" :src="form.imageUrl" />
      </div>

      <div class="content">
        <div class="top">
          <a v-if="form.labelURL"
            :href="form.labelURL"
            target="_blank">
            {{ form.label }}
          </a>

          <span v-if="!form.labelURL">{{ form.label }}</span>
          <span v-if="form.type"> shared a {{ form.type }}</span>

          <span class="edit"
            v-if="mode !== 'new' && !editing"
            @click="clickedEdit()">
            edit
          </span>

          <span class="edit"
            v-if="mode !== 'new' && editing"
            @click="clickedCancel()">
            cancel
          </span>
        </div>

        <div class="bottom">
          {{ form.when | FromNow }}
        </div>
      </div>
    </div>

    <div class="message border-bottom">
      <p>
        {{ form.message }}
      </p>
    </div>

    <div class="editor" v-if="editing">
      <div>
        <sinput label="When" type="datetime" v-model="form.when" />
        <sinput label="Image" type="text" v-model="form.imageUrl" />
        <sinput label="Link" type="text" v-model="form.labelURL" />
        <sinput label="Label" type="text" v-model="form.label" />
        <sinput label="Message" type="textarea" v-model="form.message" />
      </div>

      <div class="row-nw jc-center action-btns">
        <button class="btn btn-primary submit" @click="clickedSubmit()">
          Submit
        </button>
        <button class="btn btn-danger" @click="clickedReset()" v-if="mode !== 'new'">Reset</button>
        <button class="btn btn-danger" @click="clickedClear()" v-if="mode === 'new'">Clear</button>
      </div>
    </div>
  </main>
</template>

<script>
import FormGroup from "./../../models/FormGroup";
import moment from "moment";

export default {
  name: "card",
  props: {
    mode: {
      type: String,
      default: "readonly"
    },
    form: {
      type:FormGroup
    }
  },
  data() {
    return {
      editing:(this.mode === 'editable' || this.mode === 'new') ? true : false
    };
  },
  methods: {
    clickedReset() {
      this.form.setCommittedValues();
    },
    clickedClear() {
      this.form.setInitialValues();
    },
    clickedCancel() {
      this.clickedReset();
      this.editing = false;
    },
    clickedEdit() {
      this.editing = true;
    },
    clickedSubmit() {
      console.log("Should submit:", this.form);
      this.form.commit();

      if (this.mode === "new") {
        this.form.setInitialValues();
      }
    }
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
      margin-top: 0px;
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
