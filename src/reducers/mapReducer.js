import {
  SET_VIEWPORT,
  SET_SELECTED_EVENT,
  SET_SELECTED_HOVER_EVENT,
  SET_POPUP,
  SET_IS_SHOWN,
  SET_GETOUT,
  SAVE_EVENTS,
} from 'src/actions/map';

const initialState = {
  viewport: {
    latitude: 47.324919762838725,
    longitude: 5.068414330682785,
    width: '100vw',
    height: '100vh',
    zoom: 12,
  },
  selectedEvent: null,
  selectedHoverEvent: null,
  popup: false,
  isShown: false,
  eventsList: [],
  loadingMap: true,
};

function mapReducer(state = initialState, action = {}) {
  switch (action.type) {
    case SET_VIEWPORT:
      return {
        ...state,
        viewport: action.viewport,
      };
    case SET_SELECTED_EVENT:
      return {
        ...state,
        selectedEvent: action.selectedEvent,
      };
    case SET_SELECTED_HOVER_EVENT:
      return {
        ...state,
        selectedHoverEvent: action.selectedHoverEvent,
      };
    case SET_POPUP:
      return {
        ...state,
        popup: !state.popup,
      };
    case SET_IS_SHOWN:
      return {
        ...state,
        isShown: !state.isShown,
      };
    case SET_GETOUT:
      return {
        ...state,
        isShown: false,
        popup: false,
      };
    case SAVE_EVENTS:
      return {
        ...state,
        loadingMap: !state.loadingMap,
        eventsList: action.events,
      };
    default:
      return state;
  }
}

export default mapReducer;
