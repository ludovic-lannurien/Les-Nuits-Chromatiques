import { SAVE_ARTISTS } from 'src/actions/artists';

const initialState = {
  artistsList: [],
  artistsLoaded: false,
};

function artistsReducer(state = initialState, action = {}) {
  switch (action.type) {
    case SAVE_ARTISTS:
      return {
        ...state,
        artistsList: action.artists,
        artistsLoaded: true,
      };

    default:
      return state;
  }
}

export default artistsReducer;
