import {isDate, isMoment} from 'moment';
import {Action, GenericActionHandlerError} from "@/types";
import $dispatch from "@/services/functions/dispatch";
import {Store} from "vuex";

type FormOptions<IResourceType, ISubmitResolvedType, ISubmitRejectedType> = Partial<Form<IResourceType, ISubmitResolvedType, ISubmitRejectedType>>;

export default class Form<IResourceType, ISubmitResponseType = IResourceType, ISubmitRejectType = GenericActionHandlerError> {
  editing:boolean = false;
  editable:boolean = false;
  onSubmit?:(data:IResourceType) => Promise<{ resolved?:ISubmitResponseType, rejected?:ISubmitRejectType }>;
  resolved?:(resp:ISubmitResponseType) => Promise<void>;
  rejected?:(err:ISubmitRejectType) => Promise<void>;
  committed: { [key in keyof IResourceType] : IResourceType[key] };
  data: { [key in keyof IResourceType] : IResourceType[key] };

  constructor(initialValues:IResourceType, options:FormOptions<IResourceType, ISubmitResponseType, ISubmitRejectType> = {}) {
    this.committed = { ...initialValues };
    this.data = initialValues;

    Object.assign(this, options);

    if(!this.editable) {
      this.editing = false;
    }
  }

  isDirty():boolean {
    console.log('isdirty called');
    for(const key in this.committed) {
      const committedValue = this.committed[key];
      const dataValue = this.data[key];

      if(isDate(dataValue) && isDate(committedValue)) {
        if(dataValue.toString() !== committedValue.toString()) {
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

  submit():Promise<void> {
    if(!this.onSubmit) {
      throw new Error('Must define a submit handler for form');
    }

    return this.onSubmit(this.data).then(async (result) => {
      if(result.resolved) {
        this.commit();

        if(this.resolved) {
          return this.resolved(result.resolved);
        }
      }

      if(this.rejected && result.rejected) {
        return this.rejected(result.rejected);
      }
    });
  }

  static fromAction<IStoreState, IPayloadType, ISubmitResolvedType, ISubmitRejectedType>($store:Store<IStoreState>, action:Action<IStoreState, IPayloadType, ISubmitResolvedType, ISubmitRejectedType>, payload:IPayloadType, options:FormOptions<IPayloadType, ISubmitResolvedType, ISubmitRejectedType> = {}):Form<IPayloadType, ISubmitResolvedType, ISubmitRejectedType> {
    if(!options.onSubmit) {
      options.onSubmit = $dispatch($store, action);
    }

    return new Form<IPayloadType, ISubmitResolvedType, ISubmitRejectedType>(payload, options);
  }
}
