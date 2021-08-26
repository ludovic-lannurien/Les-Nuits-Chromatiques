// == Import npm
import React, { useEffect } from 'react';
import { Route, Switch } from 'react-router-dom';
import PropTypes from 'prop-types';
// == Import
// import artistData from 'src/artistData';
import Map from 'src/containers/Map';
import Nav from 'src/components/Nav';
import Prog from 'src/containers/Prog';
import Festival from 'src/components/Festival';
import NotFound from 'src/components/NotFound';
import Places from 'src/containers/Places';
import Artist from 'src/containers/Artist';
import './app.scss';

// == Composant
const App = ({ loadArtists, loadEvents, loadPlaces }) => {
  useEffect(() => {
    loadArtists();
    loadEvents();
    loadPlaces();
  }, []);
  return (
    <div className="app">
      <Nav />
      <div className="wrapper">
        <Switch>
          <Route path="/" exact>
            <Map />
          </Route>
          <Route path="/programmation">
            <Prog />
          </Route>
          <Route path="/lieux">
            <Places />
          </Route>
          <Route path="/artiste/:slug">
            <Artist />
          </Route>
          <Route path="/festival">
            <Festival />
          </Route>
          <Route>
            <NotFound />
          </Route>
        </Switch>
      </div>
    </div>
  );
};
App.propTypes = {
  loadArtists: PropTypes.func.isRequired,
  loadEvents: PropTypes.func.isRequired,
  loadPlaces: PropTypes.func.isRequired,
};
// == Export
export default App;
