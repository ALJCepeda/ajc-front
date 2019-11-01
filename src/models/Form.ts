import {isDate} from 'moment';
import {Action, IEntity} from "@/types";
import $dispatch from "@/services/functions/dispatch";
import {Store} from "vuex";

type FormOptions<IResourceType extends IEntity, ISubmitResponseType> = Partial<Form<IResourceType, ISubmitResponseType>>;
type FormWithActionOptions<IStoreState, IResourceType extends IEntity, ISubmitResponseType> = FormOptions<IResourceType, ISubmitResponseType> & {
  submitAction?:Action<IStoreState, IResourceType, ISubmitResponseType>,
  loadAction?:Action<IStoreState, IResourceType, IResourceType>,
  removeAction?:Action<IStoreState, number, boolean>
}

export default class Form<IResourceType extends IEntity, ISubmitResponseType = IResourceType> {
  editing:boolean = false;
  editable:boolean = false;
  onSubmit?:(data:IResourceType) => Promise<ISubmitResponseType>;
  onRemove?:(data:number) => Promise<boolean>;
  submitted?:(entry:IResourceType, form:Form<IResourceType, ISubmitResponseType>) => Promise<void>;
  removed?:(resp:IResourceType, form:Form<IResourceType, ISubmitResponseType>) => Promise<void>;
  committed: { [key in keyof IResourceType] : IResourceType[key] };
  data: { [key in keyof IResourceType] : IResourceType[key] };
  controls: {
    key:keyof IResourceType,
    label:string,
    type:string,
    readonly?:boolean,
    hideIfEmpty?:boolean
  }[] = [];

  get id():number | undefined {
    return this.data.id;
  }

  constructor(initialValues:IResourceType, options?:FormOptions<IResourceType, ISubmitResponseType>) {
    this.committed = { ...initialValues };
    this.data = initialValues;

    Object.assign(this, options);

    if(!this.editable) {
      this.editing = false;
    }
  }

  isDirty():boolean {
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

  submit():Promise<ISubmitResponseType> {
    if(!this.onSubmit) {
      throw new Error('Must define a submit handler for form');
    }

    return this.onSubmit(this.data).then(async resp => {
      this.commit();
      if(this.submitted) {
        await this.submitted(this.data, this);
      }

      return resp;
    })
  }

  remove():Promise<boolean> {
    if(!this.onRemove) {
      throw new Error('Must define a delete handler for form');
    }

    if(!this.data.id) {
      throw new Error('Cannot delete a resource that doesn\'t have an id');
    }

    return this.onRemove(this.data.id as number).then(async resp => {
      if(this.removed) {
        await this.removed(this.data, this);
      }

      return resp;
    });
  }

  static withAction<
    IStoreState,
    IPayloadType,
    ISubmitResponseType
  > (
    $store:Store<IStoreState>,
    payload:IPayloadType,
    options:FormWithActionOptions<IStoreState, IPayloadType, ISubmitResponseType>
  ) :
    Form<IPayloadType, ISubmitResponseType>
  {
    if(!options.onSubmit && options.submitAction) {
      options.onSubmit = $dispatch($store, options.submitAction);
    }

    if(!options.onRemove && options.removeAction) {
      options.onRemove = $dispatch<IStoreState, number, boolean>($store, options.removeAction);
    }

    return new Form<IPayloadType, ISubmitResponseType>(payload, options);
  }

  static async manyFromAction<
    IStoreState,
    IRequestType,
    ILoadType,
    ISubmitResponseType,
  > (
    $store:Store<IStoreState>,
    action:Action<IStoreState, IRequestType, ILoadType[]>,
    options:FormWithActionOptions<IStoreState, ILoadType, ISubmitResponseType>
  ) :
    Promise<Form<ILoadType, ISubmitResponseType>[]>
  {
    if(!action.data) {
      throw new Error('Cannot load form without a payload assigned to action. Did you forget to call "with" on the action?');
    }

    if(!options.onSubmit && options.submitAction) {
      options.onSubmit = $dispatch<IStoreState, ILoadType, ISubmitResponseType>($store, options.submitAction);
    }

    if(!options.onRemove && options.removeAction) {
      options.onRemove = $dispatch<IStoreState, number, boolean>($store, options.removeAction);
    }

    const actionPayload = await action.create(action.data);
    const resp = await $dispatch<IStoreState, IRequestType, ILoadType[]>($store, action)(actionPayload.payload);
    return resp.map(entry => Form.withAction<IStoreState, ILoadType, ISubmitResponseType>($store, entry, options));
  }
}
