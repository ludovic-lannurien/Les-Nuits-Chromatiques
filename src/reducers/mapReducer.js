import {
  SET_VIEWPORT, SET_SELECTED_EVENT, SET_SELECTED_HOVER_EVENT, SET_POPUP, SET_IS_SHOWN,
} from 'src/actions/map';

const initialState = {
  viewport: {
    latitude: 47.3212,
    longitude: 5.0413,
    width: '100vw',
    height: '100vh',
    zoom: 12.5,
  },
  selectedEvent: null,
  selectedHoverEvent: null,
  popup: false,
  isShown: false,
};

function mapReducer(state = initialState, action = {}) {
  switch (action.type) {
    case SET_VIEWPORT:
      return {
        ...state,
        viewport: action.viewport,
      };
    default:
      return state;
  }
}

export default mapReducer;
