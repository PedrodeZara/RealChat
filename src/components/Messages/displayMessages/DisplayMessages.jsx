import React, { useEffect } from "react";

export default function DisplayMessages({id}) {
    const {request, messagesData, loading, error} = useMessageApi();


    useEffect(() => {
        async function fetchApi() {
            await request("GET", null, 1, id);
        }

        fetchApi();
    }, [id])

    return(
        <main>
            {loading && <p>Carregando...</p>}
            {error && <p>Erro</p>}
            {messagesData && messagesData.map(data => {
                return <MessageBlock
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