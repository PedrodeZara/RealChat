import React, { useEffect, useState } from "react";
import styles from "./DisplayMessagesBody.module.css"
import useMessageApi from "../../../hooks/useMessagesApi";
import useUserApi from "../../../hooks/useUserApi"
import Messageblock from "../messageBlock/Messageblock";

export default function DisplayMessagesBody() {
    const {request, messagesData, loading, error} = useMessageApi();
    //const { request, loading, dataUser, error } = useUserApi(); *Vai entrar no componente* 

    useEffect((() => {
        async function fetchData() {
            await request("GET", null, 11111111111,11111111112);
        }
        fetchData();
    }),[]);
    


    return(
        <main className={styles.mainDisplay}>
            <section className={styles.mainDisplay_glass}></section>
            <section className={styles.mainDisplay_contactBay}>
                <section className={styles.contato_foto}></section>
                <p>{/*loading ? <p>Carregando...</p> : dataUser.nome*/}Pessoa   2</p>
                </section>
                
                <Messageblock/>
            <section className={styles.mainDisplay_postMessages}><section className={styles.mainDisplay_postMessages_button}></section></section>
        </main>
    );
}