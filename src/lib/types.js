export const Types = {}
/**
 * @typedef {Object} Wine
 * @property {string|null} name - The name of the wine.
 * @property {string} type - The type of wine (e.g., red, white, rosé).
 * @property {number|null} vintage - The vintage year of the wine.
 * @property {string[]} grapes - An array of grape varieties used in the wine.
 * @property {string|null} country - The country where the wine is produced.
 * @property {string|null} region - The region where the wine is produced.
 * @property {string|null} description - A description of the wine.
 * @property {string|null} notes - Tasting notes for the wine.
 * @property {string|null} image - A URL to an image of the wine bottle.
 */

/**
 * @typedef {Object} User
 */

/**
 * @typedef {Object} Purchase
 * @property {string} wine_id - The ID of the wine being purchased.
 * @property {Date} purchased_at - The date the wine was purchased.
 * @property {string} store - The store where the purchase was made.
 * @property {number} price - The price per bottle.
 * @property {Date} drank_at - The date the wine was consumed.
 * @property {number} decanted_duration - The duration the wine was decanted (in minutes).
 */

/**
 * @typedef {Object} Rating
 * @property {string} user_id - The ID of the user who submitted the rating.
 * @property {string} wine_id - The ID of the wine being rated.
 * @property {number} rating - The rating value (1-5).
 * @property {string} comment - A comment about the wine.
 */