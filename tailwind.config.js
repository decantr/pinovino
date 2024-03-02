const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
export default {
	content: ['./src/**/*.{html,js,svelte,ts}'],
	theme: {
		extend: {
			colors: {
				primary: {
        			light: colors.indigo[400],
        			DEFAULT: colors.indigo[500],
        			dark: colors.indigo[900],

        			accent: {
        				DEFAULT: colors.indigo[400],
						dark: colors.indigo[700],
        			}
				},

				success: {
					DEFAULT: colors.green[500],
					dark: colors.green[600],

					accent: {
						DEFAULT: colors.green[400],
						dark: colors.green[600],
					}
				},

				warning: {
					DEFAULT: colors.yellow[500],
				},

				danger: {
					DEFAULT: colors.red[500],
				},
			},
		}
	},
	plugins: [],
}

