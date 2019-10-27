<template>
  <main class="sinput row-w">
    <label>{{ label }}:</label>
    <input
      :type="type"
      :value="value"
      :name="name"
      @input="emitValue"
      v-if="!nonSimpleTypes.includes(type)"
      ref="input"
    />

    <textarea
      :placeholder="placeholder"
      :value="value"
      :name="name"
      @input="emitValue"
      v-if="type === 'textarea'"
      ref="input"
    ></textarea>

    <datetime
      v-model="valueStr"
      :type="type"
      @input="emitValue"
      v-if="dateTypes.includes(type)"
      ref="input"
    ></datetime>
  </main>
</template>

<script>
import 'vue-datetime/dist/vue-datetime.css'
import { Datetime } from 'vue-datetime';
import {isDate, isString} from 'lodash';
import moment from "moment";

export default {
  name: "sinput",
  components: {
    Datetime
  },
  props: {
    label: String,
    value: [String, Number, Boolean, moment],
    type: String,
    placeholder: {
      type: String,
      default: "Enter a value"
    },
    name: {
      type: String,
      default: ''
    }
  },

  data() {
    return {
      specialTypes: [ 'textarea' ],
      dateTypes: ['date', 'datetime', 'time'],
      valueStr: moment.isMoment(this.value) ? this.value.format() : this.value
    }
  },

  computed: {
    nonSimpleTypes() {
      return this.specialTypes.concat(this.dateTypes);
    }
  },

  watch: {
    value: function(newVal) {
      if (this.$refs.input.value !== newVal && !moment.isMoment(newVal)) {
        setTimeout(() => {
          this.$refs.input.value = newVal;
        });
      }
    }
  },

  methods: {
    emitValue(event) {
      const value = isString(event) ? event : event.target.value;

      if(moment.isMoment(this.value)) {
        this.$emit("input", moment(value));
      } else {
        this.$emit("input", value);
      }
    }
  }
};
</script>

<style lang="less">
.sinput {
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
