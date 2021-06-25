import ReactDOM from 'react-dom';
import { createMuiTheme, ThemeProvider } from '@material-ui/core/styles';
import * as locales from '@material-ui/core/locale';
import App from './App';
import reportWebVitals from './reportWebVitals';
import { StoreProvider, createStore } from "easy-peasy";
import storeModel from './store';
import i18n from './i18n';
import './index.css';

const currentLanguage = i18n.language === 'es'
  ? 'esES'
  : 'enUS';
const theme = createMuiTheme({}, locales[currentLanguage]);

const store = createStore(storeModel);

ReactDOM.render(
  //<React.StrictMode>
  <ThemeProvider theme={theme}>
    <StoreProvider store={store}>
      <App />
    </StoreProvider>
  </ThemeProvider>
  //</React.StrictMode>
  ,
  document.getElementById('root')
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
