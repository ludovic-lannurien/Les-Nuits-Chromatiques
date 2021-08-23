// == Import npm
import React from 'react';
import PropTypes from 'prop-types';
import { useParams } from 'react-router-dom';
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
          <img src={artist.picture} alt="pipou" />
        </a>
      </div>
      <div className="content">
        <h1 className="name">
          {artist.firstname}
        </h1>
        {artist.events.map((event) => (
          <div className="bloc-event">
            <div className="description">
              {event.description}
            </div>

            <div className="event">
              <a href="#" className="event_info">{event.name}</a>
              <a href="#" className="event_info">{event.place.name}</a>
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
