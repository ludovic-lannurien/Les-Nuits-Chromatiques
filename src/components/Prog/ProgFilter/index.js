/* eslint-disable jsx-a11y/label-has-associated-control */
// == Import npm
import React from 'react';
// import { getDateString, displayUniqueDate } from 'src/utils';
import PropTypes from 'prop-types';
// == Import
import './progfilter.scss';

// == Composant
const ProgFilter = ({ daySelected, setDaySelected }) => {
  console.log(daySelected);
  return (
    <div className="progFilter">
      <select
        className="selectDays"
        onChange={(event) => {
          setDaySelected(event.currentTarget.value);
        }}
      >
        <option value="0" className="box-option">Choisir votre date</option>
        <option value="Lundi 7 Mars" className="box-option">Lundi 7 Mars</option>
        <option value="Mardi 8 Mars" className="box-option">Mardi 8 Mars</option>
        <option value="Mercredi 9 Mars" className="box-option">Mercredi 9 Mars</option>
        <option value="Jeudi 10 Mars" className="box-option">Jeudi 10 Mars</option>
        <option value="Vendredi 11 Mars" className="box-option">Vendredi 11 Mars</option>
        <option value="Samedi 12 Mars" className="box-option">Samedi 12 Mars</option>
        <option value="Dimanche 13 Mars" className="box-option">Dimanche 13 Mars</option>
        <option value="Lundi 14 Mars" className="box-option">Lundi 14 Mars</option>
      </select>
    </div>
  );
};
ProgFilter.propTypes = {
  daySelected: PropTypes.string,
  setDaySelected: PropTypes.func.isRequired,
};
ProgFilter.defaultProps = {
  daySelected: null,
};
// == Export
export default ProgFilter;
