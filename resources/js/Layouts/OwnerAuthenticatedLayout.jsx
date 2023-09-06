import {OwnerSidebar} from "@/Components/Sidebar/index";
import {OwnerNav} from "@/Components/Nav/index";

export default function Authenticated({user, children}) {
    return (
        <>
            <OwnerNav user={user}/>

            <div className="bg-gray-100 min-h-screen flex flex-row">
                <OwnerSidebar/>
                <main className="flex-grow">{children}</main>
            </div>
        </>
    );
}
