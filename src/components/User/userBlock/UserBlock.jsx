import React, { useEffect } from "react";

export default function UserBlock({nome, contato, descricao, categoria}) {

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