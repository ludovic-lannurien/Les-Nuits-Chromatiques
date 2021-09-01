/* eslint-disable jsx-a11y/label-has-associated-control */
// == Import npm
import React from 'react';
// import { getDateString, displayUniqueDate } from 'src/utils';
import PropTypes from 'prop-types';
import { getOnlyDate } from 'src/utils';
// == Import
import './progfilter.scss';

// == Composant
const ProgFilter = ({
  daySelected,
  setDaySelected,
  dates,
  setClickOnSelectArtist,
  unselectFilter,
}) => {
  console.log(dates);
  console.log(daySelected);
  return (
    <div className="progFilter">
      <select
        className="selectDays"
        onChange={(event) => {
          setClickOnSelectArtist();
          setDaySelected(event.currentTarget.value);
        }}
      >
        <option value="0" className="box-option">Choisir votre date</option>
        {Object.keys(dates).map((date) => (
          <option
            value={date}
            className="box-option"
            key={date}
          >
            {getOnlyDate(date)}
          </option>
        ))}
        <option value="0" className="box-option">Toutes les dates</option>
      </select>
      <button
        type="button"
        onClick={(event) => {
          event.preventDefault();
          unselectFilter();
        }}
      >Réinitialiser vos choix
      </button>
    </div>
  );
};
ProgFilter.propTypes = {
  daySelected: PropTypes.string,
  setDaySelected: PropTypes.func.isRequired,
  dates: PropTypes.shape({}).isRequired,
  setClickOnSelectArtist: PropTypes.func.isRequired,
  unselectFilter: PropTypes.func.isRequired,
};
ProgFilter.defaultProps = {
  daySelected: null,
};
// == Export
export default ProgFilter;
