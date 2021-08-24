// === action types
export const SET_VIEWPORT = 'SET_VIEWPORT';
export const SET_SELECTED_EVENT = 'SET_SELECTED_EVENT';
export const SET_SELECTED_HOVER_EVENT = 'SET_SELECTED_HOVER_EVENT';
export const SET_POPUP = 'SET_POPUP';
export const SET_IS_SHOWN = 'SET_IS_SHOWN';

// action creators
export const setViewport = (viewport) => ({
  type: SET_VIEWPORT,
  viewport: viewport,
});
export const setSelectedEvent = () => ({
  type: SET_SELECTED_EVENT,
});
export const setSelectedHoverEvent = () => ({
  type: SET_SELECTED_HOVER_EVENT,
});
export const setPopup = () => ({
  type: SET_POPUP,
});
export const setIsShown = () => ({
  type: SET_IS_SHOWN,
});
