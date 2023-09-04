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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

            colors: {
                beige: {
                    50: '#fbf8f1',
                    100: '#f5eddf',
                    200: '#ead9c0',
                    300: '#dcbd95',
                    400: '#cc9d6b',
                    500: '#c2844d',
                    600: '#b47042',
                    700: '#965a38',
                    800: '#794933',
                    900: '#623d2c',
                    950: '#341e16',
                },

                seaweed: {
                    50: '#effaeb',
                    100: '#ddf3d4',
                    200: '#bee8ae',
                    300: '#96d77f',
                    400: '#71c556',
                    500: '#52aa38',
                    600: '#3c8729',
                    700: '#316724',
                    800: '#2a5321',
                    900: '#264720',
                    950: '#132d0f',
                },
            }
        },
    },

    plugins: [forms],

    corePlugins: {
        preflight: false
    }
};
