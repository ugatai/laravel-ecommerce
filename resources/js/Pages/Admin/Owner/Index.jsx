import React from "react";
import {Head, useForm, usePage} from '@inertiajs/react';

import AuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout';
import {FlashMessage} from "@/Components/FlashMessage/index.jsx";

/**
 * @param auth
 * @param owners
 * @returns {JSX.Element}
 * @constructor
 */
const Index = ({auth, owners}) => {
    const {delete: destroy} = useForm({});
    const {flash} = usePage().props;

    /**
     * @param {MouseEvent<HTMLAnchorElement>} e
     * @param {int} id
     */
    const deleteHandler = (e, id) => {
        e.preventDefault();

        if (window.confirm('Are you sure you want to delete this owner?')) {
            destroy(route('admin.owner.destroy', {id: id}));
        }
    };

    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title="Owner Index Page"/>

            <div className="py-12">
                <div className="max-w-10xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <header className="border-b border-gray-100 px-5 py-4">
                            <div className="font-semibold text-gray-800">
                                Owner List<i className="fa-solid fa-user-tie ml-2"></i>
                            </div>
                        </header>
                        <FlashMessage flash={flash}/>
                        <div className="table w-full p-2">
                            <table className="w-full border">
                                <thead>
                                <tr className="bg-gray-50 border-b">
                                    <th className="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                        <span className="flex items-center justify-center font-bold">ID</span>
                                    </th>
                                    <th className="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                        <span className="flex items-center justify-center font-bold">Name</span>
                                    </th>
                                    <th className="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                        <div className="flex items-center justify-center font-bold">Email</div>
                                    </th>
                                    <th className="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                        <div className="flex items-center justify-center font-bold">Action</div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                {owners.map(owner => (
                                    <tr key={owner.id}
                                        className="bg-gray-100 text-center border-b text-sm text-gray-600">
                                        <td className="p-2 border-r">{owner.id}</td>
                                        <td className="p-2 border-r">{owner.name}</td>
                                        <td className="p-2 border-r">{owner.email}</td>
                                        <td>
                                            <a href={route('admin.owner.show', {id: owner.id})}
                                               className="bg-cyan-600 p-2 text-white hover:shadow-lg text-xs font-bold mr-1 rounded">
                                                Show<i className="fa-solid fa-book-open ml-1"></i>
                                            </a>
                                            <a href={route('admin.owner.edit', {id: owner.id})}
                                               className="bg-emerald-600 p-2 text-white hover:shadow-lg text-xs font-bold mr-1 rounded">
                                                Edit<i className="fa-solid fa-pen ml-1"></i>
                                            </a>
                                            <a href="#"
                                               onClick={(e) => deleteHandler(e, owner.id)}
                                               className="bg-red-600 p-2 text-white hover:shadow-lg text-xs font-bold mr-1 rounded button-sm">
                                                Delete<i className="fa-solid fa-trash-can ml-1"></i>
                                            </a>
                                        </td>
                                    </tr>
                                ))}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}

export default Index;
