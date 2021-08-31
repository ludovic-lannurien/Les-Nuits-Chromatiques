import { connect } from 'react-redux';
import { setDaySelected } from 'src/actions/progFilter';
// on importe le composant de présentation
import ProgFilter from 'src/components/Prog/ProgFilter';

// === mapStateToProps
// si j'ai besoin de lire des informations dans le state
const mapStateToProps = (state) => ({
  // nom de la prop à remplir: élément à récupérer dans le state
  daySelected: state.progFilter.daySelected,
});

// === mapDispatchToProps
// si j'ai besoin de dispatcher des actions vers le store (mettre à jour le state)
const mapDispatchToProps = (dispatch) => ({
  setDaySelected: (daySelected) => {
    const action = setDaySelected(daySelected);
    dispatch(action);
  },
});

// === création de l'assistant
export default connect(mapStateToProps, mapDispatchToProps)(ProgFilter);
