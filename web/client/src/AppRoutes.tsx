import { Switch, Route } from "react-router-dom";

import { Dashboard, Login } from 'layout/content/index';
import EntityService from "services/Entity/EntityService";
import Routes, { RouteSpec } from 'entities/Routes';
import { useStoreActions } from "easy-peasy";
import { useEffect } from "react";

export default function AppRoutes(props:any) {

  const { token } = props;

  if (!token) {
    return (<Login />);
  }

  return (
    <Switch>
      <Route exact key='login' path='/'>
        <DashboardRoute loggedIn={!!token} />
      </Route>
      {token && Routes.map((route: RouteSpec, key:number) => (
        <Route exact key={route.key} path={route.path}>
          <RouteContent route={route} {...props} />
        </Route>
      ))}
    </Switch>
  );
}

const DashboardRoute = (props:any) => {
  const { loggedIn } = props;
  const setRoute = useStoreActions((actions:any) => {
    return actions.route.setRoute;
  });

  useEffect(
    () => {
      setRoute('/');
    },
    [setRoute]
  );

  return (<Dashboard loggedIn={loggedIn} />);
};

const RouteContent = (props:any) => {

  const { route, apiSpec } = props;
  const setRoute = useStoreActions((actions:any) => {
    return actions.route.setRoute;
  });
  const setRouteName = useStoreActions((actions:any) => {
    return actions.route.setName;
  });

  const path = route.path;
  useEffect(
    () => {
      setRoute(path);
      setRouteName(route.entity.title);
    },
    [path, setRoute]
  );

  const entity = route.entity;
  const entityService = new EntityService(
    apiSpec[entity.iden].actions,
    apiSpec[entity.iden].properties,
    entity
  );

  return (<route.component entityService={entityService} {...entity} />);
};