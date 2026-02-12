import React, { useEffect, useState } from "react";
import useMessageApi from "../../../hooks/useMessagesApi";
import DisplayMessages from "../../Messages/displayMessages/DisplayMessages";
import useEnconterUserId from "../../../hooks/useEnconterUserId";

export default function UserBlock({idCon, nome, descricao, categoria}) {

    const {request, messagesData, loading, error} = useMessageApi();
    const [visu, setVisu] = useState(false)

    return(
        <section>
            <button onClick={() => {setVisu(true)}}>
                <div>
                    <p>{nome}</p>
                    <p>{descricao}</p>
                    <p>{categoria}</p>
                <br/>
                </div>
            </button>

            {setVisu && (
            
            <DisplayMessages id={idCon}/>

            )

            }

        </section>
    );
}