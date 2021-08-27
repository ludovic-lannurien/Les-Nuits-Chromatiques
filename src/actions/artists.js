// === action types
export const FETCH_ARTISTS = 'FETCH_ARTISTS';
export const SAVE_ARTISTS = 'SAVE_ARTISTS';
export const FETCH_DATES = 'FETCH_DATES';
export const SAVE_DATES = 'SAVE_DATES';

// action creators
export const fetchArtists = () => ({
  type: FETCH_ARTISTS,
});
export const saveArtists = (artists) => ({
  type: SAVE_ARTISTS,
  artists: artists,
});

export const fetchDates = () => ({
  type: FETCH_DATES,
});

export const saveDates = (dates) => ({
  type: SAVE_DATES,
  dates: dates,
});
