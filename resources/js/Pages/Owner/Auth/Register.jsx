import {useEffect} from 'react';
import {Head, Link, useForm} from '@inertiajs/react';

import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import TextInput from '@/Components/TextInput';
import {LoginOrRegisterButton} from "@/Components/Button/index.jsx";

/**
 * @returns {JSX.Element}
 * @constructor
 */
export default function Register() {
    const {data, setData, post, errors, reset} = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });

    useEffect(() => {
        return () => {
            reset('password', 'password_confirmation');
        };
    }, []);

    const submit = (e) => {
        e.preventDefault();

        post(route('owner.register'));
    };

    return (
        <GuestLayout style="bg-neutral-200">
            <Head title="Owner Register"/>

            <div className="text-gray-500 p-3 text-center font-bold">
                Owner <i className="fa-solid fa-user-tie"></i>
            </div>

            <form onSubmit={submit}>
                <div className="px-5 py-7">
                    <InputLabel htmlFor="name"
                                value="Name"
                                className="font-semibold text-sm text-gray-600 pb-1 block"
                    />
                    <TextInput
                        id="name"
                        name="name"
                        value={data.name}
                        className="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full"
                        autoComplete="name"
                        isFocused={true}
                        onChange={(e) => setData('name', e.target.value)}
                        required
                    />
                    <InputError message={errors.name} className="mb-2"/>

                    <InputLabel htmlFor="email"
                                value="Email"
                                className="font-semibold text-sm text-gray-600 pb-1 block"
                    />
                    <TextInput
                        id="email"
                        type="email"
                        name="email"
                        value={data.email}
                        className="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full"
                        autoComplete="username"
                        onChange={(e) => setData('email', e.target.value)}
                        required
                    />
                    <InputError message={errors.email} className="mt-2"/>

                    <InputLabel htmlFor="password"
                                value="Password"
                                className="font-semibold text-sm text-gray-600 pb-1 block"
                    />
                    <TextInput
                        id="password"
                        type="password"
                        name="password"
                        value={data.password}
                        className="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full"
                        autoComplete="new-password"
                        onChange={(e) => setData('password', e.target.value)}
                        required
                    />
                    <InputError message={errors.password} className="mt-2"/>

                    <InputLabel htmlFor="password_confirmation"
                                value="Confirm Password"
                                className="font-semibold text-sm text-gray-600 pb-1 block"
                    />
                    <TextInput
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        value={data.password_confirmation}
                        className="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full"
                        autoComplete="new-password"
                        onChange={(e) => setData('password_confirmation', e.target.value)}
                        required
                    />
                    <InputError message={errors.password_confirmation} className="mt-2"/>

                    <LoginOrRegisterButton color="bg-slate" value="Register"/>
                </div>

                <div className="flex items-center justify-end mt-4">
                    <Link
                        href={route('owner.login')}
                        className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 font-semibold"
                    >
                        Already registered?
                    </Link>
                </div>
            </form>
        </GuestLayout>
    );
}
