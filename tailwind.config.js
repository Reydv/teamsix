import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                poppins: ['Poppins', 'sans-serif'],
                montserrat: ["Montserrat", "sans-serif"],
                saira: ['Saira Condensed', "sans-serif"],
                ibm: ['IBM Plex Sans Condensed', 'sans-serif'],
                sSegment: ['Seven Segment', 'sans-serif'],
                anon: ['Anonymous Pro', 'sans-serif'],
            },
            colors: {
                primary: '#FF914D',
                secondary: '#ED3237',
                gray: '#545454',
                gold: '#FFFF00',
            }
        },
    },

    plugins: [forms],
};