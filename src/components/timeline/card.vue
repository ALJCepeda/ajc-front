<template>
  <main class='timeline-card border'>
    <div class='header row-nw border-bottom'>
      <div class='img row-nw ai-center'>
        <simg :src='form.imageUrl' />
      </div>

      <div class='content'>
        <div class='top'>
          <a v-if="form.link && form.link !== ''" :href='form.link' target="_blank">{{form.label}}</a>
          <span v-if="!form.link">{{form.label}}</span>
          <span v-if='form.type'> shared a {{ form.type }}</span>

          <span class="edit" v-if="mode === 'view'" @click="clickedEdit()">edit</span>
          <span class="edit" v-if="mode === 'edit'" @click="clickedCancel()">cancel</span>
        </div>

        <div class='bottom'>
          {{ form.fromNow }}
        </div>
      </div>
    </div>

    <div class='message border-bottom'>
      <p>
        {{ form.message }}
      </p>
    </div>

    <div class="editor" v-if="mode === 'edit'">
      <div>
        <sinput label="Image" type="text" v-model="form.imageUrl" />
        <sinput label="Link" type="text" v-model="form.link" />
        <sinput label="Label" type="text" v-model="form.label" />
        <sinput label="Message" type="textarea" v-model="form.message" />
      </div>

      <div class="row-nw jc-center action-btns">
        <button class="btn btn-primary submit" @click="clickedSubmit()">Submit</button>
        <button class="btn btn-danger" @click="clickedReset()">Reset</button>
      </div>
    </div>
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

    commit() {
      for(const key in this) {
        if(key !== 'initialValues') {
          this.initialValues[key] = this[key];
        }
      }
    }
  }

  export default {
    name: 'card',
    props: {
      form: {
        type:FormGroup,
        default: function() {
          return new FormGroup({
            imageUrl:'https://vuejs.org/images/logo.png',
            link:'https://vuejs.org/',
            label:'Label',
            message:'Timeline Message',
            fromNow:'Now'
          });
        }
      }
    },
    data: function() {
      return {
        mode:'view'
      };
    },
    methods: {
      clickedReset() {
        this.form.setInitialValues();
      },
      clickedCancel() {
        this.clickedReset();
        this.mode = 'view';
      },
      clickedEdit() {
        this.mode = 'edit';
      },
      clickedSubmit() {
        console.log('Should submit:', this.form);
        this.form.commit();
      }
    }
  };
</script>

<style lang='less' scoped>
  @import '~ajc-toolbelt/dist/less/flex.less';
  @import './../../less/variables.less';

  .timeline-card {
    width:100%;
    background:@color-white;
    color:black;
    max-width:550px;
    min-width:320px;

    .header {
      padding:10px;

      .img {
        width:10%;

        img {
          width:100%;
          height:auto;
        }
      }

      .content {
        width:90%;
        height:100%;
        padding:6px;

        .bottom {
          color:#90949c;
          font-size:12px;
        }
      }
    }

    .message {
      min-height:90px;
      padding: 10px;

      p {
        margin-top:0px;
        margin-bottom:10px;
      }
    }

    .editor {
      padding-top:15px;
    }

    .sinput {
      margin-bottom:15px;
    }

    .action-btns {
      margin-top:40px;
      margin-bottom:20px;
    }

    .submit.btn {
      margin-right:30px;
    }

    .edit {
      float:right;
      color:@color-blue;
      cursor:pointer;
    }
  }
</style>
