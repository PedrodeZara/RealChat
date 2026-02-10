import React, { useState } from "react";

export default function useEnconterUserId() {
    const [id, setId] = useState(null);
    const [error, setError] = useState(null);

    async function request() {
        try {
            
            const response = fetch("http://127.0.0.1:8000/session", {
                method:"GET",
                headers:{"Content-type": "application/json"},
                credentials: "include"
            });
            
            const data = await response.json();
            setId(data.id);
            console.log("Sessão:", data);
        }
        
        catch (err) {
            setError(err)
        }
    }
        
    return{request,id, error}
}