// == Import npm
import React from 'react';
import PropTypes from 'prop-types';
import { useParams } from 'react-router-dom';
import { GoLocation } from 'react-icons/go';
import { GrSchedule } from 'react-icons/gr';
import { getArtistBySlug } from 'src/utils';
import philippe from './katerine.jpg';

// == Import
import './artist.scss';

// == Composant
const Artist = ({ artists }) => {
  const { slug } = useParams();
  const artist = getArtistBySlug(slug, artists);
  console.log(artist.picture);

  return (
    <div className="artist-page">
      <div className="artist-picture">
        <a href="#">
          <img src={philippe} alt={`${artist.firstname} ${artist.lastname}`} />
        </a>
      </div>
      <div className="artist-content">
        <h1 className="name">
          {`${artist.firstname} ${artist.lastname}`}
        </h1>
        <h1 className="artist-description">
          {artist.description}
        </h1>
      </div>
      <div className="event-content">
        <span className="prog-span">Programmation :</span>
        {artist.events.map((event) => (
          <div className="bloc-event">
            <div className="event-date">
              <GrSchedule className="react-icons" />
              <span>{event.startDatetime}</span>
            </div>
            <div className="event-name">
              <span>{event.name}</span>
            </div>
            <div className="event-place">
              <GoLocation className="react-icons" />
              <a href="#" className="place-link">{event.place.name}</a>
            </div>
            <div className="event-description">
              {event.description}
            </div>
          </div>
        ))}

        <div className="video">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/6JMCgVFYAqQ" title="YouTube video player" frameBorder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" className="video-iframe" allowFullScreen />
        </div>

      </div>
    </div>
  );
};

Artist.propTypes = {
  artists: PropTypes.arrayOf(
    PropTypes.shape({
      firstname: PropTypes.string.isRequired,
    }).isRequired,
  ).isRequired,
};

// == Export
export default Artist;
