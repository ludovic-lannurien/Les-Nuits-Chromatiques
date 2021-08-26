// == Import npm
import React from 'react';
import { getDateString } from 'src/utils';

// == Import
import './progfilter.scss';

// == Composant
const ProgFilter = ({ artists }) => (
  <ul className="progfilter">
    <li><a href="#">Par jour</a></li>
    <li><a href="#">Par genre</a></li>
    <select name="pets" id="pet-select">
      <option value="">Choisir un jour</option>
      {artists.map((artist) => (
        artist.events.map((event) => (
          <option value="">{getDateString(event.startDatetime)}</option>
        ))
      ))}
    </select>
  </ul>
);

// == Export
export default ProgFilter;
