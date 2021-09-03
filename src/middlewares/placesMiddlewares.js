import axios from 'axios';
import { FETCH_PLACES, savePlaces } from '../actions/places';
import { BASE_URL } from '../utils';

const placesMiddlewares = (store) => (next) => (action) => {
  switch (action.type) {
    case FETCH_PLACES:
      axios.get(`${BASE_URL}/api/places`)
        .then((response) => {
          // aller placer response.data dans le state
          // => on dispatch une action qui sera traitée par le reducer
          const newAction = savePlaces(response.data);
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

export default placesMiddlewares;
