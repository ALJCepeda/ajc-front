import {isDate} from 'moment';
import {Store} from "vuex";
import {Action} from "@/models/Action";

type FormOptions<IResourceType extends IEntity> = Partial<Form<IResourceType>>;
type FormWithActionOptions<IStoreState, IPayloadType extends IEntity, IResponseType> = FormOptions<IPayloadType> & {
  storeActions:{
    [type:string]: Action<IStoreState, IPayloadType, any>
  }
}

export interface FormActionResponse<IPayloadType, IResponseType> {
  payload:IPayloadType;
  response:IResponseType;
  form:Form<IPayloadType>;
}

export default class Form<IResourceType extends IEntity> {
  editing:boolean = false;
  editable:boolean = false;
  actions:{ [type:string]:(payload:IResourceType) => Promise<void> };
  committed: { [key in keyof IResourceType] : IResourceType[key] };
  data: { [key in keyof IResourceType] : IResourceType[key] };
  controls: {
    key:keyof IResourceType,
    label:string,
    type:'text' | 'textarea' | 'date' | 'time' | 'datetime' | 'editor',
    readonly?:boolean,
    hideIfEmpty?:boolean
  }[] = [];

  get id():number | undefined {
    return this.data.id;
  }

  constructor(initialValues:IResourceType, options?:FormOptions<IResourceType>) {
    this.committed = { ...initialValues };
    this.data = initialValues;

    Object.assign(this, options);

    if(!this.editable) {
      this.editing = false;
    }
  }

  isDirty():boolean {
    for(const key in this.committed) {
      if(this.committed.hasOwnProperty(key) && this.data.hasOwnProperty(key)) {
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
    }

    return false;
  }

  reset() {
    Object.assign(this.data, this.committed);
  }

  commit(data?:IResourceType) {
    if(data) {
      Object.assign(this.committed, data);
      this.reset();
    } else {
      Object.assign(this.committed, this.data);
    }

  }

  cancel() {
    this.reset();
    this.editing = false;
  }

  static withAction<IStoreState, IPayloadType, IResponseType> (
    $store:Store<IStoreState>,
    payload:IPayloadType,
    options:FormWithActionOptions<IStoreState, IPayloadType, IResponseType>
  ): Form<IPayloadType> {
    const actions = Object.entries(options.storeActions).reduce((result, [type, action]) => {
      result[type] = action.createDispatcher($store);
      return result;
    }, {});

    const formOptions = {
      ...options,
      actions: Object.assign({}, options.actions, actions)
    };

    return new Form<IPayloadType>(payload, formOptions);
  }

  static async loadWithAction<IStoreState, IRequestType, ILoadType, IResponseType> (
    $store:Store<IStoreState>,
    action:Action<IStoreState, IRequestType, ILoadType[]>,
    options:FormWithActionOptions<IStoreState, ILoadType, IResponseType>
  ): Promise<Form<ILoadType>[]> {
    if(!action.payload) {
      throw new Error('Cannot load form without a payload assigned to action. Did you forget to call "with" on the action?');
    }

    const { payload } = await action.transform(action.payload);
    const resp = await action.$dispatch($store, payload);
    return resp.map(entry => Form.withAction($store, entry, options));
  }
}
