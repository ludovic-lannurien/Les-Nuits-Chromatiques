import { SET_MAP_SELECTION } from 'src/actions/dayFilter';
import { SAVE_DATES } from 'src/actions/dates';

const initialState = {
  mapSelection: '2022-03-07',
  datesList: [],
};

function dayFilterReducer(state = initialState, action = {}) {
  switch (action.type) {
    case SET_MAP_SELECTION:
      return {
        ...state,
        mapSelection: action.mapSelection,
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

export default dayFilterReducer;
