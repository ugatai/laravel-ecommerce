/**
 * @param children
 * @param {string} style
 * @returns {JSX.Element}
 * @constructor
 */
export default function Guest({children, style}) {
    const customStyle = style ?? 'bg-white';
    return (
        <div className="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div className={`w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg ${customStyle}`}>
                {children}
            </div>
        </div>
    );
}
