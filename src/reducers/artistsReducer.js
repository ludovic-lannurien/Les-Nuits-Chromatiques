import { SAVE_ARTISTS, SAVE_DATES } from 'src/actions/artists';

const initialState = {
  artistsList: [],
  datesList: [],
  artistsLoaded: false,
  artistDayTime: null,
};

function artistsReducer(state = initialState, action = {}) {
  switch (action.type) {
    case SAVE_ARTISTS:
      return {
        ...state,
        artistsList: action.artists,
      };
    case SAVE_DATES:
      return {
        ...state,
        datesList: action.dates,
      };

    default:
      return state;
  }
}

export default artistsReducer;
