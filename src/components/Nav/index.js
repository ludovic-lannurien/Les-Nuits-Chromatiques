// == Import npm
import React from 'react';

// == Import
import Logo from './logo.png';
import './nav.scss';

// == Composant
const Nav = () => (
  <nav className="nav">
    <img src={Logo} alt="react logo" className="logo" />
    <ul className="navList">
      <li>Map</li>
      <li>Programmation</li>
      <li>Lieux</li>
      <li>Festival</li>
    </ul>
  </nav>
);

// == Export
export default Nav;
