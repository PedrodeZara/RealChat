export default async function CategoryAPI(method,data) {
    let url = "http://127.0.0.1:8000/category";
    let louding = false;
    let dataCategory = null; 

    fetch(url, {
        method: method,
        headers: {"Content-type": "application/json"},
        body: data ? JSON.stringify({
            nome: data.nome,
        }) : undefined
    })
    .then(response => {
        response ? louding = true : undefined;
        response.json();

    })
    .then(data => {
        console.log(data)
        dataCategory = data;
    })
    .catch(error => console.error("Erro", error));
    return {louding, dataCategory};
}

