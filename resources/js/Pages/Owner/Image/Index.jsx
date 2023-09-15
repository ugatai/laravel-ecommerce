import React from "react";
import {Head, useForm, usePage} from '@inertiajs/react';
import {v4 as uuidv4} from 'uuid';

import AuthenticatedLayout from '@/Layouts/OwnerAuthenticatedLayout';
import {FlashMessage} from "@/Components/FlashMessage";

/**
 * @param auth
 * @param chunkedImages
 * @returns {JSX.Element}
 * @constructor
 */
const Index = ({auth, chunkedImages}) => {
    const {delete: destroy} = useForm({});
    const {flash} = usePage().props;

    /**
     * @param {MouseEvent<HTMLAnchorElement>} e
     * @param {int} id
     */
    const deleteHandler = (e, id) => {
        e.preventDefault();

        if (window.confirm('Are you sure you want to delete this image?')) {
            destroy(route('owner.image.destroy', {id: id}));
        }
    };

    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title="Image Index"/>
            <div className="py-12">
                <div className="max-w-10xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <header className="border-b border-gray-100 px-5 py-4">
                            <div className="font-semibold text-gray-800">
                                Image List<i className="fa-solid fa-images ml-2"></i>
                            </div>
                        </header>

                        <FlashMessage flash={flash}/>

                        <div className="container mx-auto p-4">
                            <div className="grid grid-cols-2 md:grid-cols-4 gap-4">
                                {chunkedImages.map(images => {
                                    // バックエンド側でchunkしてデータを渡す場合Arr or Objectになるので下記で対応
                                    const imageArr = typeof images === 'object' ?
                                        Object.values(images) :
                                        images;

                                    if (Array.isArray(imageArr)) {
                                        return (
                                            <div key={uuidv4()} className="grid gap-4">
                                                {imageArr.map(image => (
                                                    <div key={image.id} className="bg-gray-100 p-2 rounded">
                                                        <h3 className="text-xl font-bold lead-xl bold text-gray-600 mb-1">{image.title}</h3>
                                                        <img
                                                            className="h-auto max-w-full rounded-lg"
                                                            src={image.file_path}
                                                            alt={image.title}
                                                        />
                                                        <div className="flex justify-end items-center mt-2">
                                                            <a href={route('owner.image.edit', {id: image.id})}
                                                               className="bg-lime-600 p-2 text-white hover:shadow-lg text-xs font-bold mr-1 rounded">
                                                                Edit<i className="fa-solid fa-pen ml-1"></i>
                                                            </a>
                                                            <a href="#"
                                                               onClick={(e) => deleteHandler(e, image.id)}
                                                               className="bg-rose-600 p-2 text-white hover:shadow-lg text-xs font-bold mr-1 rounded button-sm">
                                                                Delete<i className="fa-solid fa-trash-can ml-1"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                ))}
                                            </div>
                                        );
                                    }
                                })}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    )
}

export default Index;
