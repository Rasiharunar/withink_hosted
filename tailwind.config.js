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
                primary: '#52e4cb', // Ganti dengan warna yang Anda inginkan
                secondary: '#52e4cb', // Ganti dengan warna yang Anda inginkan
                light: '#f8f9fc',
                customBlue: '#52e4cb',
                // Tambahkan warna lain sesuai kebutuhan
              },
        },
    },

    plugins: [forms],
};
