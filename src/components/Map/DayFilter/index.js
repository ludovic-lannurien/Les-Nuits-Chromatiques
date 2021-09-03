/* eslint-disable jsx-a11y/label-has-associated-control */
// == Import npm
import React from 'react';
// import { getDateString, displayUniqueDate } from 'src/utils';
import PropTypes from 'prop-types';
import { getOnlyDate } from 'src/utils';

// == Import
import './dayfilter.scss';

// == Composant
const DayFilter = ({
  setMapSelection,
  dates,
}) => (
  <div className="dayFilter">
    <select
      className="selectMapDays"
      onChange={(event) => {
        setMapSelection(event.currentTarget.value);
      }}
    >
      {Object.keys(dates).map((date) => (
        <option
          value={date}
          className="box-option-map"
          key={date}
        >
          {getOnlyDate(date)}
        </option>
      ))}
    </select>
  </div>
);
DayFilter.propTypes = {
  setMapSelection: PropTypes.func.isRequired,
  dates: PropTypes.shape({}).isRequired,
};

// == Export
export default DayFilter;
