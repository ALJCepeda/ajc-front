import { isMoment } from 'moment';

interface FormOptions<T> {
  onSubmit?:(data:T) => Promise<T>;
  editable?:boolean;
  editing?:boolean;
}

export default class Form<T> {
  editing:boolean = false;
  editable:boolean = false;
  onSubmit:(data:T) => Promise<T>;
  committed: { [key in keyof T] : T[key] };
  data: { [key in keyof T] : T[key] };

  constructor(initialValues:T, options:FormOptions<T> = {}) {
    this.committed = { ...initialValues };
    this.data = initialValues;
    this.onSubmit = options.onSubmit;
    this.editable = !!options.editable;
    if(this.editable) {
      this.editing = !!options.editing;
    }
  }

  isDirty() {
    for(const key in this.committed) {
      const committedValue = this.committed[key];
      const dataValue = this.data[key];

      if(isMoment(dataValue) && isMoment(committedValue)) {
        if(dataValue.format() !== committedValue.format()) {
          return true;
        }
      } else if(dataValue !== committedValue) {
        return true;
      }
    }

    return false;
  }

  reset() {
    Object.assign(this.data, this.committed);
  }

  commit() {
    Object.assign(this.committed, this.data);
  }

  cancel() {
    this.reset();
    this.editing = false;
  }

  submit():Promise<T> {
    this.commit();
    return this.onSubmit(this.data);
  }
}
