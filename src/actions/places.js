// === action types
export const SET_CURRENT = 'SET_CURRENT';
export const SET_PLACENAME = 'SET_PLACENAME';
export const SET_PLACEADRESS = 'SET_PLACEADRESS';
export const SET_PLACEZIP = 'SET_PLACEZIP';
export const SET_PLACECITY = 'SET_PLACECITY';
export const SET_ONMOUSE = 'SET_ONMOUSE';
export const FETCH_PLACES = 'FETCH_PLACES';
export const SAVE_PLACES = 'SAVE_PLACES';

// action creators
export const setCurrent = (current) => ({
  type: SET_CURRENT,
  current: current,
});
export const setPlaceName = (placeName) => ({
  type: SET_PLACENAME,
  placeName: placeName,
});
export const setPlaceAdress = (placeAdress) => ({
  type: SET_PLACEADRESS,
  placeAdress: placeAdress,
});
export const setPlaceZip = (placeZip) => ({
  type: SET_PLACEZIP,
  placeZip: placeZip,
});
export const setPlaceCity = (placeCity) => ({
  type: SET_PLACECITY,
  placeCity: placeCity,
});
export const setOnMouse = () => ({
  type: SET_ONMOUSE,
});

export const fetchPlaces = () => ({
  type: FETCH_PLACES,
});
export const savePlaces = (places) => ({
  type: SAVE_PLACES,
  places: places,
});
