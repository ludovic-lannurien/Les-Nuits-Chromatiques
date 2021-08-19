// Mise en place de state pour faire marcher mapBox
const initialState = {
  dijonLatitude: 47.321212,
  dijonLongitude: 5.041350,
  zoom: 10,
  width: '100vw',
  height: '100vh',
};

function nameForTheReducer(state = initialState, action = {}) {
  switch (action.type) {
    default:
      return state;
  }
}

export default nameForTheReducer;
