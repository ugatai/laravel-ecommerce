import React from "react";

/**
 * @param flash
 * @returns {JSX.Element}
 * @constructor
 */
export const FlashMessage = ({flash}) => {
    return (
        <>
            {flash.info &&
                <div className="flex bg-green-100 rounded-lg p-4 my-2 text-sm text-green-700" role="alert">
                    <div>
                        <i className="fa-solid fa-circle-info mr-2"></i>
                        <span className="font-medium">{flash.info}</span>
                    </div>
                </div>}
            {flash.alert &&
                <div className="flex bg-red-100 rounded-lg p-4 my-2 text-sm text-red-700" role="alert">
                    <div>
                        <i className="fa-solid fa-circle-info mr-2"></i>
                        <span className="font-medium">{flash.alert}</span>
                    </div>
                </div>}
        </>
    )
}
