// == Import npm
import React, { useState } from 'react';
import ReactMapGL, { Marker, Popup } from 'react-map-gl';
import placeData from 'src/placesData';
// == Import
import cible from './cible.png';
import './map.scss';

// == Composant
const Map = () => {
  const [viewport, setViewport] = useState({
    latitude: 47.3212,
    longitude: 5.0413,
    width: '100vw',
    height: '100vh',
    zoom: 15,
  });
  const [selectedEvent, setSelectedEvent] = useState(null);
  const [popup, setPopup] = useState(false);
  return (
    <div className="mapbox">
      <ReactMapGL
        {...viewport}
        mapboxApiAccessToken={'pk.eyJ1IjoiY291Y291dG9pIiwiYSI6ImNrc2hsanYwZzF2ajIycW9kOGRsdnJqbTAifQ.hAOB8WH3YU4QmpPiEVDaEg'}
        mapStyle="mapbox://styles/coucoutoi/cksiodflj6mbm17nxvvo3qyf7"
        onViewportChange={viewport => {
          setViewport(viewport);
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
                setPopup(!popup);
              }}
            >
              <img src={cible} alt="marker event" className="cible" />
            </button>
          </Marker>
        ))}
        {popup && (
          <Popup
            latitude={selectedEvent.place.latitude}
            longitude={selectedEvent.place.longitude}
            onClose={() => {
              setPopup(false);
            }}
          >
            <div>
              <h2>{selectedEvent.name}</h2>
              <p>{selectedEvent.description}</p>
            </div>
          </Popup>
        )}
      </ReactMapGL>
    </div>
  );
};

// == Export
export default Map;
