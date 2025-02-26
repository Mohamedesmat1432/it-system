import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                blue: {
                    50: '#ebf8ff',
                    100: '#bee3f8',
                    200: '#90cdf4',
                    300: '#63b3ed',
                    400: '#4299e1',
                    500: '#3182ce',
                    600: '#2b6cb0',
                    700: '#2c5282',
                    800: '#2a4365',
                    900: '#1A365D',
                }
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography],
};
