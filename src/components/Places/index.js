// == Import npm
import React, { useState } from 'react';
import PropTypes from 'prop-types';
import { IoIosArrowForward, IoIosArrowBack } from 'react-icons/io';
// == Import
import './places.scss';

// == Composant
const Places = ({ places }) => {
  const [current, setCurrent] = useState(0);
  const { length } = places;

  const nextSlide = () => {
    setCurrent(current === length - 1 ? 0 : current + 1);
  };
  const prevSlide = () => {
    setCurrent(current === 0 ? length - 1 : current - 1);
  };
  const [placeName, setPlaceName] = useState(null);
  console.log(placeName);
  if (!Array.isArray(places) || places.length <= 0) {
    return null;
  }
  return (
    <div className="places">
      <IoIosArrowBack className="left-arrow" size={150} onClick={prevSlide} />
      <IoIosArrowForward className="right-arrow" size={150} onClick={nextSlide} />
      {places.map((place, index) => (
        <div className={index === current ? 'slide active' : 'slide'} key={place.id}>
          {index === current
            && (
            <img
              src={place.picture}
              alt={place.name}
              key={place.id}
              className="image"
              onMouseEnter={() => {
                setPlaceName(place.name);
              }}
            />
            )}
        </div>
      ))}
    </div>
  );
};
Places.propTypes = {
  places: PropTypes.arrayOf(
    PropTypes.shape({
      id: PropTypes.number.isRequired,
      picture: PropTypes.string.isRequired,
      name: PropTypes.string.isRequired,
    }),
  ).isRequired,
};
// == Export
export default Places;
