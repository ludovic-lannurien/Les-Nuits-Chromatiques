import axios from 'axios';
import { FETCH_EVENTS, saveEvents } from '../actions/map';
import { FETCH_DATES, saveDates } from '../actions/artists';

const eventsMiddlewares = (store) => (next) => (action) => {
  // console.log('on a intercepté une action dans le middleware: ', action);

  switch (action.type) {
    case FETCH_EVENTS:
      axios.get('http://35.170.72.67/projet-les-nuits-chromatiques/public/api/events')
        .then((response) => {
          console.log(response);

          // aller placer response.data dans le state
          // => on dispatch une action qui sera traitée par le reducer
          const newAction = saveEvents(response.data);
          store.dispatch(newAction);
        })
        .catch((error) => {
          // console.log(error);
        });

      break;
    case FETCH_DATES:
      axios.get('http://35.170.72.67/projet-les-nuits-chromatiques/public/api/events')
        .then((response) => {
          const datesArray = [];
          console.log(response.data);
          const dataLoop = response.data.map((event) => {
            const newDatesArray = (event.startDatetime);
            return newDatesArray;
          });
          datesArray.push(dataLoop);
          // aller placer response.data dans le state
          // => on dispatch une action qui sera traitée par le reducer
          const newAction = saveDates(datesArray);
          store.dispatch(newAction);
        })
        .catch((error) => {
          // console.log(error);
        });

      break;

    default:
  }

  // on passe l'action au suivant (middleware suivant ou reducer)
  next(action);
};

export default eventsMiddlewares;
