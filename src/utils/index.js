export const getArtistBySlug = (slug, artists) => {
  const artistFound = artists.find((artist) => slug === artist.slug);

  return artistFound;
};

export const getNextId = (dataArray) => {
  // cas particulier si tableau vide
  let highestId = 0;
  if (dataArray.length > 0) {
    // récupérer tous les ids dans un tableau
    const ids = dataArray.map((item) => item.id);
    // appliquer Math.max sur ce tableau
    highestId = Math.max(...ids);
    // Math.max(dataArray[0], dataArray[1], etc)
  }
  // retourner id max + 1
  return highestId + 1;
};

export const getDateString = (dateTime) => {
  const options = {
    weekday: 'long',
    year: 'numeric',
    month: 'long',
    day: 'numeric',
    hour: 'numeric',
    minute: 'numeric',
  };
  const dayTime = new Date(dateTime);
  const dayTimeString = dayTime.toLocaleDateString('fr-FR', options);
  return dayTimeString;
};

export const displayUniqueDate = (datesArray) => {
  const options = {
    weekday: 'long',
    year: 'numeric',
    month: 'long',
    day: 'numeric',
  };
  const dayTime = new Date(datesArray);
  const dayTimeString = dayTime.toLocaleDateString('fr-FR', options);
  const dayOfficial = dayTimeString.slice(0, 17);
  const uniqueDate = [...new Set(dayOfficial)];
  return uniqueDate;
};
