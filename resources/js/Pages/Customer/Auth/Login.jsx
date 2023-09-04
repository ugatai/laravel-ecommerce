import {useEffect} from 'react';
import Checkbox from '@/Components/Checkbox';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import TextInput from '@/Components/TextInput';
import {Head, Link, useForm} from '@inertiajs/react';

export default function Login({status, canResetPassword}) {
    const appName = import.meta.env.VITE_APP_NAME;
    const {data, setData, post, processing, errors, reset} = useForm({
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

        post(route('customer.login'));
    };

    return (
        <div className="bg-white dark:bg-gray-900">
            <div className="flex justify-center h-screen">
                <div className="hidden bg-cover lg:block lg:w-2/3 opacity-80"
                     style={{'backgroundImage': 'url(\'https://images.pexels.com/photos/872756/pexels-photo-872756.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1\')'}}>
                    <div className="flex items-center h-full px-20 bg-gray-900 bg-opacity-40">
                        <div>
                            <h2 className="text-4xl font-bold text-white">{appName}</h2>
                            <p className="max-w-xl mt-3 text-gray-300">
                                Introducing {appName}'s new collection! Experience cutting-edge haircare design and
                                functionality at special prices.
                                Limited stock available, so check it out soon. With high-quality ingredients and unique
                                formulations, we aim to enrich your hair and beauty routine.
                                Start shopping now and enjoy the best haircare we have to offer!
                            </p>
                        </div>
                    </div>
                </div>

                <div className="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
                    <div className="flex-1">
                        <div className="text-center">
                            <h2 className="text-4xl font-bold text-center text-gray-700 dark:text-white">{appName}</h2>
                            <p className="mt-3 text-gray-500 dark:text-gray-300">Sign in to access your account</p>
                        </div>

                        <div className="text-center">
                            <Head title="Log in"/>
                            {status && <div className="mb-4 font-medium text-sm text-green-600">{status}</div>}
                        </div>

                        <div className="mt-8">
                            <form onSubmit={submit}>
                                <div>
                                    <InputLabel htmlFor="email"
                                                className="block mb-2 text-sm text-gray-600 dark:text-gray-200"
                                                value="Email Address"/>

                                    <TextInput
                                        id="email"
                                        type="email"
                                        name="email"
                                        placeholder="example@example.com"
                                        value={data.email}
                                        className="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                        autoComplete="username"
                                        isFocused={true}
                                        onChange={(e) => setData('email', e.target.value)}
                                    />

                                    <InputError message={errors.email} className="mt-2"/>
                                </div>

                                <div className="mt-6">
                                    <div className="flex justify-between mb-2">
                                        <InputLabel htmlFor="password"
                                                    className="text-sm text-gray-600 dark:text-gray-200"
                                                    value="Password"
                                        />

                                        {canResetPassword && (
                                            <Link
                                                href={route('customer.password.request')}
                                                className="text-sm text-gray-400 focus:text-blue-500 hover:text-blue-500 hover:underline">
                                                Forgot your password?
                                            </Link>
                                        )}
                                    </div>

                                    <TextInput
                                        id="password"
                                        type="password"
                                        name="password"
                                        placeholder="Your Password"
                                        value={data.password}
                                        className="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                        autoComplete="current-password"
                                        onChange={(e) => setData('password', e.target.value)}
                                    />

                                    <InputError message={errors.password} className="mt-2"/>
                                </div>

                                <div className="block mt-4">
                                    <label className="flex items-center">
                                        <Checkbox
                                            name="remember"
                                            checked={data.remember}
                                            onChange={(e) => setData('remember', e.target.checked)}/>

                                        <span className="ml-2 text-sm text-white">Remember me</span>
                                    </label>
                                </div>

                                <div className="mt-6">
                                    <button
                                        className="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-gray-600 rounded-md hover:bg-gray-500 focus:outline-none focus:bg-gray-400 focus:ring focus:ring-gray-300 focus:ring-opacity-50"
                                        disabled={processing}>
                                        Sign in
                                    </button>
                                </div>
                            </form>

                            <p className="mt-6 text-sm text-center text-gray-400">Don&#x27;t have an account yet?
                                <a href={route('customer.register')}
                                   className="text-blue-500 focus:outline-none focus:underline hover:underline">Sign
                                    up</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}
