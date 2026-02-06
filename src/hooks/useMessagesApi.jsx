import React, { useState } from "react";

export default function useMessageApi() {
    
    const [loading, setLoading] = useState(false);
    const [error, setError] = useState(null);
    const [messagesData, setMessagesData] = useState(null);

    async function request(method, data, idUser, idContact) {
        setLoading(true)

        try {
            const response = await fetch("http://127.0.0.1:8000/message" + `?idInContact=${idUser}&idInRecieve=${idContact}` , {
                method,
                headers: {"Content-Type": "application/json"},                
                body: JSON.stringify(data)
            });
    
            const json = await response.json();
            setMessagesData(json);
        }

        catch(er) {
            setError(err);
        }

        finally {
            setLoading(false);
        }
    }

    return {messagesData, loading, error}
}