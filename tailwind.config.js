const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './vendor/laravel/jetstream/**/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue',
  ],

  theme: {
    colors: {
      primary: '#282828',
      input: '#121212',
      white: '#FFFFFF',
      orange: '#FF4929',
      'text-second': '#FFFFFF99',
    },
    extend: {
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
      },
    },
    screens: {
      laptop: '1085px',
      md: '865px',
      sm: '450px',
    },
  },

  plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
