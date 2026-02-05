import React, { useEffect } from "react";
import UserBlock from "../userBlock/UserBlock.jsx"
import useUserApi from "../../hooks/useUserApi"; 

export default function ListUser() {
    const {request, loading, dataUser, error} = useUserApi();


    useEffect(()=> {
        async function fetchData() {
            await request("GET");
    }
        fetchData();
    }, []);
    
    return (
        <section>
            {loading && <p>Carregando...</p>}
            {error && <p>Erro</p>}
            {dataUser.map(user => {
                return <UserBlock
                    key = {user.id}                  
                    nome = {user.nome}                  
                    descricao = {user.descricao}
                    telefone = {user.telefone}                  
                />
            })}
        </section>
    );
}