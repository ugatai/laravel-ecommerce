import {Head, usePage} from "@inertiajs/react";
import React from "react";

import AuthenticatedLayout from '@/Layouts/OwnerAuthenticatedLayout';
import Form from "@/Pages/Owner/Image/Form.jsx";
import {FlashMessage} from "@/Components/FlashMessage";

/**
 * @param auth
 * @param image
 * @returns {JSX.Element}
 * @constructor
 */
const Edit = ({auth, image}) => {
    const {flash} = usePage().props;

    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title="Image Edit Page"/>

            <div className="py-12">
                <div className="max-w-10xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <header className="border-b border-gray-100 px-5 py-4">
                            <div className="font-semibold text-gray-800">
                                Image Edit<i className="fa-solid fa-image ml-2"></i>
                            </div>
                        </header>
                        <FlashMessage flash={flash}/>
                        <Form ownerId={auth.user.id} image={image}/>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    )
}

export default Edit;
