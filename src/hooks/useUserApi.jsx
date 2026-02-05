import { useState } from "react";

export default function useUserApi() {

    const [loading, setLoading] = useState(false);
    const [dataUser, setDataUser] = useState([]);
    const [error, setError] = useState(null);

    async function request(method, data) {
        setLoading(true);

        try {
            const response = await fetch("http://127.0.0.1:8000/user", {
                method: method,
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
