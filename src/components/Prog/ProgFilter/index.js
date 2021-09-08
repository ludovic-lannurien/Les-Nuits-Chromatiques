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
  clickOnSelectArtist,
}) => (
  <div className="progFilter">
    <select
      className="selectDays"
      onChange={(event) => {
        setClickOnSelectArtist();
        setDaySelected(event.currentTarget.value);
      }}
    >
      {!clickOnSelectArtist && (
      <option className="box-option" disabled selected value="null">
        Choisir votre date
      </option>
      )}
      {Object.keys(dates).map((date) => (
        <option
          value={date}
          className="box-option"
          key={date}
        >
          {getOnlyDate(date)}
        </option>
      ))}
    </select>
    <button
      type="button"
      className="reinitDays"
      onClick={(event) => {
        event.preventDefault();
        unselectFilter();
      }}
    >Réinitialiser
    </button>
  </div>
);
ProgFilter.propTypes = {
  clickOnSelectArtist: PropTypes.bool.isRequired,
  daySelected: PropTypes.string,
  setDaySelected: PropTypes.func.isRequired,
  dates: PropTypes.shape({}).isRequired,
  setClickOnSelectArtist: PropTypes.func.isRequired,
  unselectFilter: PropTypes.func.isRequired,
  optionNull: PropTypes.string,
};
ProgFilter.defaultProps = {
  daySelected: null,
  optionNull: null,
};
// == Export
export default ProgFilter;
