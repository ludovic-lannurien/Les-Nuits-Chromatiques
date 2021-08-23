// == Import npm
import React from 'react';
import philippe from './katerine.jpg';

// == Import
import './artist.scss';

// == Composant
const Artist = () => (
  <div className="artist-page">
    <div className="artist-picture">
      <a href="#">
        <img src={philippe} alt="pipou" />
      </a>
    </div>
    <div className="content">
      <h1 className="name">
        Pipou Katerine
      </h1>
      <div className="description">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tempus ex at convallis</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tempus ex at convallisLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tempus ex at convalli Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tempus ex at convallisLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tempus ex at convallis</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tempus ex at convallisLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tempus ex at convallis</p>

      </div>

      <div className="event">
        <a href="#" className="event_info">Nom de l'événement</a>
        <a href="#" className="event_info">Lieu de l'événement</a>
      </div>

      <div className="video">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/6JMCgVFYAqQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" className="video-iframe" allowfullscreen></iframe>
      </div>
    </div>
  </div>
);

// == Export
export default Artist;
