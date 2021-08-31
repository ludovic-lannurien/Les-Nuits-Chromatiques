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
        <option value="0">Choisir votre date</option>
        <option value="Lundi 7 Mars">Lundi 7 Mars</option>
        <option value="Mardi 8 Mars">Mardi 8 Mars</option>
        <option value="Mercredi 9 Mars">Mercredi 9 Mars</option>
        <option value="Jeudi 10 Mars">Jeudi 10 Mars</option>
        <option value="Vendredi 11 Mars">Vendredi 11 Mars</option>
        <option value="Samedi 12 Mars">Samedi 12 Mars</option>
        <option value="Dimanche 13 Mars">Dimanche 13 Mars</option>
        <option value="Lundi 14 Mars">Lundi 14 Mars</option>
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
