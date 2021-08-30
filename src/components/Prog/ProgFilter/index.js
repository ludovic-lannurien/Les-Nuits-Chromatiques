// == Import npm
import React from 'react';
// import { getDateString, displayUniqueDate } from 'src/utils';

// == Import
import './progfilter.scss';

// == Composant
const ProgFilter = () => (
  <div className="progfilter">
    <select name="day" id="day-select">
      <option value="0">Choisir un jour</option>
      <option value="7">Lundi 7 Mars 2022</option>
      <option value="8">Mardi 8 Mars 2022</option>
      <option value="9">Mercredi 9 Mars 2022</option>
      <option value="10">Jeudi 10 Mars 2022</option>
      <option value="11">Vendredi 11 Mars 2022</option>
      <option value="12">Samedi 12 Mars 2022</option>
      <option value="13">Dimanche 13 Mars 2022</option>
      <option value="14">Lundi 14 Mars 2022</option>
      <option value="15">Mardi 15 Mars 2022</option>
      <option value="16">Mercredi 16 Mars 2022</option>
    </select>
  </div>
);

// == Export
export default ProgFilter;
