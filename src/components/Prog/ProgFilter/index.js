/* eslint-disable jsx-a11y/label-has-associated-control */
// == Import npm
import React from 'react';
// import { getDateString, displayUniqueDate } from 'src/utils';
import PropTypes from 'prop-types';
import { getOnlyDate } from 'src/utils';
// == Import
import './progfilter.scss';

// == Composant
const ProgFilter = ({ daySelected, setDaySelected, dates }) => {
  console.log('pamplemousse');
  console.log(dates);
  return (
    <div className="progFilter">
      <select
        className="selectDays"
        onChange={(event) => {
          setDaySelected(event.currentTarget.value);
        }}
      >
        <option value="0" className="box-option">Choisir votre date</option>
        {Object.keys(dates).map((date) => (
          <option
            value={date}
            className="box-option"
            key={date.id}
          >
            {getOnlyDate(date)}
          </option>
        ))}
      </select>
    </div>
  );
};
ProgFilter.propTypes = {
  daySelected: PropTypes.string,
  setDaySelected: PropTypes.func.isRequired,
  dates: PropTypes.shape({}).isRequired,
};
ProgFilter.defaultProps = {
  daySelected: null,
};
// == Export
export default ProgFilter;
