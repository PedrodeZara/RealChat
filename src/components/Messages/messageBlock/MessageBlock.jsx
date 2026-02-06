import React from "react";

export default function UserBlock({nome, mensagem, idU, idC}) {

    return(
        <section>
                <div>
                    <p>{nome}</p>
                    <p>{mensagem}</p>
                    <p>{idU}</p>
                    <p>{idC}</p>
                <br/>
                </div>
        </section>
    );
}