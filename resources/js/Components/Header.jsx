import {Link} from '@inertiajs/react';

export default function Header({auth}) {
    const appName = import.meta.env.VITE_APP_NAME;

    return (
        <header className="bg-gradient-to-r from-stone-100 to-white py-5">
            <div className="container mx-auto px-6 py-3">
                <div className="flex items-center justify-between">
                    <div className="hidden w-full text-gray-600 md:flex md:items-center">
                        <svg className="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16.2721 10.2721C16.2721 12.4813 14.4813 14.2721 12.2721 14.2721C10.063 14.2721 8.27214 12.4813 8.27214 10.2721C8.27214 8.06298 10.063 6.27212 12.2721 6.27212C14.4813 6.27212 16.2721 8.06298 16.2721 10.2721ZM14.2721 10.2721C14.2721 11.3767 13.3767 12.2721 12.2721 12.2721C11.1676 12.2721 10.2721 11.3767 10.2721 10.2721C10.2721 9.16755 11.1676 8.27212 12.2721 8.27212C13.3767 8.27212 14.2721 9.16755 14.2721 10.2721Z"
                                fill="currentColor"/>
                            <path
                                d="M5.79417 16.5183C2.19424 13.0909 2.05438 7.39409 5.48178 3.79417C8.90918 0.194243 14.6059 0.054383 18.2059 3.48178C21.8058 6.90918 21.9457 12.6059 18.5183 16.2059L12.3124 22.7241L5.79417 16.5183ZM17.0698 14.8268L12.243 19.8965L7.17324 15.0698C4.3733 12.404 4.26452 7.97318 6.93028 5.17324C9.59603 2.3733 14.0268 2.26452 16.8268 4.93028C19.6267 7.59603 19.7355 12.0268 17.0698 14.8268Z"
                                fill="currentColor"/>
                        </svg>
                        <span className="mx-1 text-sm">Ja</span>
                    </div>
                    <div className="w-full text-gray-700 md:text-center text-2xl font-bold">
                        {appName}
                    </div>
                    <div className="flex items-center justify-end w-full">
                        {auth.user ? (
                            <Link
                                href={route('customer.dashboard')}
                                className="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                            >
                                Dashboard
                            </Link>
                        ) : (
                            <>
                                <Link
                                    href={route('customer.login')}
                                    className="font-semibold text-gray-600"
                                >
                                    <i className="fa-solid fa-user-pen mr-2"></i>Log in
                                </Link>

                                <Link
                                    href={route('customer.register')}
                                    className="ml-4 font-semibold text-gray-600"
                                >
                                    <i className="fa-solid fa-user-plus mr-2"></i>Register
                                </Link>
                            </>
                        )}
                    </div>

                    <div className="flex sm:hidden">
                        <button type="button"
                                className="text-gray-600 hover:text-gray-500 focus:outline-none focus:text-gray-500"
                                aria-label="toggle menu">
                            <svg viewBox="0 0 24 24" className="h-6 w-6 fill-current">
                                <path
                                    d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <nav className="sm:flex sm:justify-center sm:items-center mt-4">
                <div className="flex flex-col sm:flex-row">
                    <a className="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#"><i
                        className="fa-solid fa-house mr-2"></i>Home</a>
                    <a className="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#"><i
                        className="fa-solid fa-shop mr-2"></i>Shop</a>
                    <a className="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#"><i
                        className="fa-solid fa-bottle-droplet mr-2"></i>Categories</a>
                    <a className="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#"><i
                        className="fa-solid fa-calendar-days mr-2"></i>Reserve</a>
                    <a className="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#"><i
                        className="fa-solid fa-envelope mr-2"></i>Contact</a>
                </div>
            </nav>
            <div className="relative mt-6 max-w-lg mx-auto">
                        <span className="absolute inset-y-0 left-0 pl-3 flex items-center">
                            <svg className="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                    stroke="currentColor"/>
                            </svg>
                        </span>
                <input
                    className="w-full border rounded-md pl-10 pr-4 py-2 focus:border-blue-500 focus:outline-none focus:shadow-outline"
                    type="text" placeholder="Search"/>
            </div>
        </header>
    )
}
