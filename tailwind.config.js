/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./src/**/*.{html,js,php}"],
    theme: {
        extend: {
            colors: {
                'eco': {
                    50: '#f0fdf4',
                    100: '#dcfce7',
                    500: '#10b981',
                    600: '#059669',
                    700: '#047857',
                }
            }
        },
    },
    darkMode: 'class',
    plugins: [],
}