import { makeStyles, Container, Grid, Paper, LinearProgress, CssBaseline } from '@material-ui/core';
import { MuiPickersUtilsProvider } from '@material-ui/pickers';
import { BrowserRouter as Router } from "react-router-dom";
import DateFnsAdapter from "@date-io/date-fns";
import { useStoreState, useStoreActions } from "easy-peasy";
import { Header, Footer } from './layout/index';
import AppRoutes from './AppRoutes';

export default function App() {

  const classes = useStyles();

  const apiSpecInitFn = useStoreActions((actions: any) => actions.apiSpec.init);
  const authInit = useStoreActions((actions: any) => actions.auth.init);

  apiSpecInitFn();
  authInit();

  const token = useStoreState((state: any) => state.auth.token);
  const apiSpec = useStoreState((state: any) => state.apiSpec.spec);

  if (!apiSpec || Object.keys(apiSpec).length === 0) {
    return (
      <div className={classes.loading}>
        <LinearProgress />
        <br />
        Loading API definition...
      </div>
    );
  }

  return (
    <MuiPickersUtilsProvider utils={DateFnsAdapter}>
      <CssBaseline />
      <div className={classes.root}>
        <Router>
          <Header loggedIn={!!token} />
          <main className={classes.content}>
            <div className={classes.appBarSpacer} />
            <Container maxWidth={'lg'} className={classes.container}>
              <Grid container spacing={3}>
                <Grid item xs={12}>
                  <Paper className={classes.paper}>
                      <AppRoutes token={token} apiSpec={apiSpec} />
                  </Paper>
                </Grid>
                <Grid item xs={12}>
                  <Footer />
                </Grid>
              </Grid>
            </Container>
          </main>
        </Router>
      </div>
    </MuiPickersUtilsProvider>
  );
}

const useStyles = makeStyles((theme: any) => ({
  loading: {
    'text-align': 'center',
  },
  root: {
    display: 'flex'
  },
  appBarSpacer: theme.mixins.toolbar,
  content: {
    flexGrow: 1,
    flexFlow: 'row wrap',
    height: '100vh',
    overflow: 'auto'
  },
  container: {
    padding: theme.spacing(2),
    marginLeft: 0,
  },
  paper: {
    padding: theme.spacing(2),
    overflow: 'auto',
    maxWidth: 'none'
  }
}));
