import React from "react";
import {useForm} from "@inertiajs/react";

import InputError from "@/Components/InputError.jsx";
import InputLabel from "@/Components/InputLabel.jsx";
import TextInput from "@/Components/TextInput.jsx";

/**
 * @param owner
 * @returns {JSX.Element}
 * @constructor
 */
const Form = ({ownerId, image = {}}) => {
    const {data, setData, post, put, errors} = useForm({
        id: Object.keys(image).length === 0 ? '' : image.id,
        owner_id: ownerId,
        title: Object.keys(image).length === 0 ? '' : image.title,
        image: ''
    });

    /**
     * @param {MouseEvent<HTMLAnchorElement>} e
     */
    const createHandler = (e) => {
        e.preventDefault();

        post(route('owner.image.store'));
    };

    /**
     * @param {MouseEvent<HTMLAnchorElement>} e
     */
    const editHandler = (e) => {
        e.preventDefault();

        post(route('owner.image.update'));
    };

    return (
        Object.keys(image).length === 0 ?
            // Image Create Form
            <div className="w-full p-3">
                <div className="relative mb-4">
                    <InputLabel htmlFor="title"
                                value="Title"
                                className="leading-7 text-sm text-gray-600 font-semibold"
                    />
                    <TextInput
                        id="title"
                        name="title"
                        value={data.title}
                        className="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        autoComplete="name"
                        isFocused={true}
                        onChange={(e) => setData('title', e.target.value)}
                        required
                    />
                    <InputError message={errors.title} className="mt-2"/>
                </div>
                <div className="relative mb-5">
                    <InputLabel htmlFor="image"
                                value="Image"
                                className="leading-7 text-sm text-gray-600 font-semibold"
                    />
                    <TextInput
                        id="image"
                        name="image"
                        type="file"
                        className="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-stone-500 file:text-white hover:file:bg-stone-600"
                        autoComplete="username"
                        isFocused={true}
                        onChange={(e) => setData('image', e.target.files[0])}
                        required
                    />
                    <InputError message={errors.image} className="mt-2"/>
                </div>

                <TextInput type="hidden" id="owner_id" name="owner_id" value={data.owner_id} required/>
                <button
                    onClick={(e) => createHandler(e)}
                    className="text-white bg-sky-600 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-600 rounded font-bold">Create
                    <i className="fa-solid fa-file-circle-plus ml-2"></i>
                </button>
            </div> :
            // Image Edit Form
            <div className="w-full p-3">
                <div className="relative mb-4">
                    <InputLabel htmlFor="title"
                                value="Title"
                                className="leading-7 text-sm text-gray-600 font-semibold"
                    />
                    <TextInput
                        id="title"
                        name="title"
                        value={data.title}
                        className="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        autoComplete="name"
                        isFocused={true}
                        onChange={(e) => setData('title', e.target.value)}
                        required
                    />
                    <InputError message={errors.title} className="mt-2"/>
                </div>
                <div className="relative mb-5">
                    <InputLabel htmlFor="image"
                                value="Image"
                                className="leading-7 text-sm text-gray-600 font-semibold"
                    />
                    <TextInput
                        id="image"
                        name="image"
                        type="file"
                        className="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-stone-500 file:text-white hover:file:bg-stone-600"
                        autoComplete="username"
                        isFocused={true}
                        onChange={(e) => setData('image', e.target.files[0])}
                        required
                    />
                    <InputError message={errors.image} className="mt-2"/>
                </div>

                <TextInput type="hidden" id="id" name="id" value={data.id} required/>
                <TextInput type="hidden" id="owner_id" name="owner_id" value={data.owner_id} required/>
                <button
                    onClick={(e) => editHandler(e)}
                    className="text-white bg-emerald-500 border-0 py-2 px-6 focus:outline-none hover:bg-emerald-600 rounded font-bold">Edit
                    <i className="fa-solid fa-pen ml-2"></i>
                </button>
            </div>
    );
}

export default Form;
