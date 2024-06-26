/** @type {import('tailwindcss').Config} */

//const { orbitComponentsPreset } = require('@kiwicom/orbit-tailwind-preset');
const colors = require('tailwindcss/colors');

module.exports = {
  /*presets: [ orbitComponentsPreset({
    //Enable normalizing of the browser's efault styles, which is disabled by default
    disablePreflight: false,
  }) ],*/
  //mode: 'jit',
  //purge: ['./style.css'],
  content: [
    "./*.{php,html,js}",
    "./template-parts/*.{php,html}",
    "./template-parts/**/*.{php,html}",
    "./js/*.js"
  ],
  safelist: ['text-pink-500'],
  darkMode: false,
  theme: {
    screens: {
      'sm': '640px',   // => @media (min-width: 640px) { ... }
      'md': '768px',   // => @media (min-width: 768px) { ... }
      'lg': '1024px',  // => @media (min-width: 1024px) { ... }
      'xl': '1280px',  // => @media (min-width: 1280px) { ... }
      '2xl': '1536px', // => @media (min-width: 1536px) { ... }
    },

    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      'white': '#ffffff',
      black: colors.black,
      grey: colors.grey,
      red: colors.red,
      blue: colors.blue,
      cyan: colors.cyan,
      yellow: colors.yellow,
      orange: colors.orange,
      green: colors.green,
      'purple': '#3f3cbb',
      'midnight': '#121063',
      'metal': '#565584',
      'tahiti': '#3ab7bf',
      'silver': '#ecebff',
      'bubble-gum': '#ff77e9',
      'bermuda': '#78dcca',
      'grey-darker':'#596a73',
      'teal':'#4dc0b5',
      indigo: colors.indigo,
      pink: colors.pink,
      slate: colors.slate,
    },
    fontFamily: {
      'sans': ['ui-sans-serif', 'system-ui', 'Helvetica', 'Arial', 'sans-serif'],
      'serif': ['ui-serif', 'Georgia'],
      'mono': ['ui-monospace', 'SFMono-Regular'],
      'display': ['Oswald'],
      'body': ['"Open Sans"'],
    },
    fontSize: {
      xs: '0.7',
      sm: '0.875rem',
      base: '1rem',
      lg: '1.10rem',
      xl: '1.25rem',
      '2xl': ['1.563rem', {
        lineHeight: '2rem',
        letterSpacing: '-0.01em',
        fontWeight: '500',
      }],
      '3xl': '1.953rem',
      '4xl': '2.441rem',
      '5xl': '3.052rem',
    },
    fontWeight: {
      hairline: '100',
      extralight: '200',
      light: '300',
      normal: '400',
      medium: '500',
      semibold: '600',
      bold: '700',
      'extra-bold': '800',
      black: '900',
    },
    //spacing: {},
    extend: {
      aspectRatio: {
      '4/3': '4 / 3',
      },
      margin: {
        '1px': '1px'
      },
      colors: {
        dark: {
          700: '#212335'
        }
      }
      //typography: ({ theme }) => ({})
    },
  },
  variants: {
    extend: {
      
    }
  },
  corePlugins: {
    preflight: true,
  },
  plugins: [
    require("nightwind"),
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms')
  ],
}

