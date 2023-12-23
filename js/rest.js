window.onload = () => {
    viewProducts()
}

async function sendGetRequest(url) {
    return await fetch(url).then(response => {
        if (response.ok) {
            return response.json()
        }
        return response.json().then(error => {
            const e = new Error()
            e.data = error
            throw e
        })
    })
}

async function sendRequest(method, url, body) {
    const headers = {
        'Content-Type': 'application/json'
    }

    return await fetch(url, {
        method: method,
        body: JSON.stringify(body),
        headers: headers
    }).then(response => {
        if (response.ok) {
            return response.json()
        }
        return response.json().then(error => {
            const e = new Error()
            e.data = error
            throw e
        })
    })
}

function viewProducts() {
    let content = document.getElementById('content')
    let resRow = document.getElementById('resRow')
    sendGetRequest('/action/getProducts.php')
        .then(response => {
            console.log(response)

            let sumPrise = 0,
                sumQuant = 0
            response.forEach(value => {
                content.innerHTML += `<tr id="row" class="entry" 
                    onclick="delProduct(${value.id})">
                    <td>${value.id+1}</td>
                    <td>${value.company}</td>
                    <td>${value.product}</td>
                    <td>${value.price}</td>
                    <td>${value.quant}</td>
                    </tr>`
                sumPrise += value.price
                sumQuant += value.quant
            });
            resRow.innerHTML = `<td colspan="3">Итог:</td>
                                <td>${sumPrise}</td>
                                <td>${sumQuant}</td>`
        }).catch(err => console.log(err))
}

function clearProducts() {
    document.getElementById('content').innerHTML = ''
    document.getElementById('resRow').innerHTML = ''
}

function delProduct(id) {
    if (confirm('Удалить запись?')) {
        body = { id: id }
        sendRequest('DELETE', '/action/delProduct.php', body)
            .then(data = () => {
                console.log(data)
                clearProducts()
                viewProducts()
            })
            .catch(err => console.log(err))
    }
}

document.getElementById('btn_add').onclick = () => {
    const body = {
        company: document.getElementById('company').value,
        product: document.getElementById('product').value,
        price: document.getElementById('price').value,
        quant: document.getElementById('quant').value
    }
    sendRequest('POST', '/action/addProduct.php', body)
        .then(data = () => {
            console.log(data)
            clearProducts()
            viewProducts()
        })
        .catch(err => console.log(err))

}