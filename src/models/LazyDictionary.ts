export type ILazyDictionary<T> = {
  [P in keyof T]: T[P] extends new () => infer U ? U : T[P]
} & { keys: Array<keyof T> }

export function lazyActionDictionaryFrom<T>(actionMap: T): ILazyDictionary<T> {
  const result = Object.entries(actionMap).reduce((res, [id, ActionConstructor]) => {
    Object.defineProperty(res, id, {
      enumerable: true,
      get: () => new ActionConstructor()
    });

    return res;
  }, { }) as ILazyDictionary<T>;

  result.keys = Object.keys(actionMap) as unknown as Array<keyof T>;

  return result;
}
