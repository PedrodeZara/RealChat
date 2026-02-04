export default async function ContactAPI(method,data) {
    let url = "http://127.0.0.1:8000/contact";
    let louding = false;
    let dataUser = null; 

    fetch(url, {
        method: method,
        headers: {"Content-type": "application/json"},
        body: data ? JSON.stringify({
            idCategory: data.idCategory,
            idContact: data.idContact,
            idUser: data.idUser
        }) : undefined
    })
    .then(response => {
        response ? louding = true : undefined;
        response.json();

    })
    .then(data => {
        console.log(data)
        dataUser = data;
    })
    .catch(error => console.error("Erro", error));
    return {louding, dataUser};
}

