import React, { useState } from "react";

export default function useMessageApi() {
    
    const [loading, setLoading] = useState(false);
    const [error, setError] = useState(null);
    const [messagesData, setMessagesData] = useState(null);

    async function request(method, data, idUser, idContact) {
        setLoading(true)

        try {
            const response = await fetch("http://localhost:8000/message" + `?idInContact=${idUser}&idInReceive=${idContact}` , {
                method,
                headers: {"Content-Type": "application/json"},                
                body: data ? JSON.stringify(data) : undefined
            });
    
            const json = await response.json();
            
            if (json.error) {
                setMessagesData([]);
            }

            else {
                setMessagesData(json);
            }
        }

        catch(err) {
            setError(err);
        }

        finally {
            setLoading(false);
        }
    }
    
    return {request, messagesData, loading, error}
}