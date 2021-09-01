/* eslint-disable max-len */
// == Import npm
import React from 'react';
import PropTypes from 'prop-types';
import ProgFilter from 'src/containers/ProgFilter';
import ArtistCard from './ArtistCard';

// == Import
import './prog.scss';

// == Composant
const Prog = ({
  artists, daySelected, clickOnSelectArtist, dates,
}) => {
  console.log(dates);
  const artistByDates = Object.keys(dates).filter((date) => date.includes(daySelected));
  console.log(artistByDates);

  return (
    <div className="prog">
      <ProgFilter />
      <div className="row">
        {!clickOnSelectArtist && (
          artists.map((artist) => (
            <ArtistCard
              {...artist}
              key={artist.id}
            />
          ))
        )}
        {clickOnSelectArtist && (
          artists.map((artist) => (
            <ArtistCard
              {...artist}
              key={artist.id}
            />
          ))
        )}
      </div>
    </div>
  );
};

Prog.propTypes = {
  daySelected: PropTypes.string,
  clickOnSelectArtist: PropTypes.bool.isRequired,
  dates: PropTypes.shape({}).isRequired,
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
