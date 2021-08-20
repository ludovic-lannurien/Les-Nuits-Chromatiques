import React from 'react';
import PropTypes from 'prop-types';

const ArtistCard = ({ firstname }) => {
  console.log(firstname);
  return (
    <div className="artist">
      <a><h1>{firstname}</h1></a>
    </div>
  );
};

ArtistCard.propTypes = {
  firstname: PropTypes.string.isRequired,
};

export default ArtistCard;
