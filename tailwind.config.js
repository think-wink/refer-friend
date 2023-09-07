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

      grey: {
        light: '#f9f8f6',
        subLight: '#bcc1c7',
        DEFAULT: '#b2b5bc',
        dark: '#58595b'
      },
      success: '#22c55e',
      white: '#FFFFFF',
      orange: '#FF4929',
      red: '#ff0000',
      toolbar: '#19263f',
      footer: '#dee3e9',
      gold: '#f7b515',
      hover: '#5184a1',

      'text-second': '#FFFFFF99',
    },
    extend: {
      fontFamily: {
        sans: ['serif', ...defaultTheme.fontFamily.sans],
        merry: ['Merriweather'],
        mont: ['Montserrat', 'sans-serif']
      },
    },
    screens: {
      laptop: '1085px',
      lg: '1200px',
      md: '865px',
      sm: '450px',
    },
  },

  plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
