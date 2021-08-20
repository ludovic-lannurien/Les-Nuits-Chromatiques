import React from 'react';
import PropTypes from 'prop-types';
import philippe from './katerine.jpg';

import './prog.scss';

const ArtistCard = ({ firstname }) => {
  console.log(firstname);
  return (
    <div className="artist">
      <a href="#"><h1>{firstname}</h1></a>
      <div className="picture">
        <a href="#"><img src={philippe} alt={firstname} /></a>
      </div>
    </div>
  );
};

ArtistCard.propTypes = {
  firstname: PropTypes.string.isRequired,
};

export default ArtistCard;
