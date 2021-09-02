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
  mapSelection,
  setmapSelection,
  dates,
}) => {
  console.log(dates);
  console.log(mapSelection);
  return (
    <div className="dayFilter">
      <select
        className="selectDays"
        onChange={(event) => {
          setmapSelection(event.currentTarget.value);
        }}
      >
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
    </div>
  );
};
DayFilter.propTypes = {
  mapSelection: PropTypes.string,
  setmapSelection: PropTypes.func.isRequired,
  dates: PropTypes.shape({}).isRequired,
};
DayFilter.defaultProps = {
  mapSelection: null,
};

// == Export
export default DayFilter;
