import { connect } from 'react-redux';
import { handleShowLinks, handleHideLinks } from 'src/actions/nav';
// on importe le composant de présentation
import Nav from 'src/components/Nav';

// === mapStateToProps
// si j'ai besoin de lire des informations dans le state
const mapStateToProps = (state) => ({
  // nom de la prop à remplir: élément à récupérer dans le state
  showLinks: state.nav.showLinks,
});

// === mapDispatchToProps
// si j'ai besoin de dispatcher des actions vers le store (mettre à jour le state)
const mapDispatchToProps = (dispatch) => ({

  handleShowLinks: () => {
    const action = handleShowLinks();
    dispatch(action);
  },
  handleHideLinks: () => {
    const action = handleHideLinks();
    dispatch(action);
  },
});

// === création de l'assistant
export default connect(mapStateToProps, mapDispatchToProps)(Nav);
