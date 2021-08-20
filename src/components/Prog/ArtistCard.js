import React from 'react';
import PropTypes from 'prop-types';
import { Link } from 'react-router-dom';
import philippe from './katerine.jpg';

import './prog.scss';

const ArtistCard = ({ firstname }) => {
  console.log(firstname);
  return (
    <Link
      to="/artistes/slug"
      className="artist"
    >
      <a href="#"><h1>{firstname}</h1></a>
      <div className="picture">
        <a href="#"><img src={philippe} alt={firstname} /></a>
      </div>
    </Link>
  );
};

ArtistCard.propTypes = {
  firstname: PropTypes.string.isRequired,
};

export default ArtistCard;
