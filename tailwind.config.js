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
        primary: ['CascadiaMono', 'monospace', 'Courier New'],
        accent: ['Schoolbell', 'Helvetica', 'sans-serif'],
      },
    },
  },
  plugins: [],
}
