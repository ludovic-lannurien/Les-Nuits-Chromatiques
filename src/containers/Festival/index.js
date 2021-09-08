import { connect } from 'react-redux';
import { setGifOnClick } from 'src/actions/festival';
// on importe le composant de présentation
import Festival from 'src/components/Festival';

// === mapStateToProps
// si j'ai besoin de lire des informations dans le state
const mapStateToProps = (state) => ({
  // nom de la prop à remplir: élément à récupérer dans le state
  gifOnClick: state.festival.gifOnClick,
});

// === mapDispatchToProps
// si j'ai besoin de dispatcher des actions vers le store (mettre à jour le state)
const mapDispatchToProps = (dispatch) => ({
  setGifOnClick: () => {
    const action = setGifOnClick();
    dispatch(action);
  },
});

// === création de l'assistant
export default connect(mapStateToProps, mapDispatchToProps)(Festival);
