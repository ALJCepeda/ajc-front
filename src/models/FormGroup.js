export default class FormGroup {
  constructor(initialValues) {
    this.initialValues = { ...initialValues };
    this.committed = { ...initialValues };
    this.setInitialValues();
  }

  setInitialValues() {
    for (const key in this.initialValues) {
      this[key] = this.initialValues[key];
    }
  }

  setCommittedValues() {
    for (const key in this.committed) {
      if (key !== "committed") {
        this[key] = this.committed[key];
      }
    }
  }

  commit() {
    for (const key in this) {
      if (key !== "initialValues") {
        this.committed[key] = this[key];
      }
    }
  }
}
