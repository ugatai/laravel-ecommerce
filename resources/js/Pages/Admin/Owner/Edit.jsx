import React from "react";
import {Head, usePage} from '@inertiajs/react';

import AuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout';
import Form from "@/Pages/Admin/Owner/Form";

/**
 * @param auth
 * @param owner
 * @returns {JSX.Element}
 * @constructor
 */
const Edit = ({auth, owner}) => {
    const {flash} = usePage().props;

    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title="Owner Edit Page"/>

            <div className="py-12">
                <div className="max-w-10xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <header className="border-b border-gray-100 px-5 py-4">
                            <div className="font-semibold text-gray-800">
                                Owner Edit<i className="fa-solid fa-user-tie ml-2"></i>
                            </div>
                        </header>
                        {flash.info &&
                            <div className="flex bg-green-100 rounded-lg p-4 my-2 text-sm text-green-700" role="alert">
                                <div>
                                    <i className="fa-solid fa-circle-info mr-2"></i>
                                    <span className="font-medium">{flash.info}</span>
                                </div>
                            </div>}
                        <Form owner={owner}/>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}

export default Edit;
