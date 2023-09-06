/**
 * @param {string} color
 * @param {string} value
 * @returns {JSX.Element}
 * @constructor
 */
export const LoginOrRegisterButton = ({color, value}) => {
    return (
        <button type="submit"
                className={`transition duration-200 ${color}-500 hover:${color}-600 focus:${color}-700
                            focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5
                            rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block mt-5`}
        >
            <span className="inline-block mr-2">{value}</span>
            {value === 'Login' ? <i className="fa-solid fa-arrow-right"></i> : <i className="fa-solid fa-plus"></i>}
        </button>
    );
}
