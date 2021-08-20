// == Import npm
import React, { useState } from 'react';
import ReactMapGL, { Marker, Popup } from 'react-map-gl';
import placeData from 'src/eventData';
// == Import
import cible from './cible.png';
import philippe from './katerine.jpg';
import './map.scss';

// == Composant
const Map = () => {
  const [viewport, setViewport] = useState({
    latitude: 47.3212,
    longitude: 5.0413,
    width: '100vw',
    height: '100vh',
    zoom: 12.5,
  });
  const [selectedEvent, setSelectedEvent] = useState(null);
  const [selectedHoverEvent, setSelectedHoverEvent] = useState(null);
  const [popup, setPopup] = useState(false);
  const [isShown, setIsShown] = useState(false);

  return (
    <div className="mapbox">
      <ReactMapGL
        {...viewport}
        mapboxApiAccessToken="pk.eyJ1IjoiY291Y291dG9pIiwiYSI6ImNrc2hsanYwZzF2ajIycW9kOGRsdnJqbTAifQ.hAOB8WH3YU4QmpPiEVDaEg"
        mapStyle="mapbox://styles/coucoutoi/cksiodflj6mbm17nxvvo3qyf7"
        onViewportChange={(viewport) => {
          setViewport(viewport);
        }}
        onClick={(event) => {
          event.preventDefault();
          setPopup(false);
        }}
      >
        {placeData.map((item) => (
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
                setPopup(true);
              }}
              onMouseEnter={() => {
                setIsShown(true);
                setSelectedHoverEvent(item);
              }}
              onMouseLeave={() => {
                setIsShown(false);
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
        /* onClose={() => {
          setPopup(false);
        }} */
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
            /* onClose={() => {
              setPopup(false);
            }} */
          >
            <div className="popup-content">
              <a href="#"><img src={philippe} className="philippe" alt="philippe" /></a>
              <h2>{selectedEvent.name}</h2>
              <h3>{selectedEvent.artists[0].firstname} {selectedEvent.artists[0].lastname}</h3>
              <p>{selectedEvent.description}</p>
              <a href="https://chkt.fr/"><span className="type">{selectedEvent.artists[0].type}</span></a>
              <a href="https://chkt.fr/" className="voir-plus">Voir plus</a>
            </div>
          </Popup>
        )}
      </ReactMapGL>
    </div>
  );
};

// == Export
export default Map;
