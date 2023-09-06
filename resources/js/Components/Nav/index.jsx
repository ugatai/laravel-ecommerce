import Dropdown from "@/Components/Dropdown.jsx";

const appName = import.meta.env.VITE_APP_NAME;

/**
 * @param user
 * @returns {JSX.Element}
 * @constructor
 */
export const AdminNav = ({user}) => {
    return (
        <nav className="bg-slate-500 p-4 flex items-center justify-between">
            <div>
                <h1 className="text-white text-xl font-semibold">
                    {appName}
                    <i className="fa-solid fa-lg fa-spray-can-sparkles ml-2"></i>
                </h1>
            </div>
            <div className="flex items-center space-x-4">
                <Dropdown>
                    <Dropdown.Trigger>
                        <span className="inline-flex rounded-md">
                            <button
                                type="button"
                                className="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4
                                font-medium rounded-md text-white bg-slate-500 focus:outline-none transition ease-in-out duration-150"
                            >
                                <i className="fa-solid fa-user-astronaut mr-1"></i>
                                {user.name}

                                <i className="fa-solid fa-angle-down ml-3"></i>
                            </button>
                        </span>
                    </Dropdown.Trigger>

                    <Dropdown.Content>
                        <Dropdown.Link href={route('admin.logout')} method="post" as="button">
                            Log Out
                            <i className="fa-solid fa-right-to-bracket ml-2"></i>
                        </Dropdown.Link>
                    </Dropdown.Content>
                </Dropdown>
            </div>
        </nav>
    );
}

/**
 * @param user
 * @returns {JSX.Element}
 * @constructor
 */
export const OwnerNav = ({user}) => {
    return (
        <nav className="bg-neutral-500 p-4 flex items-center justify-between">
            <div>
                <h1 className="text-white text-xl font-semibold">
                    {appName}
                    <i className="fa-solid fa-lg fa-spray-can-sparkles ml-2"></i>
                </h1>
            </div>
            <div className="flex items-center space-x-4">
                <Dropdown>
                    <Dropdown.Trigger>
                        <span className="inline-flex rounded-md">
                            <button
                                type="button"
                                className="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4
                                font-medium rounded-md text-white bg-neutral-500 focus:outline-none transition ease-in-out duration-150"
                            >
                                <i className="fa-solid fa-user-tie mr-1"></i>
                                {user.name}

                                <i className="fa-solid fa-angle-down ml-3"></i>
                            </button>
                        </span>
                    </Dropdown.Trigger>

                    <Dropdown.Content>
                        <Dropdown.Link href={route('owner.logout')} method="post" as="button">
                            Log Out
                            <i className="fa-solid fa-right-to-bracket ml-2"></i>
                        </Dropdown.Link>
                    </Dropdown.Content>
                </Dropdown>
            </div>
        </nav>
    );
}
