table.onclick = function(e) {
    if (e.target.tagName != 'TH') return
    let th = e.target
    sortTable(th.cellIndex, th.dataset.type)
}

function sortTable(colIndex, type) {
    let tbody = table.querySelector('tbody')
    let rowsArray = Array.from(tbody.rows)
    let compare
    switch (type) {
        case 'number':
            compare = function(rowA, rowB) {
                return rowA.cells[colIndex].innerHTML - rowB.cells[colIndex].innerHTML
            }
            break;
        case 'string':
            compare = function(rowA, rowB) {
                return rowA.cells[colIndex].innerHTML > rowB.cells[colIndex].innerHTML ? 1 : -1
            }
            break;
    }
    rowsArray.sort(compare)
    tbody.append(...rowsArray)
}