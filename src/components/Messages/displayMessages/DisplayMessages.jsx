import React, { useEffect } from "react";
import useMessageApi from "../../../hooks/useMessagesApi";
import MessageBlock from "../messageBlock/MessageBlock"

export default function DisplayMessages({id}) {
    const {request, messagesData, loading, error} = useMessageApi();


    useEffect(() => {
        async function fetchApi() {
            await request("GET", null, 2, 1);
        }

        fetchApi();
    }, [])

    return(
        <main>
            {loading && <p>Carregando...</p>}
            {error && <p>Erro</p>}
            {messagesData && messagesData.map(data => {
                return <MessageBlock
                    key = {data.id}
                    nome = {data.User}
                    contato = {data.Contato}
                    mensagem = {data.mensagem}
                    idC={data.idContato}
                    idU={data.idUser}
                />
            })}
        </main>
    );
}