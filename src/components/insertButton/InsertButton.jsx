import React, { useState } from "react";
import useUserApi from "../../hooks/useUserApi";

export default function InsertButton() {
    const {request, loading} = useUserApi();
    const [showForm, setShowForm] = useState(false);
    const [dataForm, setDataForm] = useState({
        nome: "",
        decricao: "",
        telefone: ""
    });

    async function fetchApi() {
        dataForm.nome || dataForm.descricao || dataForm.telefone ? await request("POST", dataForm) : alert("Dados não suficientes");
    }

    return(
        <div>

            <button onClick={() => showForm === false ? setShowForm(true) : setShowForm(false)}>+</button>
       
            { showForm && (
                <div>
                    <input 
                        type="text" 
                        placeholder="Nome" 
                        onChange={e => setDataForm({...dataForm, nome: e.target.value})}
                    />

                    <input 
                        type="text" 
                        placeholder="Descricao" 
                        onChange={e => setDataForm({...dataForm, descricao: e.target.value})}
                    />

                    <input 
                        type="text" 
                        placeholder="Telefone" 
                        onChange={e => setDataForm({...dataForm, telefone: e.target.value})}
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