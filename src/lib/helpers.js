/** * @param {string} countryCode */
export function getFlagEmoji(countryCode) {
	return !countryCode ? null : [...countryCode.toUpperCase()]
		.map(char => String.fromCodePoint(127397 + char.charCodeAt()))
		.reduce((a, b) => `${a}${b}`);
}