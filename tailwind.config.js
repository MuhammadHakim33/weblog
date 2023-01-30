/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
  ],
  theme: {
    fontFamily: {
      'sans': ['Inter'],
    },
    extend: {
      colors: {
        primary: '#164e63',
        danger: '#b91c1c',
        success: '#166534',
        warning: '#D97706'
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
