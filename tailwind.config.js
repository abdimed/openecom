const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                poppins: ['Poppins', "sans-serif"]
            },
            colors: {
                primary: '#4D362F',
                secondary: '#232323'
            },

            animation: {
                "text-pop-up-tr": "text-pop-up-tr 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940)   both"
            },
            keyframes: {
                "text-pop-up-tr": {
                    "0%": {
                        transform: "translateY(0) translateX(0)",
                        "transform-origin": "50% 50%",
                        "text-shadow": "none"
                    },
                    to: {
                        transform: "translateY(-50px) translateX(50px)",
                        "transform-origin": "50% 50%",
                        "text-shadow": "0 1px 0 #ccc, 0 2px 0 #ccc, 0 3px 0 #ccc, 0 4px 0 #ccc, 0 5px 0 #ccc, 0 6px 0 #ccc, 0 7px 0 #ccc, 0 8px 0 #ccc, 0 9px 0 #ccc, 0 50px 30px rgba(0, 0, 0, .3)"
                    }
                }
            }

        },
    },

    plugins: [require('@tailwindcss/forms')],
};
