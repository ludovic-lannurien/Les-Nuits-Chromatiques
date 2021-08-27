import { connect } from 'react-redux';

// on importe le composant de présentation
import App from 'src/components/App';
import { fetchArtists, fetchDates } from '../../actions/artists';
import { fetchEvents } from '../../actions/map';
import { fetchPlaces } from '../../actions/places';

// === mapStateToProps
// si j'ai besoin de lire des informations dans le state
const mapStateToProps = (state) => ({
  // nom de la prop à remplir: élément à récupérer dans le state
});

// === mapDispatchToProps
// si j'ai besoin de dispatcher des actions vers le store (mettre à jour le state)
const mapDispatchToProps = (dispatch) => ({
  // nom de la prop à remplir: fonction qui dispatch l'action
  loadArtists: () => {
    dispatch(fetchArtists());
  },
  loadEvents: () => {
    dispatch(fetchEvents());
  },
  loadPlaces: () => {
    dispatch(fetchPlaces());
  },
  loadDates: () => {
    dispatch(fetchDates());
  },
});

// === création de l'assistant
export default connect(mapStateToProps, mapDispatchToProps)(App);
