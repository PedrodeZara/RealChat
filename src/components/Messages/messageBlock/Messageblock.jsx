import React, { useEffect, useState } from "react";
import styles from "./Messageblock.module.css"
import useMessageApi from "../../../hooks/useMessagesApi";

export default function Messageblock() {
    const {request, messagesData, loading, error} = useMessageApi();

    useEffect((() => {
        async function fetchData() {
            await request("GET", null, 11111111111,11111111112);
        }
        fetchData();
    }),[] );
    


    return(
            <section  className={styles.mainDisplay_messages}>
                {
                    (
                        loading ? <p>Carregando...</p> :
                        error ? <p>Erro ao carregar</p> :
                        !messagesData || messagesData.length === 0 ? <p>Sem mensagens</p> :
                        messagesData.map(item => (
                            <p key={item.telefone}
                            className={item.telefone_con === "11111111111" ? styles.mensagemContato : styles.mensagemUser}>
                                {/*item.telefone_con === "11111111111" ? <b>{item.User}:</b> : ""*/} 
                                <p>{item.mensagem}</p>
                            </p>
                        ))
                    )   
                } 
            </section>
    );
}