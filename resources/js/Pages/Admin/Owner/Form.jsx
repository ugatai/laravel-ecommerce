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
const Form = ({owner = {}}) => {
    const {data, setData, post, put, errors} = useForm({
        id: Object.keys(owner).length === 0 ? '' : owner.id,
        name: Object.keys(owner).length === 0 ? '' : owner.name,
        email: Object.keys(owner).length === 0 ? '' : owner.email,
        password: '',
        password_confirmation: ''
    });

    /**
     * @param {MouseEvent<HTMLAnchorElement>} e
     */
    const createHandler = (e) => {
        e.preventDefault();

        post(route('admin.owner.store'));
    };

    /**
     * @param {MouseEvent<HTMLAnchorElement>} e
     */
    const editHandler = (e) => {
        e.preventDefault();

        put(route('admin.owner.update'));
    };

    return (
        Object.keys(owner).length === 0 ?
            //Owner Create Form
            <div className="w-full p-3">
                <div className="relative mb-4">
                    <InputLabel htmlFor="name"
                                value="Name"
                                className="leading-7 text-sm text-gray-600 font-semibold"
                    />
                    <TextInput
                        id="name"
                        name="name"
                        value={data.name}
                        className="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        autoComplete="name"
                        isFocused={true}
                        onChange={(e) => setData('name', e.target.value)}
                        required
                    />
                    <InputError message={errors.name} className="mt-2"/>
                </div>
                <div className="relative mb-4">
                    <InputLabel htmlFor="email"
                                value="Email"
                                className="leading-7 text-sm text-gray-600 font-semibold"
                    />
                    <TextInput
                        id="email"
                        name="email"
                        value={data.email}
                        type="email"
                        className="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        autoComplete="username"
                        isFocused={true}
                        onChange={(e) => setData('email', e.target.value)}
                        required
                    />
                    <InputError message={errors.email} className="mt-2"/>
                </div>
                <div className="relative mb-4">
                    <InputLabel htmlFor="password"
                                value="Password"
                                className="font-semibold text-sm text-gray-600 pb-1 block"
                    />
                    <TextInput
                        id="password"
                        type="password"
                        name="password"
                        value={data.password}
                        className="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        autoComplete="new-password"
                        onChange={(e) => setData('password', e.target.value)}
                        required
                    />
                    <InputError message={errors.password} className="mt-2"/>
                </div>
                <div className="relative mb-4">
                    <InputLabel htmlFor="password_confirmation"
                                value="Confirm Password"
                                className="font-semibold text-sm text-gray-600 pb-1 block"
                    />
                    <TextInput
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        value={data.password_confirmation}
                        className="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        autoComplete="new-password"
                        onChange={(e) => setData('password_confirmation', e.target.value)}
                        required
                    />
                    <InputError message={errors.password_confirmation} className="mt-2"/>
                </div>
                <button
                    onClick={(e) => createHandler(e)}
                    className="text-white bg-indigo-500 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-600 rounded font-bold">Create
                    <i className="fa-solid fa-person-circle-plus ml-2"></i>
                </button>
            </div> :
            //Owner Edit Form
            <div className="w-full p-3">
                <TextInput
                    type="hidden"
                    id="id"
                    name="id"
                    value={data.id}
                    required
                />
                <div className="relative mb-4">
                    <InputLabel htmlFor="name"
                                value="Name"
                                className="leading-7 text-sm text-gray-600 font-semibold"
                    />
                    <TextInput
                        id="name"
                        name="name"
                        value={data.name}
                        className="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        autoComplete="name"
                        isFocused={true}
                        onChange={(e) => setData('name', e.target.value)}
                        required
                    />
                    <InputError message={errors.name} className="mt-2"/>
                </div>
                <div className="relative mb-4">
                    <InputLabel htmlFor="email"
                                value="Email"
                                className="leading-7 text-sm text-gray-600 font-semibold"
                    />
                    <TextInput
                        id="email"
                        name="email"
                        value={data.email}
                        type="email"
                        className="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        autoComplete="username"
                        isFocused={true}
                        onChange={(e) => setData('email', e.target.value)}
                        required
                    />
                    <InputError message={errors.email} className="mt-2"/>
                </div>
                <button
                    onClick={(e) => editHandler(e)}
                    className="text-white bg-emerald-500 border-0 py-2 px-6 focus:outline-none hover:bg-emerald-600 rounded font-bold">Edit
                    <i className="fa-solid fa-pen ml-2"></i>
                </button>
            </div>
    );
}

export default Form;
