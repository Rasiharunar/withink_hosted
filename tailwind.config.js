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
                primary: '#4e73df', // Ganti dengan warna yang Anda inginkan
                secondary: '#4e73df', // Ganti dengan warna yang Anda inginkan
                light: '#f8f9fc',
                customBlue: '#1d4ed8',
                // Tambahkan warna lain sesuai kebutuhan
              },
        },
    },

    plugins: [forms],
};
