import { SET_DAY_SELECTED } from 'src/actions/progFilter';

const initialState = {
  daySelected: null,
};

function progFilterReducer(state = initialState, action = {}) {
  switch (action.type) {
    case SET_DAY_SELECTED:
      return {
        ...state,
        daySelected: action.daySelected,
      };
    default:
      return state;
  }
}

export default progFilterReducer;
