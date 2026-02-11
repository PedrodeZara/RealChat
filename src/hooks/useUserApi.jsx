import { useState } from "react";

export default function useUserApi() {

    const [loading, setLoading] = useState(false);
    const [dataUser, setDataUser] = useState([]);
    const [error, setError] = useState(null);

    async function request(method, data, idUser) {
        setLoading(true);

        try {
            const response = await fetch("http://localhost:8000/contact" + `${idUser ? "?idInContact=" + idUser  : ""}` , {
                method: method,
                headers: {"Content-Type": "application/json"},                
                body: data ? JSON.stringify(data) : undefined
            });

            const json = await response.json();
            setDataUser(json);

        } catch (err) {
            setError(err);
        } finally {
            setLoading(false);
        }
    }

    return { request, loading, dataUser, error };
}
