import React, { useEffect } from "react";
import UserBlock from "../userBlock/UserBlock.jsx"
import useUserApi from "../../../hooks/useUserApi";
import styles from "./ListUser.module.css" 

export default function ListUser() {
    const {request, loading, dataUser, error} = useUserApi();


    useEffect(()=> {
        async function fetchData() {
            await request("GET", null, 1);
    }
        fetchData();
    }, []);

    
    return (
        <section className={styles.section}>
            <section className={styles.background_listuser}></section>
            <section className={styles.sectionInter}>
            <section className={styles.user}> <section className={styles.user_foto}></section>Nome User</section>
                <section>
                    {loading && <p>Carregando...</p>}
                    {error && <p>Erro</p>}
                    {dataUser ? dataUser.map(user => {
                        return <UserBlock
                            idCon = {user.idCon}                  
                            nome = {user.nome}                  
                            descricao = {user.descContact}
                            categoria = {user.categoria}                  
                            telefone = {user.telefone}                  
                        />
                    })
                    : <p>Não há contatos</p>
                    }
                </section>
                <section className={styles.adicionar_contato}>+</section>
            </section>
        </section>
    );
}