import {Head} from '@inertiajs/react';
import Header from "@/Components/Header.jsx";
import Main from "@/Components/Main.jsx";
import Footer from "@/Components/Footer.jsx";

export default function Dashboard({auth}) {
    return (
        <>
            <Head title="Dashboard"/>
            <div className="bg-white">
                <Header auth={auth}/>
                <Main/>
                <Footer/>
            </div>
        </>
    );
}
