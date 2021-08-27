// == Import npm
import React from 'react';
import PropTypes from 'prop-types';
import { getDateString, displayUniqueDate } from 'src/utils';

// == Import
import './progfilter.scss';

// == Composant
const ProgFilter = ({ artists, dates }) => {
  console.log(dates);
  return (
    <div className="progfilter">
      <li><a href="#">Par jour</a></li>
      <li><a href="#">Par genre</a></li>
      <select name="pets" id="pet-select">
        <option value="">Choisir un jour</option>
        <option value="">Lundi 7 Mars 2022</option>
        {artists.map((artist) => (
          artist.events.map((event) => (
            <option value="">{getDateString(event.startDatetime)}</option>
          ))
        ))}
      </select>
    </div>
  );
};
ProgFilter.propTypes = {
  artists: PropTypes.arrayOf(
    PropTypes.shape({
    }).isRequired,
  ).isRequired,
  dates: PropTypes.arrayOf(
  ).isRequired,
};
// == Export
export default ProgFilter;
