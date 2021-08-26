import React from 'react';
import PropTypes from 'prop-types';
import { Link } from 'react-router-dom';
import './prog.scss';

const ArtistCard = ({
  firstname, lastname, slug, id, picture
}) => {
  console.log(firstname);
  return (
    <Link
      to={`/artiste/${slug}`}
      className="artist"
      key={id}
    >
      <a href="#"><h1>{firstname} {lastname}</h1></a>
      <div className="picture">
        <a href="#"><img src={picture} alt={firstname} /></a>
      </div>
    </Link>

  );
};

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
