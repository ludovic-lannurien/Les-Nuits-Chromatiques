// == Import npm
import React from 'react';

// == Import
import Map from 'src/components/Map';
import Nav from 'src/components/Nav';
import DayFilter from './DayFilter';
import './app.scss';

// == Composant
const App = () => (
  <div className="app">
    <Nav />
    <div className="wrapper">
      <DayFilter />
      <Map />
    </div>
  </div>
);

// == Export
export default App;
