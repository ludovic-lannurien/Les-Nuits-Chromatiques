// == Import npm
import React from 'react';
import { NavLink, Link } from 'react-router-dom';

// == Import
import Logo from './logo.png';
import './nav.scss';

// == Composant
const Nav = () => (
  <nav className="nav">
    <button className="navbar__burger" type="button">
      <span className="burger-bar" />
    </button>
    <Link
      to="/"
    >
      <a href="#"><img src={Logo} alt="react logo" className="logo" /></a>
    </Link>

    <ul className="navList">
      <NavLink
        to="/"
        className="navbar__link"
        activeClassName="navbar__link--active"
        exact
      >
        <li className="navLink_element">Map</li>
      </NavLink>
      <NavLink
        to="/programmation"
        className="navbar__link"
        activeClassName="navbar__link--active"
      >
        <li className="navLink_element">Programmation</li>
      </NavLink>
      <NavLink
        to="/lieux"
        className="navbar__link"
        activeClassName="navbar__link--active"
      >
        <li className="navLink_element">Lieux</li>
      </NavLink>
      <NavLink
        to="/festival"
        className="navbar__link"
        activeClassName="navbar__link--active"
      >
        <li className="navLink_element">Festival</li>
      </NavLink>
    </ul>

  </nav>
);

// == Export
export default Nav;
