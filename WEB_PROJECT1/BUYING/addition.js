const formThingy = document.querySelector("form[method='get']");
const tableToAdd = document.getElementById("billBody");

const addRow = function(table, object){
    table.innerHTML += "<tr>";
    table.innerHTML += "<td>"+object.name+"</td>";
    table.innerHTML += "<td>"+object.price+"</td>";
    table.innerHTML += "<td>"+object.quantity+"</td>";
    table.innerHTML += "</tr>";
}

formThingy.addEventListener('submit', ({ target })=>{
    const formData = new FormData(target);
    addRow(tableToAdd,
        {
            name : "",
            price : "",
            quantity : ""
        });
});