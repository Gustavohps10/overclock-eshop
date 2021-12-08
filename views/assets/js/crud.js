
let table = new RdataTB('myTable');

let tableRow = document.querySelector("#C tbody tr td");

let buttons = [
    {id: "btn-export-csv", text: "EXPORT CSV", type:"button"},
    {id: "btn-export-json", text: "EXPORT JSON", type:"button"},
    {id: "btn-register", text: "CADASTRAR", type:"a", href: window.location.href + "/cadastrar"}
];

buttons.forEach(btn => {
    button = document.createElement(btn.type);
    button.setAttribute("id", btn.id);
    if(btn.href){
        button.setAttribute("href", btn.href);
    }
    button.classList.toggle('btn');
    button.textContent = btn.text;
    tableRow.appendChild(button);
});

let btnRegister = document.getElementById('btn-register');
let iconAdd =  document.createElement('i');
btnRegister.appendChild(iconAdd);
iconAdd.setAttribute("class", "fas fa-plus");

let modalClose = document.querySelector('.modal-close');
document.querySelectorAll('#C td button').forEach(item => {
    let id = item.id;
    item.addEventListener('click', () => {
        switch (id) {
            case "btn-export-csv":
                table.DownloadCSV('FileName');	
                break;
            case "btn-export-json":
                table.DownloadJSON('FileName');	
            break;
        }
    });
});

let modal = document.querySelector('.modal');
let hiddenId = document.getElementById("hidden-id");
let spanId = document.getElementById("span-id");
document.querySelectorAll('.btn-delete').forEach(btnDelete => {
    btnDelete.addEventListener('click', () => {
        modal.classList.toggle('active');
        hiddenId.value = btnDelete.id;
        spanId.innerText = btnDelete.id; 
    });
});


modalClose.onclick = () =>{
    modal.classList.remove('active');
}
