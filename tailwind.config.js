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
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                inter: ['Inter', ...defaultTheme.fontFamily.sans],
                playfair: ['Playfair Display', ...defaultTheme.fontFamily.serif],
            },
            colors: {
                puglia: {
                    mare: '#0369A1', // Azzurro Adriatico
                    marescuro: '#1E40AF', // Blu profondo
                    marecharo: '#BAE6FD', // Azzurro chiaro
                    grano: '#D97706', // Oro del grano
                    granocaro: '#FEF3C7', // Giallo chiaro
                    pietra: '#F5F0E8', // Pietra leccese (sfondo)
                    terra: '#92400E', // Terra rossa
                    ulivo: '#4D7C0F', // Verde ulivo
                    notte: '#0C1445', // Blu notte pugliese
                    sabbia: '#FDE68A', // Sabbia
                }
            }
        },
    },

    plugins: [forms],
};