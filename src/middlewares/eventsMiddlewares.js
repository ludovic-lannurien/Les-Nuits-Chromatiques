import axios from 'axios';
import { FETCH_EVENTS, saveEvents } from '../actions/map';

const eventsMiddlewares = (store) => (next) => (action) => {
  // console.log('on a intercepté une action dans le middleware: ', action);

  switch (action.type) {
    case FETCH_EVENTS:
      console.log('on va envoyer une requête pour récupérer les recettes');
      axios.get('http://35.170.72.67/projet-les-nuits-chromatiques/public/api/events')
        .then((response) => {
          console.log(response);

          // aller placer response.data dans le state
          // => on dispatch une action qui sera traitée par le reducer
          const newAction = saveEvents(response.data);
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

export default eventsMiddlewares;
