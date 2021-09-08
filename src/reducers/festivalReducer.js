import { SET_GIF_ONCLICK } from 'src/actions/festival';

const initialState = {
  gifOnClick: false,
};

function festivalReducer(state = initialState, action = {}) {
  switch (action.type) {
    case SET_GIF_ONCLICK:
      return {
        ...state,
        gifOnClick: !state.gifOnClick,
      };
    default:
      return state;
  }
}

export default festivalReducer;
