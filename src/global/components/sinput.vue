<template>
  <main class="sinput row-w">
    <label>{{ label }}:</label>
    <input
      :type="type"
      :value="value"
      :name="name"
      @input="emitValue"
      v-if="!nonSimpleTypes.includes(type) && editable"
      ref="input"
    />

    <span
      v-if="!editable"
    >{{ value }}</span>

    <textarea
      :placeholder="placeholder"
      :value="value"
      :name="name"
      @input="emitValue"
      v-if="type === 'textarea' && editable"
      ref="input"
    ></textarea>

    <ckeditor
      v-if="type === 'editor' && editable"
      :editor="editor"
      v-model="value"
      @input="emitValue"
      :config="editorConfig"
    ></ckeditor>

    <datetime
      v-model="valueStr"
      :type="type"
      @input="emitValue"
      v-if="dateTypes.includes(type) && editable"
      ref="input"
    ></datetime>
  </main>
</template>

<script>
import 'vue-datetime/dist/vue-datetime.css'
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import { Datetime } from 'vue-datetime';
import {isDate, isString} from 'lodash';

export default {
  name: "sinput",
  components: {
    Datetime
  },
  props: {
    label: String,
    value: [String, Number, Boolean, Date],
    type: String,
    placeholder: {
      type: String,
      default: "Enter a value"
    },
    name: {
      type: String,
      default: ''
    },
    editable: {
      type: Boolean,
      default: true
    }
  },

  data() {
    return {
      editor: ClassicEditor,
      editorConfig: {},
      specialTypes: ['textarea', 'editor'],
      dateTypes: ['date', 'datetime', 'time'],
      valueStr: isDate(this.value) ? this.value.toISOString() : this.value
    }
  },

  computed: {
    nonSimpleTypes() {
      return this.specialTypes.concat(this.dateTypes);
    }
  },

  watch: {
    value: function(newVal) {
      if (this.$refs.input.value !== newVal && !isDate(newVal)) {
        setTimeout(() => {
          this.$refs.input.value = newVal;
        });
      }
    }
  },

  methods: {
    emitValue(event) {
      const value = isString(event) ? event : event.target.value;

      if(isDate(this.value)) {
        this.$emit("input", new Date(value) );
      } else {
        this.$emit("input", value);
      }
    }
  }
};
</script>

<style lang="less">
.sinput {
  .ck-editor {
    width: 100%
  }

  label {
    width: 20%;
    text-align: right;
    margin-right: 35px;
  }

  textarea {
    flex: 0.7;
    min-width: 175px;
  }

  input[type="text"] {
    min-width: 173px;
  }
}
</style>
