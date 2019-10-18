<template>
  <main class="sinput row-w">
    <label>{{label}}:</label>
    <input :placeholder="placeholder" :type="type" :value="value" @input="emitValue" v-if="type !== 'textarea'" ref="input"/>
    <textarea :placeholder="placeholder" :value="value" @input="emitValue" v-if="type === 'textarea'" ref="input" />
  </main>
</template>

<script>
  export default {
    name: 'sinput',
    props: {
      label:String,
      type:String,
      value:[ String, Number, Boolean ],
      placeholder:{
        type:String,
        default:'Enter a value'
      }
    },

    watch: {
      value: function(newVal) {
        if(this.$refs.input.value !== newVal) {
          setTimeout(() => {
            this.$refs.input.value = newVal;
          });
        }
      }
    },

    methods: {
      emitValue(event) {
        this.$emit('input', event.target.value);
      }
    }
  };
</script>

<style lang="less">
  .sinput {
    label {
      width:20%;
      text-align: right;
      margin-right:35px;
    }

    textarea {
      flex: .7;
      min-width: 175px;
    }

    input[type=text] {
      min-width:173px;
    }
  }
</style>
