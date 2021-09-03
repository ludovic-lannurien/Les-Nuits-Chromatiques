import { connect } from 'react-redux';
import {
  setCurrent,
  setPlaceName,
  setPlaceAdress,
  setPlaceZip,
  setPlaceCity,
  setOnMouse,
} from 'src/actions/places';

// on importe le composant de présentation
import Places from 'src/components/Places';

// === mapStateToProps
// si j'ai besoin de lire des informations dans le state
const mapStateToProps = (state) => ({
  // nom de la prop à remplir: élément à récupérer dans le state
  current: state.places.current,
  placeName: state.places.placeName,
  placeAdress: state.places.placeAdress,
  placeZip: state.places.placeZip,
  placeCity: state.places.placeCity,
  onMouse: state.places.onMouse,
  places: state.places.placesList,
});

// === mapDispatchToProps
// si j'ai besoin de dispatcher des actions vers le store (mettre à jour le state)
const mapDispatchToProps = (dispatch) => ({
  // nom de la prop à remplir: fonction qui dispatch l'action
  setPlaceName: (placeName) => {
    const action = setPlaceName(placeName);
    dispatch(action);
  // nom de la prop à remplir: fonction qui dispatch l'action
  },
  setPlaceAdress: (placeAdress) => {
    const action = setPlaceAdress(placeAdress);
    dispatch(action);
  // nom de la prop à remplir: fonction qui dispatch l'action
  },
  setPlaceZip: (placeZip) => {
    const action = setPlaceZip(placeZip);
    dispatch(action);
  // nom de la prop à remplir: fonction qui dispatch l'action
  },
  setPlaceCity: (placeCity) => {
    const action = setPlaceCity(placeCity);
    dispatch(action);
  // nom de la prop à remplir: fonction qui dispatch l'action
  },
  setOnMouse: () => {
    const action = setOnMouse();
    dispatch(action);
  },
  setCurrent: (current) => {
    const action = setCurrent(current);
    dispatch(action);
  },
});

// === création de l'assistant
export default connect(mapStateToProps, mapDispatchToProps)(Places);
