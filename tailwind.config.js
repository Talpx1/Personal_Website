/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/views/**/*.php"],
  theme: {
    extend: {
      colors: {
        "light": "#FDFFFC",
        "dark": "#040F0F",
      },
      fontFamily: {
        primary: ['CascadiaMono', 'Courier New', 'Courier', 'monospace'],
        accent: ['Schoolbell', 'Bradley Hand', 'cursive', 'Apple Chancery', 'Comic Sans MS', 'Comic Sans'],
      },
      width: {
        "3/1": "width: 300%"
      }
    },
  },
  darkMode: 'class',
  plugins: [],
}

