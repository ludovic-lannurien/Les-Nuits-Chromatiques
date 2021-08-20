// == Import npm
import React from 'react';
import { Route } from 'react-router-dom';
// == Import
import artistData from 'src/artistData';
import Map from 'src/components/Map';
import Nav from 'src/components/Nav';
import Prog from 'src/components/Prog';
import Festival from 'src/components/Festival';
import Places from 'src/components/Places';
import DayFilter from './DayFilter';
import './app.scss';

// == Composant
const App = () => (
  <div className="app">
    <Nav />
    <div className="wrapper">
      <DayFilter />
      <Route path="/" exact>
        <Map />
      </Route>
      <Route path="/programmation">
        <Prog artists={artistData} />
      </Route>
      <Route path="/lieux">
        <Places />
      </Route>
      <Route path="/festival">
        <Festival />
      </Route>
    </div>
  </div>
);

// == Export
export default App;
