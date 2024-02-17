// See https://kit.svelte.dev/docs/types#app
// for information about these interfaces
declare global {
	namespace App {
		// interface Error {}
		// interface Locals {}
		// interface PageData {}
		// interface PageState {}
		// interface Platform {}
	}
}

export {};

/**
 * @typedef {Object} Wine
 * @property {string} name - The name of the wine.
 * @property {'red'|'white'|'rose'|'sparkling'} type - The type of wine (e.g., red, white, rosé).
 * @property {number} vintage - The vintage year of the wine.
 * @property {string[]} grapes - An array of grape varieties used in the wine.
 * @property {string} country - The country where the wine is produced.
 * @property {string} region - The region where the wine is produced.
 * @property {string} description - A description of the wine.
 * @property {string} notes - A personal note about the wine.
 * @property {string} image - The URL of an image of the wine bottle.
 */

/**
 * @typedef {Object} Rating
 * @property {string} user_id - The ID of the user who wrote the review.
 * @property {string} wine_id - The ID of the wine being reviewed.
 * @property {number} rating - The rating given to the wine (out of 10).
 * @property {string} comment - A comment or review of the wine.
 */

/**
 * @typedef {Object} Purchase
 * @property {string} wine_id - The ID of the wine being purchased.
 * @property {Date} purchased_at - The date of the purchase.
 * @property {string} shop - The name of the shop where the wine was purchased.
 * @property {number} price - The price per bottle.
 * @property {Date} drank_at - The date the wine was consumed.
 * @property {number} decant_duration - The duration the wine was decanted before drinking (in minutes).
 */

/** 
 * @typedef {Object} User
 */