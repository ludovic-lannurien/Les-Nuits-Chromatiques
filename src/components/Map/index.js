// == Import npm
import React, { useState } from 'react';
import ReactMapGL from 'react-map-gl';

// == Import

import './map.scss';

// == Composant
const Map = () => {
  const [viewport, setViewport] = useState({
    latitude: 47.3212,
    longitude: 5.0413,
    width: '60vw',
    height: '80vh',
    zoom: 15,
  });
  console.log(process.env.REACT_APP_MAPBOX_TOKEN);
  return (
    <div className="mapbox">
      <ReactMapGL
        {...viewport}
        mapboxApiAccessToken={'pk.eyJ1IjoiY291Y291dG9pIiwiYSI6ImNrc2hsanYwZzF2ajIycW9kOGRsdnJqbTAifQ.hAOB8WH3YU4QmpPiEVDaEg'}
      >
        marker here
      </ReactMapGL>
    </div>
  );
};

// == Export
export default Map;
