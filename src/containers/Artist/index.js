import { connect } from 'react-redux';

// on importe le composant de présentation
import Artist from 'src/components/Prog/Artist';
import { fetchArtists } from '../../actions/artists';

// === mapStateToProps
// si j'ai besoin de lire des informations dans le state
const mapStateToProps = (state) => ({
  // nom de la prop à remplir: élément à récupérer dans le state
  artists: state.artists.artistsList,
});

// === mapDispatchToProps
// si j'ai besoin de dispatcher des actions vers le store (mettre à jour le state)
const mapDispatchToProps = (dispatch) => ({
  // nom de la prop à remplir: fonction qui dispatch l'action
  loadArtists: () => {
    dispatch(fetchArtists());
  },
});

// === création de l'assistant
export default connect(mapStateToProps, mapDispatchToProps)(Artist);
