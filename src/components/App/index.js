// == Import npm
import React, { useEffect } from 'react';
import { Route, Switch } from 'react-router-dom';
import PropTypes from 'prop-types';
// == Import
// import artistData from 'src/artistData';
import Map from 'src/containers/Map';
import Nav from 'src/containers/Nav';
import Prog from 'src/containers/Prog';
import Festival from 'src/containers/Festival';
import NotFound from 'src/components/NotFound';
import Spinner from 'src/components/Spinner';
import Places from 'src/containers/Places';
import Artist from 'src/containers/Artist';
import './app.scss';

// == Composant
const App = ({
  loadArtists,
  loadEvents,
  loadPlaces,
  loadDates,
  artistsLoaded,
}) => {
  useEffect(() => {
    loadArtists();
    loadEvents();
    loadPlaces();
    loadDates();
  });
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
          {!artistsLoaded && <Spinner />}
          {artistsLoaded && (
          <Route path="/artiste/:slug">
            <Artist />
          </Route>
          )}
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
  loadDates: PropTypes.func.isRequired,
  artistsLoaded: PropTypes.bool.isRequired,
};
// == Export
export default App;
