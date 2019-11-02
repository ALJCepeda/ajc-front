import Vue from 'vue';
import {Prop} from "vue-property-decorator";
import Form from "@/models/Form";

export default class AbstractFormComponent<IResourceType, ISubmitResponseType> extends Vue {
  @Prop()
  form:Form<IResourceType, ISubmitResponseType>;

  submitting:boolean = false;
  removing:boolean = false;

  get isDirty() {
    return this.form.isDirty();
  }

  get entry():IResourceType {
    return this.form.data;
  }

  submit() {
    this.submitting = true;
    this.form.submit().then(resp => {
      this.submitting = false;
      return resp;
    });
  }

  remove() {
    this.removing = true;
    this.form.remove().then(resp => {
      this.removing = false;
      return resp;
    });
  }
}
