<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/crud.css">
    <title>ADMIN | PERFIS</title>
</head>
<body>
    <?php include_once 'components/sidenav.php'; ?>
    <div class="modal">
        <div class="modal-container">
            <i class="fas fa-times modal-close"></i>
            <div class="modal-header">
                <i>LO</i>
                <h1 class="modal-title">CADASTRAR</h1>
            </div>
            <div class="modal-content">
                <form action="#" method="post">
                <div class="input-box">
                    <div class="box">
                        <label for="perfil">PERFIL</label>
                        <input type="text" placeholder="Nome do Perfil" name="nome" id="perfil">
                    </div>
                </div>
                <div class="input-box s-50">
                    <div class="box">
                        <label for="nome">Nome</label>
                        <input type="text" placeholder="Nome do Perfil" name="nome" id="nome">
                    </div>
                    <div class="box">
                        <label for="nome">teste</label>
                        <input type="text" placeholder="Nome do Perfil" name="teste" id="teste">
                    </div>
                </div>
                <div class="input-box">
                    <div class="box"><label for="rr">RRR</label>
                    <input type="text"></div>
                </div>
                <input id="btn-confirm" class="btn" type="submit" value="CONFIRM">
                </form>
            </div>
        </div>
    </div>
    <div class="padding-container">
        <?php include_once 'components/header.php'?>
        
        <section>
            <h1 id="table-title"><i class="far fa-id-card"></i>PERFIS</h1>
            <table id="myTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Salary</th>
                        <th>Date</th>
                        <th>Years</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i=1; $i < 1000 ; $i++) { 
                    ?>
                    <tr>
                        <td><?php echo $i?></td>
                        <td>John</td>
                        <td>$556</td>
                        <td>2021-09-20</td>
                        <td>23</td>
                        <td><i class="fas fa-edit"></i></td>
                        <td><i class="fas fa-trash-alt"></i></td>
                    </tr>
                    <?php
                    }
                    ?>
                    
                </tbody>
            </table>
        </section>
    
    </div>
    
    <script src="https://cdn.jsdelivr.net/gh/Rakhmadi/RdataTB@master/dist/index.js"></script>

<script>
    let table = new RdataTB('myTable');

</script>

<script>
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
</script>
</body>
</html>