import { connect } from 'react-redux';

// on importe le composant de présentation
import Prog from 'src/components/Prog';

// === mapStateToProps
// si j'ai besoin de lire des informations dans le state
const mapStateToProps = (state) => ({
  // nom de la prop à remplir: élément à récupérer dans le state
  artists: state.artists.artistsList,
  daySelected: state.progFilter.daySelected,
  clickOnSelectArtist: state.progFilter.clickOnSelectArtist,
  dates: state.progFilter.datesList,
});

// === mapDispatchToProps
// si j'ai besoin de dispatcher des actions vers le store (mettre à jour le state)
const mapDispatchToProps = (dispatch) => ({
  // nom de la prop à remplir: fonction qui dispatch l'action
});

// === création de l'assistant
export default connect(mapStateToProps, mapDispatchToProps)(Prog);
