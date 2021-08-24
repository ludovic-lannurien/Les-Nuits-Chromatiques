import {
  SET_CURRENT, SET_PLACENAME, SET_PLACEADRESS, SET_PLACEZIP, SET_PLACECITY, SET_ONMOUSE,
} from 'src/actions/places';

const initialState = {
  // ici l'état initial
  current: 0,
  placeName: null,
  placeAdress: null,
  placeZip: null,
  placeCity: null,
  onMouse: false,
};

function placesReducer(state = initialState, action = {}) {
  switch (action.type) {
    case SET_CURRENT:
      return {
        ...state,
        current: action.current,
      };
    case SET_PLACENAME:
      return {
        ...state,
        placeName: action.placeName,
      };
    case SET_PLACEADRESS:
      return {
        ...state,
        placeAdress: action.placeAdress,
      };
    case SET_PLACEZIP:
      return {
        ...state,
        placeZip: action.placeZip,
      };
    case SET_PLACECITY:
      return {
        ...state,
        placeCity: action.placeCity,
      };
    case SET_ONMOUSE:
      return {
        ...state,
        onMouse: !state.onMouse,
      };
    default:
      return state;
  }
}

export default placesReducer;
