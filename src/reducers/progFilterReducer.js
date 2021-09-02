import { SET_DAY_SELECTED, SET_CLICK_ON_SELECT_ARTIST, UNSELECT_FILTER } from 'src/actions/progFilter';
import { SAVE_DATES } from 'src/actions/dates';

const initialState = {
  daySelected: null,
  datesList: [],
  clickOnSelectArtist: false,
  optionNull: null,
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
    case SET_CLICK_ON_SELECT_ARTIST:
      return {
        ...state,
        clickOnSelectArtist: true,
      };
    case UNSELECT_FILTER:
      return {
        ...state,
        clickOnSelectArtist: false,
        daySelected: null,
      };
    default:
      return state;
  }
}

export default progFilterReducer;
