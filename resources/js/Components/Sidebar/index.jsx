import React, {useState} from 'react';
import {v4 as uuidv4} from 'uuid';

/**
 * @returns {JSX.Element}
 * @constructor
 */
export const AdminSidebar = () => {
    const [openMenuId, setOpenMenuId] = useState(null);

    const menus = [
        {
            id: 1,
            title: 'Owner',
            items: [{uuid: uuidv4(), action: 'List', route: 'admin.owner.index'}, {
                uuid: uuidv4(),
                action: 'Create',
                route: 'admin.owner.create'
            }]
        },
        {id: 2, title: 'Expired Owner', items: [{uuid: uuidv4(), action: 'List', route: 'admin.dashboard'}]},
        {id: 3, title: 'Contact', items: [{uuid: uuidv4(), action: 'List', route: 'admin.dashboard'}]}
    ];

    /**
     * @param {string} title
     * @returns {JSX.Element}
     */
    const getTitleIcon = (title) => {
        switch (title) {
            case 'Owner':
                return (<i className="fa-solid fa-user-tie mr-2"></i>);
            case 'Expired Owner':
                return (<i className="fa-solid fa-user-slash mr-2"></i>);
            case 'Contact':
                return (<i className="fa-solid fa-envelope mr-2"></i>);
            default:
                return (<i className="fa-solid fa-house　mr-2"></i>);
        }
    }

    /**
     * @param {string} action
     * @returns {JSX.Element}
     */
    const getActionIcon = (action) => {
        switch (action) {
            case 'List':
                return (<i className="fa-solid fa-list mr-2"></i>);
            case 'Create':
                return (<i className="fa-solid fa-plus mr-2"></i>);
            case 'Edit':
                return (<i className="fa-solid fa-pen mr-2"></i>);
            default:
                throw new Error(`[Error]:　Unexpected Action * ${action}`);
        }
    }

    return (
        <aside className="bg-gray-800 text-white w-64 min-h-screen p-4">
            <nav>
                <ul className="space-y-2">
                    <li>
                        <div className="flex items-center justify-between p-2 hover:bg-gray-700">
                            <a href={route('admin.dashboard')} className="flex items-center font-bold">
                                <i className="fa-solid fa-house mr-2"></i>
                                Dashboard
                            </a>
                        </div>
                    </li>
                    {menus.map(menu => (
                        <li key={menu.id}>
                            <div
                                className="flex items-center justify-between p-2 hover:bg-gray-700"
                                onClick={() => setOpenMenuId(openMenuId === menu.id ? null : menu.id)}
                            >
                                <div className="flex items-center font-bold">
                                    {getTitleIcon(menu.title)}
                                    <span>{menu.title}</span>
                                </div>
                                <i className="fas fa-chevron-down text-xs"></i>
                            </div>
                            <ul className={`ml-4 ${openMenuId === menu.id ? '' : 'hidden'}`}>
                                {menu.items.map(item => (
                                    <li key={item.uuid}>
                                        <a href={route(item.route)}
                                           className="block p-2 hover:bg-gray-700 flex items-center font-bold">
                                            {getActionIcon(item.action)}
                                            {item.action}
                                        </a>
                                    </li>
                                ))}
                            </ul>
                        </li>
                    ))}
                </ul>
            </nav>
        </aside>
    );
}

/**
 * @returns {JSX.Element}
 * @constructor
 */
export const OwnerSidebar = () => {
    const [openMenuId, setOpenMenuId] = useState(null);

    const menus = [
        {
            id: 1,
            title: 'Owner',
            items: [{uuid: uuidv4(), action: 'List', route: 'owner.dashboard'}, {
                uuid: uuidv4(),
                action: 'Create',
                route: 'owner.dashboard'
            }]
        },
        {id: 2, title: 'Contact', items: [{uuid: uuidv4(), action: 'List', route: 'owner.dashboard'}]},
        {id: 3, title: 'Setting', items: [{uuid: uuidv4(), action: 'Edit', route: 'owner.dashboard'}]}
    ];

    /**
     * @param {string} title
     * @returns {JSX.Element}
     */
    const getTitleIcon = (title) => {
        switch (title) {
            case 'Admin':
                return (<i className="fa-solid fa-user-astronaut mr-2"></i>);
            case 'Contact':
                return (<i className="fa-solid fa-envelope mr-2"></i>);
            case 'Setting':
                return (<i className="fa-solid fa-user-gear mr-2"></i>);
            default:
                return (<i className="fa-solid fa-house　mr-2"></i>);
        }
    }

    /**
     * @param {string} action
     * @returns {JSX.Element}
     */
    const getActionIcon = (action) => {
        switch (action) {
            case 'List':
                return (<i className="fa-solid fa-list mr-2"></i>);
            case 'Create':
                return (<i className="fa-solid fa-plus mr-2"></i>);
            case 'Edit':
                return (<i className="fa-solid fa-pen mr-2"></i>);
            default:
                throw new Error(`[Error]:　Unexpected Action * ${action}`);
        }
    }

    return (
        <aside className="bg-gray-800 text-white w-64 min-h-screen p-4">
            <nav>
                <ul className="space-y-2">
                    <li>
                        <div className="flex items-center justify-between p-2 hover:bg-gray-700">
                            <a href={route('owner.dashboard')} className="flex items-center font-bold">
                                <i className="fa-solid fa-house mr-2"></i>
                                Dashboard
                            </a>
                        </div>
                    </li>
                    {menus.map(menu => (
                        <li key={menu.id}>
                            <div
                                className="flex items-center justify-between p-2 hover:bg-gray-700"
                                onClick={() => setOpenMenuId(openMenuId === menu.id ? null : menu.id)}
                            >
                                <div className="flex items-center font-bold">
                                    {getTitleIcon(menu.title)}
                                    <span>{menu.title}</span>
                                </div>
                                <i className="fas fa-chevron-down text-xs"></i>
                            </div>
                            <ul className={`ml-4 ${openMenuId === menu.id ? '' : 'hidden'}`}>
                                {menu.items.map(item => (
                                    <li key={item.uuid}>
                                        <a href={route(item.route)}
                                           className="block p-2 hover:bg-gray-700 flex items-center font-bold">
                                            {getActionIcon(item.action)}
                                            {item.action}
                                        </a>
                                    </li>
                                ))}
                            </ul>
                        </li>
                    ))}
                </ul>
            </nav>
        </aside>
    );
}
