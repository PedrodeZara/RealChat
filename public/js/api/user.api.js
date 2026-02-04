export default async function UserAPI(method,data) {
    let url = "http://127.0.0.1:8000/user";
    let louding = false;
    let dataUser = null; 

    fetch(url, {
        method: method,
        headers: {"Content-type": "application/json"},
        body: data ? JSON.stringify({
            id: data.id,
            nome: data.nome,
            descricao: data.descricao,
            telefone: data.telefone
        }) : undefined
    })
    .then(response => {
        response ? louding = true : undefined;
        return response.json();

    })
    .then(data => {
        console.log(data)
        dataUser = data;
    })
    .catch(error => console.error("Erro", error));
    return {louding, dataUser};
}

