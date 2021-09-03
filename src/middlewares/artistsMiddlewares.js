import axios from 'axios';
import { FETCH_ARTISTS, saveArtists } from '../actions/artists';
import { BASE_URL } from '../utils';

const artistsMiddlewares = (store) => (next) => (action) => {
  switch (action.type) {
    case FETCH_ARTISTS:

      axios.get(`${BASE_URL}/api/artists`)
        .then((response) => {
          // aller placer response.data dans le state
          // => on dispatch une action qui sera traitée par le reducer
          const newAction = saveArtists(response.data);
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

export default artistsMiddlewares;
