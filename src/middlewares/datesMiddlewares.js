import axios from 'axios';
import { FETCH_DATES, saveDates } from '../actions/dates';
import { BASE_URL } from '../utils';

const datesMiddlewares = (store) => (next) => (action) => {
  switch (action.type) {
    case FETCH_DATES:

      axios.get(`${BASE_URL}/api/dates`)
        .then((response) => {
          // aller placer response.data dans le state
          // => on dispatch une action qui sera traitée par le reducer
          const newAction = saveDates(response.data);
          store.dispatch(newAction);
        })
        .catch((error) => {
          console.log(error);
        });

      break;
    default:
  }

  // on passe l'action au suivant (middleware suivant ou reducer)
  next(action);
};

export default datesMiddlewares;
