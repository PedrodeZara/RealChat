import React, { useEffect, useState } from "react";
import useMessageApi from "../../../hooks/useMessagesApi";
import DisplayMessages from "../../Messages/displayMessages/DisplayMessages";
import useEnconterUserId from "../../../hooks/useEnconterUserId";

export default function UserBlock({nome, descricao, categoria, telefone}) {

    const {request, messagesData, loading, error} = useMessageApi();
    const [visu, setVisu] = useState(false);

    return(
        <section id = {`${telefone}`}
        onClick={() => {
            if (!visu) {
                setVisu(true);
                request("GET", null, 11111111111,telefone);
            }
            else {
                setVisu(false);
            }
            
        }}>
            <button>
                <div>
                    <p>{nome}</p>
                    <p>{descricao}</p>
                    <p>{categoria}</p>
                    <p>{telefone}</p>
                <br/>
                </div>
            </button>
            
            {
                
                visu && (
                    loading ? <p>Carregando...</p> :
                    error ? <p>Erro ao carregar</p> :
                    !messagesData || messagesData.length === 0 ? <p>Sem mensagens</p> :
                    messagesData.map(item => (
                        <p key={item.telefone}
                        style={{color: item.telefone_con != 11111111111 ? "blue" : "red"}}>
                            <b>{item.User}:</b> {item.mensagem}
                        </p>
                    ))
                )   

                
            }

        </section>


    );

    
}