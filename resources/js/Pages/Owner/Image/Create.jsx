import React from "react";
import {Head} from '@inertiajs/react';

import AuthenticatedLayout from '@/Layouts/OwnerAuthenticatedLayout';
import Form from "@/Pages/Owner/Image/Form";

/**
 * @returns {JSX.Element}
 * @constructor
 */
const Create = ({auth}) => {
    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title="Image Create Page"/>

            <div className="py-12">
                <div className="max-w-10xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <header className="border-b border-gray-100 px-5 py-4">
                            <div className="font-semibold text-gray-800">
                                Image Create<i className="fa-solid fa-image ml-2"></i>
                            </div>
                        </header>
                        <Form ownerId={auth.user.id}/>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    )
}

export default Create;
