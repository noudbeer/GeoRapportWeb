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
      },
      translate: {
        'retracted': 'calc(100% - 2rem)'
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
