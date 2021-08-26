import { SAVE_ARTISTS } from 'src/actions/artists';

const initialState = {
  artistsList: [],
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

    default:
      return state;
  }
}

export default artistsReducer;
