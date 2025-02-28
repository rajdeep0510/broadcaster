/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.php",
    "./src/views/**/*.php",
    "./src/controllers/**/*.php",
    "./src/helpers/**/*.php",
    "./src/models/**/*.php",
    "./*.php"
  ],
  theme: {
    extend: {
      colors: {
        'custom-bg': '#0f172a',      // Dark blue background
        'custom-primary': '#3b82f6',  // Primary blue
        'custom-secondary': '#1e40af' // Darker blue
      },
    },
  },
  plugins: [],
}