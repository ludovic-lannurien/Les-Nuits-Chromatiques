import axios from 'axios';
import { FETCH_EVENTS, saveEvents } from '../actions/map';
import { BASE_URL } from '../utils';

const eventsMiddlewares = (store) => (next) => (action) => {
  switch (action.type) {
    case FETCH_EVENTS:

      axios.get(`${BASE_URL}/api/events`)
        .then((response) => {
          // aller placer response.data dans le state
          // => on dispatch une action qui sera traitée par le reducer
          const newAction = saveEvents(response.data);
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

export default eventsMiddlewares;
