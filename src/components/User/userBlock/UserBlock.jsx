import React, { useEffect } from "react";
import useMessageApi from "../../../hooks/useMessagesApi";
import DisplayMessages from "../../Messages/displayMessages/DisplayMessages";

export default function UserBlock({id, nome, contato, descricao, categoria}) {

    const {request, messagesData, loading, error} = useMessageApi();
    


    return(
        <section>
            <button onClick={() => console.log(id)}>
                <div>
                    <p>{nome}</p>
                    <p>{descricao}</p>
                    <p>{categoria}</p>
                <br/>
                </div>
            </button>
        </section>
    );
}