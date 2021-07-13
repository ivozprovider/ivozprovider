import { action } from 'easy-peasy';
import { JsxElement } from 'typescript';
const route = {
  route: '/',
  name: '',

  // actions
  setRoute: action((state: any, route: string) => {
    state.route = route;
  }),
  setName: action((state: any, name: string|JsxElement) => {
    state.name = name;
  }),
};

export default route;
