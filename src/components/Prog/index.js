/* eslint-disable max-len */
// == Import npm
import React from 'react';
import PropTypes from 'prop-types';
import ProgFilter from 'src/containers/ProgFilter';
import ArtistCard from './ArtistCard';

// == Import
import './prog.scss';

// == Composant
const Prog = ({ artists, daySelected }) => {
  if (daySelected === !null) {
    const artistByDay = 'la condition est passe';
    return artistByDay;
  }
  console.log(`depuis Prog ${daySelected}`);
  return (
    <div className="prog">
      <ProgFilter />
      <div className="row">

        {daySelected === null
        ? artists.map((artist) => (
        <ArtistCard
          daySelected={daySelected}
          {...artist}
          key={artist.id}
        />
        ))
        : artists.filter(artistByDate => artistByDate.events.startDatetime.includes(daySelected)).map(artist) => (
        <ArtistCard
          daySelected={daySelected}
          {...artist}
          key={artist.id}
        />
        ))
        },
      </div>
    </div>
  );
};

Prog.propTypes = {
  daySelected: PropTypes.string,
  artists: PropTypes.arrayOf(
    PropTypes.shape({
      id: PropTypes.number.isRequired,
    }),
  ).isRequired,
};
Prog.defaultProps = {
  daySelected: null,
};
// == Export
export default Prog;
