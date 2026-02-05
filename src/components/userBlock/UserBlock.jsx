import React, { useEffect } from "react";
import useUserApi from "../../hooks/useUserApi"; 

export default function UserBlock({nome, descricao, telefone}) {

    return(
        <div>
            <p>{nome}</p>
            <p>{descricao}</p>
            <p>{telefone}</p>
            <br/>
        </div>
    );
}