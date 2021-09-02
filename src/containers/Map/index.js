import { connect } from 'react-redux';
import {
  setViewport,
  setSelectedEvent,
  setSelectedHoverEvent,
  setPopup,
  setIsShown,
  setGetOut,
} from 'src/actions/map';
// on importe le composant de présentation
import Map from 'src/components/Map';

// === mapStateToProps
// si j'ai besoin de lire des informations dans le state
const mapStateToProps = (state) => ({
  // nom de la prop à remplir: élément à récupérer dans le state
  viewport: state.map.viewport,
  selectedEvent: state.map.selectedEvent,
  selectedHoverEvent: state.map.selectedHoverEvent,
  popup: state.map.popup,
  isShown: state.map.isShown,
  events: state.map.eventsList,
  loadingMap: state.map.loadingMap,
  dates: state.progFilter.datesList,
  mapSelection: state.dayFilter.mapSelection,
});

// === mapDispatchToProps
// si j'ai besoin de dispatcher des actions vers le store (mettre à jour le state)
const mapDispatchToProps = (dispatch) => ({
  setViewport: (viewport) => {
    const action = setViewport(viewport);
    dispatch(action);
  // nom de la prop à remplir: fonction qui dispatch l'action
  },
  setSelectedEvent: (selectedEvent) => {
    const action = setSelectedEvent(selectedEvent);
    dispatch(action);
  },
  setSelectedHoverEvent: (selectedHoverEvent) => {
    const action = setSelectedHoverEvent(selectedHoverEvent);
    dispatch(action);
  },
  setPopup: () => {
    const action = setPopup();
    dispatch(action);
  },
  setIsShown: () => {
    const action = setIsShown();
    dispatch(action);
  },
  setGetOut: () => {
    const action = setGetOut();
    dispatch(action);
  },
});

// === création de l'assistant
export default connect(mapStateToProps, mapDispatchToProps)(Map);
