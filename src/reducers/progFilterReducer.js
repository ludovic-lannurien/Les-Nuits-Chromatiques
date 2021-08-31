import { SET_DAY_SELECTED } from 'src/actions/progFilter';
import { SAVE_DATES } from 'src/actions/dates';

const initialState = {
  daySelected: null,
  datesList: [],
};

function progFilterReducer(state = initialState, action = {}) {
  switch (action.type) {
    case SET_DAY_SELECTED:
      return {
        ...state,
        daySelected: action.daySelected,
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

export default progFilterReducer;
