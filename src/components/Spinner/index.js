// == Import npm
import React from 'react';

import cible from './cible.png';
// == Import
import './spinner.scss';

// == Composant
const Spinner = () => (
  <div className="spinner-container">
    <img src={cible} alt="spinner" className="spinner" />
  </div>
);

// == Export
export default Spinner;
