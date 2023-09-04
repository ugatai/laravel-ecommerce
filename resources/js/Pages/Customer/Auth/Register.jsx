import {useEffect} from 'react';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import TextInput from '@/Components/TextInput';
import {Head, useForm} from '@inertiajs/react';

export default function Register() {
    const appName = import.meta.env.VITE_APP_NAME;
    const {data, setData, post, processing, errors, reset} = useForm({
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

        post(route('customer.register'));
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
                                Limited stock available, so check it out soon. With high-quality ingredients and
                                unique formulations, we aim to enrich your hair and beauty routine.
                                Start shopping now and enjoy the best haircare we have to offer!
                            </p>
                        </div>
                    </div>
                </div>

                <div className="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
                    <div className="flex-1">
                        <div className="text-center">
                            <h2 className="text-4xl font-bold text-center text-gray-700 dark:text-white">{appName}</h2>
                            <p className="mt-3 text-gray-500 dark:text-gray-300">Sign up to access your account</p>
                        </div>

                        <div className="text-center">
                            <Head title="Register"/>
                        </div>

                        <div className="mt-8">
                            <form onSubmit={submit}>
                                <div>
                                    <InputLabel htmlFor="name"
                                                value="Name"
                                                className="block mb-2 text-sm text-gray-600 dark:text-gray-200"/>

                                    <TextInput
                                        id="name"
                                        name="name"
                                        value={data.name}
                                        className="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                        autoComplete="name"
                                        isFocused={true}
                                        onChange={(e) => setData('name', e.target.value)}
                                        required
                                    />

                                    <InputError message={errors.name} className="mt-2"/>
                                </div>

                                <div className="mt-4">
                                    <InputLabel htmlFor="email"
                                                value="Email"
                                                className="block mb-2 text-sm text-gray-600 dark:text-gray-200"/>

                                    <TextInput
                                        id="email"
                                        type="email"
                                        name="email"
                                        value={data.email}
                                        className="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                        autoComplete="username"
                                        onChange={(e) => setData('email', e.target.value)}
                                        required
                                    />

                                    <InputError message={errors.email} className="mt-2"/>
                                </div>

                                <div className="mt-4">
                                    <InputLabel htmlFor="password"
                                                value="Password"
                                                className="block mb-2 text-sm text-gray-600 dark:text-gray-200"/>

                                    <TextInput
                                        id="password"
                                        type="password"
                                        name="password"
                                        value={data.password}
                                        className="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                        autoComplete="new-password"
                                        onChange={(e) => setData('password', e.target.value)}
                                        required
                                    />

                                    <InputError message={errors.password} className="mt-2"/>
                                </div>

                                <div className="mt-4">
                                    <InputLabel htmlFor="password_confirmation"
                                                value="Confirm Password"
                                                className="block mb-2 text-sm text-gray-600 dark:text-gray-200"/>

                                    <TextInput
                                        id="password_confirmation"
                                        type="password"
                                        name="password_confirmation"
                                        value={data.password_confirmation}
                                        className="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                        autoComplete="new-password"
                                        onChange={(e) => setData('password_confirmation', e.target.value)}
                                        required
                                    />

                                    <InputError message={errors.password_confirmation} className="mt-2"/>
                                </div>

                                <div className="mt-6">
                                    <button
                                        className="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-gray-600 rounded-md hover:bg-gray-500 focus:outline-none focus:bg-gray-400 focus:ring focus:ring-gray-300 focus:ring-opacity-50"
                                        disabled={processing}>
                                        Sign up
                                    </button>
                                </div>
                            </form>

                            <p className="mt-6 text-sm text-center text-gray-400">Already registered?
                                <a href={route('customer.login')}
                                   className="text-blue-500 focus:outline-none focus:underline hover:underline">Sign in
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}
