import React, { useEffect } from "react";
import useUserApi from "../../hooks/useUserApi"; 

export default function UserBlock({nome, descricao, categoria}) {

    return(
        <section>
            <button>
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