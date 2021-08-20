// == Import npm
import React from 'react';
import PropTypes from 'prop-types';

// == Import
import './prog.scss';

// == Composant
const Prog = ({ artists }) => {
  console.log(artists);
  return (
    <div className="prog">
      {artists.map((artist) => (
        <div className="row">
          <div className="artist">
            <a><img src="katerine.jpg" alt="katerine" /></a>
            <a><h1>{artist.firstname}</h1></a>
            <p>lorem</p>
            <p>lorem</p>
            <a href="#" className="lieu">genre</a>
            <a href="#" className="voir">voir plus</a>
          </div>
        </div>
      ))}
    </div>
  );
};

Prog.propTypes = {
  artists: PropTypes.arrayOf(
    PropTypes.shape({
      artists: PropTypes.shape.isRequired,
    }),
  ).isRequired,
};

// == Export
export default Prog;
