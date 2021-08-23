// obtenir le slug qui correspond à un titre
export const coucou = (cc) => {
  console.log('coucou');
};

export const getArtistBySlug = (slug, artists) => {
  const artistFound = artists.find((artist) => slug === artist.slug);

  return artistFound;
};
