import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            animation: {
                'slide-down': 'slideDown 1.5s ease-out',
            },
            hover:{
                'hovered': 'filter: none'
            },
            keyframes: {
                slideDown: {
                  '0%': { // Start at the top with full opacity
                    opacity: 1,
                    transform: 'translateY(-100%)', // Move element completely off-screen above
                  },
                  '100%': { // End at the final position with full opacity
                    opacity: 1,
                    transform: 'translateY(0)', // Move element back to its original position
                  },
                },
              },
        },
    },

    plugins: [
      forms,
      require('flowbite/plugin')
    ],
};
