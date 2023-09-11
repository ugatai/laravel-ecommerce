import React from "react";
import {Head} from '@inertiajs/react';

import AuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout';
import Form from "@/Pages/Admin/Owner/Form";

/**
 * @param auth
 * @returns {JSX.Element}
 * @constructor
 */
const Create = ({auth}) => {
    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title="Owner Create Page"/>

            <div className="py-12">
                <div className="max-w-10xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <header className="border-b border-gray-100 px-5 py-4">
                            <div className="font-semibold text-gray-800">
                                Owner Create<i className="fa-solid fa-user-tie ml-2"></i>
                            </div>
                        </header>
                        <Form />
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}

export default Create;
