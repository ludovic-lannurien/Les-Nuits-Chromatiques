// === action types
export const SET_VIEWPORT = 'SET_VIEWPORT';
export const SET_SELECTED_EVENT = 'SET_SELECTED_EVENT';
export const SET_SELECTED_HOVER_EVENT = 'SET_SELECTED_HOVER_EVENT';
export const SET_POPUP = 'SET_POPUP';
export const SET_IS_SHOWN = 'SET_IS_SHOWN';
export const SET_GETOUT = 'SET_GETOUT';
export const FETCH_EVENTS = 'FETCH_EVENTS';
export const SAVE_EVENTS = 'SAVE_EVENTS';

// action creators
export const setViewport = (viewport) => ({
  type: SET_VIEWPORT,
  viewport: viewport,
});
export const setSelectedEvent = (selectedEvent) => ({
  type: SET_SELECTED_EVENT,
  selectedEvent: selectedEvent,
});
export const setSelectedHoverEvent = (selectedHoverEvent) => ({
  type: SET_SELECTED_HOVER_EVENT,
  selectedHoverEvent: selectedHoverEvent,
});
export const setPopup = () => ({
  type: SET_POPUP,
});

export const setGetOut = () => ({
  type: SET_GETOUT,
});

export const setIsShown = () => ({
  type: SET_IS_SHOWN,
});

export const fetchEvents = () => ({
  type: FETCH_EVENTS,
});

export const saveEvents = (events) => ({
  type: SAVE_EVENTS,
  events: events,
});
