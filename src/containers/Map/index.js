import { connect } from 'react-redux';
import { setViewport } from 'src/actions/map';
// on importe le composant de présentation
import Map from 'src/components/Map';

// === mapStateToProps
// si j'ai besoin de lire des informations dans le state
const mapStateToProps = (state) => ({
  // nom de la prop à remplir: élément à récupérer dans le state
  viewport: state.map.viewport,
});

// === mapDispatchToProps
// si j'ai besoin de dispatcher des actions vers le store (mettre à jour le state)
const mapDispatchToProps = (dispatch) => ({
  setViewport: (viewport) => {
    const action = setViewport(viewport);
    dispatch(action);
  // nom de la prop à remplir: fonction qui dispatch l'action
  },
});

// === création de l'assistant
export default connect(mapStateToProps, mapDispatchToProps)(Map);
