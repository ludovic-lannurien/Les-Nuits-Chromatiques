// == Import npm
import React from 'react';

// == Import
import Logo from './logo.png';
import './nav.scss';

// == Composant
const Nav = () => (
  <nav className="nav">
    <button className="navbar__burger" type="button">
      <span className="burger-bar" />
    </button>
    <a href="#"><img src={Logo} alt="react logo" className="logo" /></a>
    <ul className="navList">
      <a href="#" className="navbar__link">
        <li className="navLink_element"><span>Map</span></li>
      </a>
      <a href="#">
        <li href="#" className="navLink_element">Programmation</li>
      </a>
      <a href="#">
        <li href="#" className="navLink_element">Lieux</li>
      </a>
      <a href="#">
        <li href="#" className="navLink_element">Festival</li>
      </a>
    </ul>

  </nav>
);

// == Export
export default Nav;
