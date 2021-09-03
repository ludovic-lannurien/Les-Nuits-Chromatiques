// === action types
export const SET_DAY_SELECTED = 'SET_DAYS_OPTIONS';
export const SET_CLICK_ON_SELECT_ARTIST = 'SET_CLICK_ON_SELECT_ARTIST';
export const UNSELECT_FILTER = 'UNSELECT_FILTER';

export const setDaySelected = (daySelected) => ({
  type: SET_DAY_SELECTED,
  daySelected: daySelected,
});

export const setClickOnSelectArtist = () => ({
  type: SET_CLICK_ON_SELECT_ARTIST,
});

export const unselectFilter = () => ({
  type: UNSELECT_FILTER,
});
