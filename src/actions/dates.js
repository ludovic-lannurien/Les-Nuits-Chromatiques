// === action types
export const FETCH_DATES = 'FETCH_DATES';
// === action types
export const SAVE_DATES = 'SAVE_DATES';

export const saveDates = (dates) => ({
  type: SAVE_DATES,
  dates: dates,
});

export const fetchDates = () => ({
  type: FETCH_DATES,
});
