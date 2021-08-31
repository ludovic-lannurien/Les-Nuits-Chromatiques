import { connect } from 'react-redux';

// on importe le composant de présentation
import App from 'src/components/App';
import { fetchEvents } from '../../actions/map';
import { fetchPlaces } from '../../actions/places';
import { fetchArtists } from '../../actions/artists';
import { fetchDates } from '../../actions/dates';

// === mapStateToProps
// si j'ai besoin de lire des informations dans le state
const mapStateToProps = (state) => ({
  // nom de la prop à remplir: élément à récupérer dans le state
  artistsLoaded: state.artists.artistsLoaded,
});

// === mapDispatchToProps
// si j'ai besoin de dispatcher des actions vers le store (mettre à jour le state)
const mapDispatchToProps = (dispatch) => ({
  // nom de la prop à remplir: fonction qui dispatch l'action
  loadEvents: () => {
    dispatch(fetchEvents());
  },
  loadPlaces: () => {
    dispatch(fetchPlaces());
  },
  loadArtists: () => {
    dispatch(fetchArtists());
  },
  loadDates: () => {
    dispatch(fetchDates());
  },
});

// === création de l'assistant
export default connect(mapStateToProps, mapDispatchToProps)(App);
