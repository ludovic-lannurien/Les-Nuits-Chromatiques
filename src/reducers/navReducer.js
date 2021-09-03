import { HANDLE_SHOWLINKS, HANDLE_HIDELINKS } from 'src/actions/nav';

const initialState = {
  showLinks: false,
};

function navReducer(state = initialState, action = {}) {
  switch (action.type) {
    case HANDLE_SHOWLINKS:
      return {
        ...state,
        showLinks: !state.showLinks,
      };
    case HANDLE_HIDELINKS:
      return {
        ...state,
        showLinks: false,
      };
    default:
      return state;
  }
}

export default navReducer;
