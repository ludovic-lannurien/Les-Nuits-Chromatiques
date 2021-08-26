// == Import npm
import React, { useState } from 'react';
import PropTypes from 'prop-types';
import ReactMapGL, { Marker, Popup } from 'react-map-gl';
import { Link } from 'react-router-dom';
// == Import

import DayFilter from './DayFilter';
import cible from './cible.png';
import './map.scss';

// == Composant
const Map = ({
  events,
  viewport,
  setViewport,
  selectedEvent,
  selectedHoverEvent,
  popup,
  isShown,
  setSelectedEvent,
  setSelectedHoverEvent,
  setPopup,
  setIsShown,
  setGetOut,
}) =>
// const [selectedEvent, setSelectedEvent] = useState(null);
// const [selectedHoverEvent, setSelectedHoverEvent] = useState(null);
// const [popup, setPopup] = useState(false);
// const [isShown, setIsShown] = useState(false);
  (
    <div className="mapbox">
      <DayFilter />
      <ReactMapGL
        {...viewport}
        mapboxApiAccessToken="pk.eyJ1IjoiY291Y291dG9pIiwiYSI6ImNrc2hsanYwZzF2ajIycW9kOGRsdnJqbTAifQ.hAOB8WH3YU4QmpPiEVDaEg"
        mapStyle="mapbox://styles/coucoutoi/cksiodflj6mbm17nxvvo3qyf7"
        onViewportChange={(viewport) => {
          setViewport(viewport);
        }}
        onClick={(event) => {
          event.preventDefault();
          setGetOut();
        }}
      >
        {events.map((item) => (
          <Marker
            key={item.place.id}
            latitude={item.place.latitude}
            longitude={item.place.longitude}
          >
            <button
              className="marker-btn"
              type="button"
              onClick={(event) => {
                event.preventDefault();
                setSelectedEvent(item);
                setPopup();
              }}
              onMouseEnter={() => {
                setIsShown();
                setSelectedHoverEvent(item);
              }}
              onMouseLeave={() => {
                setIsShown();
                setSelectedHoverEvent(item);
              }}
            >
              <img src={cible} alt="marker event" className="cible" />
            </button>
          </Marker>
        ))}
        {isShown && (
        <Popup
          className="myPopup-title"
          latitude={selectedHoverEvent.place.latitude}
          longitude={selectedHoverEvent.place.longitude}
        >
          <div className="popup-title">
            <h2>{selectedHoverEvent.name}</h2>
          </div>
        </Popup>
        )}
        {popup && (
        <Popup
          className="myPopup"
          latitude={selectedEvent.place.latitude}
          longitude={selectedEvent.place.longitude}
        >
          <div className="popup-content">

            {selectedEvent.artists.map((artist) => (
              <div key={artist.id}>
                <a href="#"><img src={artist.picture} className="philippe" alt="philippe" /></a>
                <h2>{selectedEvent.name}</h2>

                <h3 key={artist.slug}>{artist.firstname} {artist.lastname}</h3>
              </div>
            ))}
            <p>{selectedEvent.description}</p>
            {selectedEvent.artists.map((artist) => (
              <div key={artist.id}>
                {artist.genres.map((item) => (
                  <span
                    key={item.id}
                    className="genre"
                  >
                    {item.name}
                  </span>
                ))}
                <Link
                  key={artist.id}
                  to={`/artiste/${artist.slug}`}
                  className="artist"
                >
                  <span className="voir-plus">Voir plus</span>
                </Link>
              </div>
            ))}
          </div>
        </Popup>
        )}
      </ReactMapGL>
    </div>
  );
Map.propTypes = {
  viewport: PropTypes.shape({
  }).isRequired,
  selectedEvent: PropTypes.shape({
    id: PropTypes.number.isRequired,
    place: PropTypes.shape({
      latitude: PropTypes.number,
      longitude: PropTypes.number,
    }),
    name: PropTypes.string.isRequired,
    description: PropTypes.string.isRequired,
    artists: PropTypes.arrayOf(
      PropTypes.shape({
        firstname: PropTypes.string.isRequired,
        lastname: PropTypes.string,
      }).isRequired,
    ).isRequired,
  }),
  selectedHoverEvent: PropTypes.shape({
    place: PropTypes.shape({
      latitude: PropTypes.number,
      longitude: PropTypes.number,
    }),
    name: PropTypes.string.isRequired,
  }),
  setViewport: PropTypes.func.isRequired,
  setSelectedEvent: PropTypes.func.isRequired,
  setSelectedHoverEvent: PropTypes.func.isRequired,
  popup: PropTypes.bool.isRequired,
  isShown: PropTypes.bool.isRequired,
  setPopup: PropTypes.func.isRequired,
  setIsShown: PropTypes.func.isRequired,
  setGetOut: PropTypes.func.isRequired,
  events: PropTypes.arrayOf(
    PropTypes.shape({
      place: PropTypes.shape({
        id: PropTypes.number.isRequired,
        latitude: PropTypes.number.isRequired,
        longitude: PropTypes.number.isRequired,
      }),
      name: PropTypes.string.isRequired,
    }).isRequired,
  ).isRequired,
};
Map.defaultProps = {
  selectedEvent: PropTypes.shape({
    artists: PropTypes.arrayOf(
      PropTypes.shape({
        lastname: null,
      }),
    ),
  }),
  selectedHoverEvent: null,
};

// == Export
export default Map;
// selectedHoverEvent: PropTypes.arrrayOf(
//   PropTypes.shape({}).isRequired,
// ).isRequired,
