import React from 'react';
import PropTypes from 'prop-types';
import { Link } from 'react-router-dom';
import './prog.scss';

const ArtistCard = ({
  firstname, lastname, slug, id, picture,
}) => (
  <Link
    to={`/artiste/${slug}`}
    className="artist"
    key={id}
  >
    <h1>{firstname} {lastname}</h1>
    <div className="picture">
      <img src={picture} alt={firstname} className="artist-picture" />
    </div>
  </Link>

);

ArtistCard.propTypes = {
  id: PropTypes.number.isRequired,
  firstname: PropTypes.string.isRequired,
  lastname: PropTypes.string,
  slug: PropTypes.string.isRequired,
  picture: PropTypes.string.isRequired,
};

ArtistCard.defaultProps = {
  lastname: null,
};

export default ArtistCard;
