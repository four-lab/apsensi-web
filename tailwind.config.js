/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/views/components/landing/**/*.blade.php"],
    theme: {
        extend: {
            fontFamily: {
                lexend: "'Lexend', sans-serif",
                inika: "'Inika', serif",
                poppins: "'Poppins', sans-serif",
            },
            colors: {
                primary: "#0C1721",
                secondary: "#2F88FF",
            },
        },
        plugins: [],
    },
};
