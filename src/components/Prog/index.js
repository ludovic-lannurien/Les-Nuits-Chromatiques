// == Import npm
import React from 'react';
import PropTypes from 'prop-types';

import ProgFilter from './ProgFilter';
import ArtistCard from './ArtistCard';

// == Import
import './prog.scss';

// == Composant
const Prog = ({ artists }) => {
  console.log(artists);
  return (
    <div className="prog">
      <ProgFilter />
      <div className="row">
        {artists.map((artist) => (
          <ArtistCard
            {...artist}
            key={artist.id}
          />
        ))}
      </div>
    </div>
  );
};

Prog.propTypes = {
  artists: PropTypes.arrayOf(
    PropTypes.shape({
      id: PropTypes.number.isRequired,
    }),
  ).isRequired,
};

// == Export
export default Prog;
