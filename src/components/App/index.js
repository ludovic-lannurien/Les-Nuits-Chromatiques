// == Import npm
import React, { useEffect } from 'react';
import { Route } from 'react-router-dom';
import PropTypes from 'prop-types';
// == Import
// import artistData from 'src/artistData';
import placeData from 'src/placeData';
import Map from 'src/containers/Map';
import Nav from 'src/components/Nav';
import Prog from 'src/containers/Prog';
import Festival from 'src/components/Festival';
import Places from 'src/containers/Places';
import Artist from 'src/containers/Artist';
import './app.scss';

// == Composant
const App = ({ loadArtists }) => {
  useEffect(() => {
    loadArtists();
  }, []);
  return (
    <div className="app">
      <Nav />
      <div className="wrapper">
        <Route path="/" exact>
          <Map />
        </Route>
        <Route path="/programmation">
          <Prog />
        </Route>
        <Route path="/lieux">
          <Places places={placeData} />
        </Route>
        <Route path="/artiste/:slug">
          <Artist />
        </Route>
        <Route path="/festival">
          <Festival />
        </Route>
      </div>
    </div>
  );
};
App.propTypes = {
  loadArtists: PropTypes.func.isRequired,
};
// == Export
export default App;
