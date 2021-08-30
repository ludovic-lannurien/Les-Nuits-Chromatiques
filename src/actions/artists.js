// === action types
export const FETCH_ARTISTS = 'FETCH_ARTISTS';
export const SAVE_ARTISTS = 'SAVE_ARTISTS';

// action creators
export const fetchArtists = () => ({
  type: FETCH_ARTISTS,
});
export const saveArtists = (artists) => ({
  type: SAVE_ARTISTS,
  artists: artists,
});
