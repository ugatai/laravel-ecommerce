export default function Footer() {
    const appName = import.meta.env.VITE_APP_NAME;

    return (
        <footer className="bg-gradient-to-r from-stone-100 to-white">
            <div className="container mx-auto px-6 py-3 flex justify-between items-center">
                <a href="#" className="text-xl font-bold text-gray-500 hover:text-gray-400">{appName}</a>
                <p className="py-2 text-gray-500 sm:py-0">All rights reserved</p>
            </div>
        </footer>
    );
}
