/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{html,js,php}"],
  theme: {
    colors: {
      'gray':'#5F634F',
      'h1-color':'#CFEBDF',
      'text-color':'#E2FADB',
      'border-color':'#DBEFBC',
      'light-blue':'#9BC4CB',
      'white':'#fff',
      'nav-color':'#001011',
      'baby-powder':'#FFFFFC',
      'yellow-green':'#98CE00',
      'gray-2':'#757780',
      'pale-azura':'#6CCFF6',
      'red':'#FF0000',
    },
  screens:{
'tablet': '900px',
      // => @media (min-width: 640px) { ... }

      'laptop': '1024px',
      // => @media (min-width: 1024px) { ... }

      'desktop': '1280px',
      // => @media (min-width: 1280px) { ... }
  },
    extend: {
     keyframes:{
      'spin':{
        '0%,50%':{transform: 'rotate(180)'},
        '100%':{transform: 'rotate(360)'}
      }
     },
     animation:{
      'spin':'spin 5s ease-in-out infinite'
     }
    },

  },
  plugins: [],
}