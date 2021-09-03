// == Import npm
import React, { useState } from 'react';
import PropTypes from 'prop-types';
import { IoIosArrowForward, IoIosArrowBack } from 'react-icons/io';
// == Import
import './places.scss';

// == Composant
const Places = ({
  places,
  current,
  placeName,
  placeAdress,
  placeZip,
  placeCity,
  onMouse,
  setCurrent,
  setPlaceName,
  setPlaceAdress,
  setPlaceZip,
  setPlaceCity,
  setOnMouse,
}) => {
  // const [current, setCurrent] = useState(0);
  const { length } = places;

  const nextSlide = () => {
    setCurrent(current === length - 1 ? 0 : current + 1);
  };
  const prevSlide = () => {
    setCurrent(current === 0 ? length - 1 : current - 1);
  };
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
  current: PropTypes.number.isRequired,
  setCurrent: PropTypes.func.isRequired,
  placeName: PropTypes.string,
  placeAdress: PropTypes.string,
  placeZip: PropTypes.number,
  placeCity: PropTypes.string,
  setPlaceName: PropTypes.func.isRequired,
  setPlaceAdress: PropTypes.func.isRequired,
  setPlaceZip: PropTypes.func.isRequired,
  setPlaceCity: PropTypes.func.isRequired,
  onMouse: PropTypes.bool.isRequired,
  setOnMouse: PropTypes.func.isRequired,
  places: PropTypes.arrayOf(
    PropTypes.shape({
      id: PropTypes.number.isRequired,
      picture: PropTypes.string.isRequired,
      name: PropTypes.string.isRequired,
    }),
  ).isRequired,
};

Places.defaultProps = {
  placeName: null,
  placeAdress: null,
  placeZip: null,
  placeCity: null,
};
// == Export
export default Places;
