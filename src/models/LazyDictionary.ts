export type ILazyDictionary<T> = {
  [P in keyof T]: T[P] extends new () => infer U ? U : T[P];
};

export function lazyActionDictionaryFrom<T>(actionMap: T): ILazyDictionary<T> {
  return Object.entries(actionMap).reduce((res, [id, ActionConstructor]) => {
    Object.defineProperty(res, id, {
      get: () => new ActionConstructor()
    });

    return res;
  }, {}) as ILazyDictionary<T>;
}
