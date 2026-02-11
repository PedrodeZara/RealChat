import React, { useState } from "react";

export default function useEnconterUserId() {
    const [id, setId] = useState(null);
    const [error, setError] = useState(null);

    async function request() {
        try {
            
            const response = await fetch("http://localhost:8000/session", {
                method:"GET",
                headers:{"Content-type": "application/json"},
                credentials: "include"
            });
            
            const data = await response.json();
            console.log(data);
            setId(Number(data.id_user));
        }
        
        catch (err) {
            setError(err);
        }
    }
        
    return{request,id, error}
}