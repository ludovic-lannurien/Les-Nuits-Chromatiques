import axios from 'axios';
import { FETCH_PLACES, savePlaces } from '../actions/places';

const placesMiddlewares = (store) => (next) => (action) => {
  // console.log('on a intercepté une action dans le middleware: ', action);

  switch (action.type) {
    case FETCH_PLACES:
      console.log('on va envoyer une requête pour récupérer les recettes');
      axios.get('http://35.170.72.67/projet-les-nuits-chromatiques/public/api/places')
        .then((response) => {
          console.log(response);

          // aller placer response.data dans le state
          // => on dispatch une action qui sera traitée par le reducer
          const newAction = savePlaces(response.data);
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

export default placesMiddlewares;
