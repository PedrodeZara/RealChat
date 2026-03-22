import React, { useEffect } from "react";
import UserBlock from "../userBlock/UserBlock.jsx"
import useUserApi from "../../../hooks/useUserApi"; 

export default function ListUser() {
    const {request, loading, dataUser, error} = useUserApi();


    useEffect(()=> {
        async function fetchData() {
            await request("GET", null, 1);
    }
        fetchData();
    }, []);

    
    return (
        <section>
            {loading && <p>Carregando...</p>}
            {error && <p>Erro</p>}
            {dataUser ? dataUser.map(user => {
                return <UserBlock
                    idCon = {user.idCon}                  
                    nome = {user.nome}                  
                    descricao = {user.descContact}
                    categoria = {user.Categoria}                  
                />
            })
            : <p>Não há contatos</p>
            }
        </section>
    );
}