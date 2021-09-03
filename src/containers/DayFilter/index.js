import { connect } from 'react-redux';
import { setMapSelection } from 'src/actions/dayFilter';
// on importe le composant de présentation
import DayFilter from 'src/components/Map/DayFilter';

// === mapStateToProps
// si j'ai besoin de lire des informations dans le state
const mapStateToProps = (state) => ({
  // nom de la prop à remplir: élément à récupérer dans le state
  dates: state.progFilter.datesList,
});

// === mapDispatchToProps
// si j'ai besoin de dispatcher des actions vers le store (mettre à jour le state)
const mapDispatchToProps = (dispatch) => ({
  setMapSelection: (mapSelection) => {
    const action = setMapSelection(mapSelection);
    dispatch(action);
  },
});

// === création de l'assistant
export default connect(mapStateToProps, mapDispatchToProps)(DayFilter);
