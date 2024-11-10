import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            container: {
                center: true,
            },
            colors: {
                primary: {
                    DEFAULT: '#D9E5EC',
                },
                secondary: {
                    DEFAULT: '#9E222C'
                }
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
};
