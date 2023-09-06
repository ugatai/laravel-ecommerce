import {useEffect} from 'react';
import {Head, useForm} from '@inertiajs/react';

import GuestLayout from '@/Layouts/GuestLayout';
import Checkbox from '@/Components/Checkbox';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import TextInput from '@/Components/TextInput';
import {LoginOrRegisterButton} from "@/Components/Button/index.jsx";

/**
 * @param status
 * @param canResetPassword
 * @returns {JSX.Element}
 * @constructor
 */
export default function Login({status, canResetPassword}) {
    const {data, setData, post, errors, reset} = useForm({
        email: '',
        password: '',
        remember: false,
    });

    useEffect(() => {
        return () => {
            reset('password');
        };
    }, []);

    const submit = (e) => {
        e.preventDefault();

        post(route('admin.login'));
    };

    return (
        <GuestLayout style="bg-slate-100">
            <Head title="Admin Log in"/>
            {status && <div className="mb-4 font-medium text-sm text-green-600">{status}</div>}

            <div className="text-gray-500 p-3 text-center font-bold">
                Admin <i className="fa-solid fa-user-astronaut"></i>
            </div>

            <form onSubmit={submit}>
                <div className="px-5 py-7">
                    <InputLabel htmlFor="email"
                                value="E-mail"
                                className="font-semibold text-sm text-gray-600 pb-1 block"
                    />
                    <TextInput
                        id="email"
                        type="email"
                        name="email"
                        value={data.email}
                        className="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full"
                        autoComplete="username"
                        isFocused={true}
                        placeholder="example@example.com"
                        onChange={(e) => setData('email', e.target.value)}
                    />
                    <InputError message={errors.email} className="mb-2"/>

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
                        autoComplete="current-password"
                        placeholder="Your Password"
                        onChange={(e) => setData('password', e.target.value)}
                    />
                    <InputError message={errors.password} className="mb-2"/>

                    <div className="block mb-3">
                        <label className="flex items-center">
                            <Checkbox
                                name="remember"
                                checked={data.remember}
                                onChange={(e) => setData('remember', e.target.checked)}
                            />
                            <span className="ml-2 text-sm text-gray-600 font-semibold">Remember me</span>
                        </label>
                    </div>

                    <LoginOrRegisterButton color="bg-slate" value="Login"/>
                </div>

                <div className="py-2">
                    <div className="grid grid-cols-2 gap-1">
                        <div className="text-center sm:text-left whitespace-nowrap">
                            {canResetPassword && <button
                                type="button"
                                className="transition duration-200 mx-5 px-5 py-4 cursor-pointer font-normal text-sm rounded-lg
                                text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-200 focus:ring-2
                                focus:ring-gray-400 focus:ring-opacity-50 ring-inset"
                            >
                                <i className="fa-solid fa-unlock-keyhole"></i>
                                <a className="inline-block ml-1" href={route('admin.password.request')}>Forgot
                                    Password</a>
                            </button>}
                        </div>
                        <div className="text-center sm:text-right  whitespace-nowrap">
                            <button type="button"
                                    className="transition duration-200 mx-5 px-5 py-4 cursor-pointer font-normal text-sm
                                    rounded-lg text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-200
                                    focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50 ring-inset"
                            >
                                <i className="fa-solid fa-circle-question"></i>
                                <span className="inline-block ml-1">Help</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </GuestLayout>
    );
}
