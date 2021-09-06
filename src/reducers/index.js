import { combineReducers } from 'redux';

// on importe tous les reducers
import mapReducer from './mapReducer';
import placesReducer from './placesReducer';
import artistsReducer from './artistsReducer';
import navReducer from './navReducer';
import progFilterReducer from './progFilterReducer';
import dayFilterReducer from './dayFilterReducer';
import festivalReducer from './festivalReducer';

// le reducer principal, qui regroupe les autres
// combineReducers prend en argument un objet qui indique un nom pour
// chaque reducer
const rootReducer = combineReducers({
  // on crée un tiroir qui s'appelle recipes, et c'est recipesReducer qui
  // va gérer les données dans ce tiroir
  map: mapReducer,
  places: placesReducer,
  artists: artistsReducer,
  nav: navReducer,
  progFilter: progFilterReducer,
  dayFilter: dayFilterReducer,
  festival: festivalReducer,
});

export default rootReducer;
