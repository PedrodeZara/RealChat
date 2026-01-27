url = "http://127.0.0.1:8000/user";

fetch(url, {
    method: "PUT",
    headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({
        id: 1,
        nome:'roberto',
        descricao:'um dia...',
        telefone:'12345678910'
    })
})
.then(response => response.json())
.then(data => {
    console.log(data);
})
.catch(error => {
    console.error('Erro:', error);
});

