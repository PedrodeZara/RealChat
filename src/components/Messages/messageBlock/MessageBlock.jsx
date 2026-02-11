import React, { useEffect, useState } from "react";
import useEnconterUserId from "../../../hooks/useEnconterUserId";

export default function UserBlock({ nome, mensagem, idU, idC }) {
    const { request, id, error } = useEnconterUserId();

    useEffect(() => {
        request();
    }, [request]);

    console.log("Erro:", error);
    console.log("Id:", id);

    return (
        <section>
            <div style={{ color: id && idU == id ? "blue" : "red" }}>
                <p>{nome}</p>
                <p>{mensagem}</p>
                <p>{idU}</p>
                <p>{idC}</p>
                <br />
            </div>
        </section>
    );
}
