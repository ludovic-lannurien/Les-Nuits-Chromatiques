import React from 'react';
import PropTypes from 'prop-types';
import philippe from './katerine.jpg';

const ArtistCard = ({ firstname }) => {
  console.log(firstname);
  return (
    <div className="artist">
      <a href="#"><h1>{firstname}</h1></a>
      <a href="#"><img src={philippe} alt={firstname} /></a>
    </div>
  );
};

ArtistCard.propTypes = {
  firstname: PropTypes.string.isRequired,
};

export default ArtistCard;
