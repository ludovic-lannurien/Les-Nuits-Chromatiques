// == Import npm
import React from 'react';
import { Route } from 'react-router-dom';
// == Import
import Map from 'src/components/Map';
import Nav from 'src/components/Nav';
import Prog from 'src/components/Prog';
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
        <Prog />
      </Route>
      <Route path="/lieux">
        <Places />
      </Route>
    </div>
  </div>
);

// == Export
export default App;
