/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.jsx",
        "./resources/**/*.vue",
        "./resources/**/*.ts",
        "./resources/**/*.tsx",
        "./node_modules/@shadcn/ui/components/**/*.{js,ts,jsx,tsx}",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Montserrat", "sans-serif"],
                serif: ["Roboto"],
            },
        },
    },
    plugins: [],
};
