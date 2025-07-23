/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.php",
    "./js/**/*.js",    // JavaScript files (if any)
    "C:\Users\pan shengxin\Local Sites\sim\app\public\wp-content\themes\esim\header.php"
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Public Sans', 'Arial', 'sans-serif'], // Set Public Sans as the default sans-serif font
      },
      colors: {
        questblue: 'rgb(25, 25, 112)',
      },
      padding: {
        '100': '26rem',   // Larger padding value
      },
      screens: {
        'xs': '430px', // Custom breakpoint for devices smaller than 640px
        'sm': '640px',
        'md': '768px',
        'lg': '1024px',
        'xl': '1280px',
        '2xl': '1536px',
      }

    },
  },
  plugins: [],
}


// questblue: 'rgb(27, 152, 224)',