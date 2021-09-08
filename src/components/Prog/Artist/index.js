// == Import npm
import React from 'react';
import PropTypes from 'prop-types';
import { useParams, Link } from 'react-router-dom';
import { GoLocation } from 'react-icons/go';
import { GrSchedule } from 'react-icons/gr';
import { getArtistBySlug, getDateString } from 'src/utils';
import cible from './cible.png';

// == Import
import './artist.scss';

// == Composant
const Artist = ({ artists }) => {
  const { slug } = useParams();
  const artist = getArtistBySlug(slug, artists);

  return (
    <div className="artist-page">
      <Link
        to="/programmation"
      >
        <div className="back-to-prog">Voir la programmation</div>
      </Link>
      <Link
        to="/"
      >
        <div className="back-to-map">
          <img src={cible} alt="map" className="back-to-map-cible" />
          <span className="back-to-map-text">Map</span>
        </div>
      </Link>
      <div className="artist-picture">
        <a href="#">
          <img src={artist.picture} alt={`${artist.firstname} ${artist.lastname}`} />
        </a>
      </div>
      <div className="artist-content">
        <h1 className="name">
          <span>{artist.firstname} </span><span>{artist.lastname}</span>
        </h1>
        <h1 className="artist-description">
          {artist.description}
        </h1>
      </div>
      <div className="event-content">
        <span className="prog-span">Programmation</span>
        {artist.events.map((event) => (
          <div className="bloc-event" key={event.id}>
            <div className="event-name">
              <span>{event.name}</span>
            </div>
            <p>A retrouver du</p>
            <div className="event-date">
              <GrSchedule className="react-icons" />
              <span>{getDateString(event.startDatetime)}</span>
            </div>
            <p>Au</p>
            <div className="event-date">
              <GrSchedule className="react-icons" />
              <span>{getDateString(event.endDatetime)}</span>
            </div>
            <div className="event-place">
              <GoLocation className="react-icons" />
              <Link
                to="/lieux"
              >
                <a className="place-link">{event.place.name}</a>
                <p>{event.place.address}</p>
                <p>{event.place.city}</p>
              </Link>
            </div>
            <div className="event-description">
              {event.description}
            </div>
          </div>
        ))}

        <div
          className="video"
          dangerouslySetInnerHTML={{ __html: artist.videoLink }}
        />

      </div>
    </div>
  );
};

Artist.propTypes = {
  artists: PropTypes.arrayOf(
    PropTypes.shape({
      firstname: PropTypes.string.isRequired,
      id: PropTypes.number.isRequired,
      picture: PropTypes.string.isRequired,
    }).isRequired,
  ).isRequired,
};

// == Export
export default Artist;
