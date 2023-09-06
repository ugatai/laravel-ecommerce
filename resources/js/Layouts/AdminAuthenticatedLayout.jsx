import {AdminSidebar} from "@/Components/Sidebar/index";
import {AdminNav} from "@/Components/Nav/index";

export default function Authenticated({user, children}) {
    return (
        <>
            <AdminNav user={user}/>

            <div className="bg-gray-100 min-h-screen flex flex-row">
                <AdminSidebar/>
                <main className="flex-grow">{children}</main>
            </div>
        </>
    );
}
