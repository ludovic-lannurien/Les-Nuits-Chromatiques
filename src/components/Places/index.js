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
  const [placeAdress, setPlaceAdress] = useState(null);
  const [placeZip, setPlaceZip] = useState(null);
  const [placeCity, setPlaceCity] = useState(null);
  const [onMouse, setOnMouse] = useState(false);
  let textCssClass = 'text-picture';
  if (onMouse) {
    textCssClass += '-active';
  }
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
                setOnMouse(true);
                setPlaceName(place.name);
                setPlaceAdress(place.address);
                setPlaceZip(place.zipCode);
                setPlaceCity(place.city);
              }}
              onMouseLeave={() => {
                setOnMouse(false);
              }}
            />
            )}
        </div>
      ))}
      <div
        className={textCssClass}
        onMouseEnter={() => {
          setOnMouse(true);
        }}
        onMouseLeave={() => {
          setOnMouse(false);
        }}
      >
        <h3>{placeName}</h3>
        <h4>{placeAdress}</h4>
        <p>{placeZip} {placeCity}</p>
      </div>
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
