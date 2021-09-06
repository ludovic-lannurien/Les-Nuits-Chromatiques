// == Import npm
import React from 'react';
import PropTypes from 'prop-types';
// == Import
import './festival.scss';
import CHKT from '../../assets/CHKT-TEAM.png';
import GIFOnClick from '../../assets/Gif_Onclick.png';
import GIFSansClick from '../../assets/Gif_Auto_Sans_Clic.png';

// == Composant
const Festival = ({ gifOnClick, setGifOnClick }) => (
  <div className="festival">
    <div className="festival_picture">
      <a href="https://chkt.fr/" target="_blank" rel="noreferrer">
        <img src={CHKT} alt="CHKT" className="CHKT_picture" />
      </a>
    </div>
    <div className="festival_text">
      <h1>Le festival</h1>
      <h2>Notre histoire</h2>
      <p>Les Nuits Chromatiques est le premier rendez-vous dijonnais, dédié à la scénographie
        lumière et aux musiques actuelles,
        au cœur du centre ville et de son patrimoine architectural classé patrimoine
        mondial de l’UNESCO.
        Véritable mise en lumière de lieux témoins de l'héritage historique et expression de la
        scène électronique dijonnaise,
        le festival est une nouvelle interprétation de la ville.
      </p>
      <h2>Mais qui sommes nous ?</h2>
      <p>Lancée en 2015 par quelques dijonnais passionnés d'art et de musique,
        CHKT est née d’une volonté commune de ses membres d’animer la ville
        et ses alentours par des évènements aux thématiques artistiques et musicales.
        CHKT est une association culturelle regroupant des passionnés d'art
        et plus particulièrement de musique.
        Dj sets, live sets, concerts, expositions,
        ateliers d'arts plastiques ou encore initiation à la musique électronique...
        Ce sont autant de pratiques qui font la force de CHKT.
        Au sein même de ce collectif dijonnais,
        toute l'équipe se mobilise pour faire naitre de beaux projets.
      </p>
    </div>
    <div className="festival_gif" onClick={setGifOnClick}>
      {gifOnClick
        ? <img src={GIFOnClick} alt="gif" />
        : <img src={GIFSansClick} alt="gif" />}
    </div>
  </div>
);

Festival.propTypes = {
  setGifOnClick: PropTypes.func.isRequired,
  gifOnClick: PropTypes.bool.isRequired,
};
// == Export
export default Festival;
