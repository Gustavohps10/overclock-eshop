
let table = new RdataTB('myTable');

let tableRow = document.querySelector("#C tbody tr td");

let buttons = [
    {id: "btn-export-csv", text: "EXPORT CSV"},
    {id: "btn-export-json", text: "EXPORT JSON"},
    {id: "btn-register", text: "REGISTER"}
];

buttons.forEach(btn => {
    button = document.createElement('button')
    button.setAttribute("id", btn.id);
    button.classList.toggle('btn');
    button.textContent = btn.text;
    tableRow.appendChild(button);
});

let btnRegister = document.getElementById('btn-register');
let iconAdd =  document.createElement('i');
btnRegister.appendChild(iconAdd);
iconAdd.setAttribute("class", "fas fa-plus");

let modal = document.querySelector('.modal');

let modalClose = document.querySelector('.modal-close');
document.querySelectorAll('#C td button').forEach(item => {
    let id = item.id;
    item.addEventListener('click', event => {
        switch (id) {
            case "btn-export-csv":
                table.DownloadCSV('FileName');	
                break;
            case "btn-export-json":
                table.DownloadJSON('FileName');	
            break;
            default:
                modal.classList.toggle('active')
                break;
        }
    });
});


modalClose.onclick = () =>{
    modal.classList.remove('active');
}
