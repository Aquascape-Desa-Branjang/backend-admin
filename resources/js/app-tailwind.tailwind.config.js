import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
  // prefix: 'tw-',
  corePlugins: {
    preflight: false,
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
  ],
  content: [
    './resources/views/client/**/*.blade.php',
    './resources/views/components/**/*.blade.php',
    './resources/sass/**/*.scss',
    // './resources/views/emails/**/*.blade.php',
    // './resources/views/vendor/**/*.blade.php',
  ],
  theme: {
    extend: {
      colors: {
        'default-bg': '#E0E0E0',
        'primary': '#034E79',
        'primary-900': '#0B3B5B',
        'secondary': '#526670',
        'tertiary': '#011018',
        'quaternary': '#E8EBED',
        'misc-1': '#757575',
        'misc-2': '#246B93',
        'misc-3': '#012439',
        'misc-4': '#E1E1E1',
        'misc-5': '#909090',
        'misc-6': '#2C2C2C',
        'misc-7': '#E9E9E9',
        'misc-8': '#999999',
      },
      fontFamily: {
        sans: ['DM Sans', ...defaultTheme.fontFamily.sans],
        sora: ['Sora', ...defaultTheme.fontFamily.sans],
      },
    }
  },
  safelist: [
    'top-[48%]',
    'left-[18%]',
    'top-[58%]',
    'left-[46%]',
    'top-[42%]',
    'left-[67%]',
    'top-[49%]',
    'left-[85%]',
    'max-h-[38.75rem]',
    'border',
    'border-black',
  ],
}
