import axios from 'axios';
import { FETCH_DATES, saveDates } from '../actions/dates';

const datesMiddlewares = (store) => (next) => (action) => {
  // console.log('on a intercepté une action dans le middleware: ', action);

  switch (action.type) {
    case FETCH_DATES:

      axios.get('http://3.89.81.120/api/dates')
        .then((response) => {
          console.log(response.data);
          console.log('salut ça va');
          // aller placer response.data dans le state
          // => on dispatch une action qui sera traitée par le reducer
          const newAction = saveDates(response.data);
          store.dispatch(newAction);
        })
        .catch((error) => {
          // console.log(error);
        });

      break;
    default:
  }

  // on passe l'action au suivant (middleware suivant ou reducer)
  next(action);
};

export default datesMiddlewares;
