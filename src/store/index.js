import { createStore, applyMiddleware } from 'redux';
import { composeWithDevTools } from 'redux-devtools-extension';

import reducer from 'src/reducers';
import artistsMiddlewares from '../middlewares/artistsMiddlewares';
import eventsMiddlewares from '../middlewares/eventsMiddlewares';
import placesMiddlewares from '../middlewares/placesMiddlewares';

// on combine devTools avec les middlewares
const enhancers = composeWithDevTools(
  applyMiddleware(
    artistsMiddlewares,
    eventsMiddlewares,
    placesMiddlewares,
    // ... d'autres middlewares
  ),
);

const store = createStore(
  // reducer
  reducer,
  // enhancer
  enhancers,
);

export default store;
