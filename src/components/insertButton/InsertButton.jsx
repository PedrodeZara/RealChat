import React, { useState } from "react";
import useUserApi from "../../hooks/useUserApi";

export default function InsertButton() {
    const {request, loading} = useUserApi();
    const [showForm, setShowForm] = useState(false);
    const [dataForm, setDataForm] = useState({
        idCategory: "",
        idContact: "",
        idUser: ""
    });

    async function fetchApi() {
        dataForm.idCategory || dataForm.idContact || dataForm.idUser ? await request("POST", dataForm) : alert("Dados não suficientes");
    }

    return(
        <div>

            <button onClick={() => showForm === false ? setShowForm(true) : setShowForm(false)}>+</button>
       
            { showForm && (
                <div>
                    <input 
                        type="text" 
                        placeholder="idCategory" 
                        onChange={e => setDataForm({...dataForm, idCategory: e.target.value})}
                    />

                    <input 
                        type="text" 
                        placeholder="idContact" 
                        onChange={e => setDataForm({...dataForm, idContact: e.target.value})}
                    />

                    <input 
                        type="text" 
                        placeholder="idUser" 
                        onChange={e => setDataForm({...dataForm, idUser: e.target.value})}
                    />

                    <button onClick={() => {
                        fetchApi();
                        setShowForm(false);    
                    }
                    }>Adicionar</button>
                </div>
            )}

        </div>
    );
}