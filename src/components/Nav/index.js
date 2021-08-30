// == Import npm
import React from 'react';
import { NavLink, Link } from 'react-router-dom';
import PropTypes from 'prop-types';

// == Import
import Logo from './logo.png';
import './nav.scss';

// == Composant
const Nav = ({ handleShowLinks, showLinks, handleHideLinks }) => (
  <nav className={`nav ${showLinks ? 'show-nav' : 'hide-nav'} `}>
    <button
      className="navbar__burger"
      type="button"
      onClick={handleShowLinks}
    >
      <span className="burger-bar" />
    </button>
    <Link
      to="/"
    >
      <img src={Logo} alt="react logo" className="logo" />
    </Link>

    <ul className="navList">
      <NavLink
        to="/"
        className="navbar__link"
        activeClassName="navbar__link--active"
        onClick={handleHideLinks}
        exact
      >
        <li className="navLink_element">Map</li>
      </NavLink>
      <NavLink
        to="/programmation"
        className="navbar__link"
        activeClassName="navbar__link--active"
        onClick={handleHideLinks}
      >
        <li className="navLink_element">Programmation</li>
      </NavLink>
      <NavLink
        to="/lieux"
        className="navbar__link"
        activeClassName="navbar__link--active"
        onClick={handleHideLinks}
      >
        <li className="navLink_element">Lieux</li>
      </NavLink>
      <NavLink
        to="/festival"
        className="navbar__link"
        activeClassName="navbar__link--active"
        onClick={handleHideLinks}
      >
        <li className="navLink_element">Festival</li>
      </NavLink>
    </ul>

  </nav>
);

Nav.propTypes = {
  handleShowLinks: PropTypes.func.isRequired,
  showLinks: PropTypes.bool.isRequired,
  handleHideLinks: PropTypes.func.isRequired,
};

// == Export
export default Nav;
