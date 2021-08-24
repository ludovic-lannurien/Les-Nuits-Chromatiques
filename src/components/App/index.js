// == Import npm
import React from 'react';
import { Route } from 'react-router-dom';
// == Import
import artistData from 'src/artistData';
import placeData from 'src/placeData';
import Map from 'src/containers/Map';
import Nav from 'src/components/Nav';
import Prog from 'src/components/Prog';
import Artist from 'src/components/Prog/Artist';
import Festival from 'src/components/Festival';
import Places from 'src/components/Places';
import './app.scss';

// == Composant
const App = () => (
  <div className="app">
    <Nav />
    <div className="wrapper">
      <Route path="/" exact>
        <Map />
      </Route>
      <Route path="/programmation">
        <Prog artists={artistData} />
      </Route>
      <Route path="/lieux">
        <Places places={placeData} />
      </Route>
      <Route path="/festival">
        <Festival />
      </Route>
      <Route path="/artiste/:slug">
        <Artist artists={artistData} />
      </Route>
    </div>
  </div>
);

// == Export
export default App;
