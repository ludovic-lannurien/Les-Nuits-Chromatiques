// == Import npm
import React from 'react';

// == Import
import Map from 'src/components/Map';
import Nav from 'src/components/Nav';
import './app.scss';

// == Composant
const App = () => (
  <div className="app">
    <Nav />
    <Map />
  </div>
);

// == Export
export default App;
