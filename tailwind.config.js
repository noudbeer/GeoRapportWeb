module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      backgroundImage: theme => ({
        'onf': "url('/storage/app/public/img/Office_national_des_forêts_logo.svg')",
      }),
      zIndex: {
        '5000': '5000',
       }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
