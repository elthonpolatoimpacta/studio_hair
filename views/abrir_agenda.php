<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Abrir Agenda</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .calendario td {
      width: 50px;
      height: 50px;
      text-align: center;
      cursor: pointer;
      
    }

    .verde {
        background-color: #198754 !important;
        color: white;
    }

    .vermelho{
      background-color: #dc3545 !important;
      color: white;
    }

    .branco{
      background-color: white;
    }
    .legenda span {
      display: inline-block;
      width: 20px;
      height: 20px;
      margin-right: 5px;
    }
  </style>
</head>
<body class="container py-5">
  <h1 class="mb-4">Abrir Agenda</h1>

  <div class="row mb-4">
    <div class="col-md-2">
      <label for="ano" class="form-label">Ano</label>
      <input type="number" id="ano" class="form-control">
    </div>
    <div class="col-md-2">
      <label for="mes" class="form-label">Mês</label>
      <select id="mes" class="form-select">
        <option value="1">Janeiro</option>
        <option value="2">Fevereiro</option>
        <option value="3">Março</option>
        <option value="4">Abril</option>
        <option value="5">Maio</option>
        <option value="6">Junho</option>
        <option value="7">Julho</option>
        <option value="8">Agosto</option>
        <option value="9">Setembro</option>
        <option value="10">Outubro</option>
        <option value="11">Novembro</option>
        <option value="12">Dezembro</option>
      </select>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8">
      <table class="table table-bordered calendario">
        <thead class="table-light">
          <tr>
            <th>Dom</th><th>Seg</th><th>Ter</th><th>Qua</th><th>Qui</th><th>Sex</th><th>Sab</th>
          </tr>
        </thead>
        <tbody id="corpo-calendario">
          <!-- calendário gerado dinamicamente -->
        </tbody>
      </table>
      <div class="d-flex gap-3 legenda">
        <div><span class="bg-success"></span> Aberto</div>
        <div><span class="bg-danger"></span> Fechado</div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Horários</h5>
          <button class="btn btn-outline-secondary btn-sm mb-3" onclick="marcarTodos()">Marcar todos</button>
          <div id="listaHorarios" class="form-check">
            <div class="form-check"><input class="form-check-input" type="checkbox" value="08:00:00"> 08:00 - 09:00</div>
            <div class="form-check"><input class="form-check-input" type="checkbox" value="09:00:00"> 09:00 - 10:00</div>
            <div class="form-check"><input class="form-check-input" type="checkbox" value="10:00:00"> 10:00 - 11:00</div>
            <div class="form-check"><input class="form-check-input" type="checkbox" value="11:00:00"> 11:00 - 12:00</div>
            <div class="form-check"><input class="form-check-input" type="checkbox" value="13:00:00"> 13:00 - 14:00</div>
            <div class="form-check"><input class="form-check-input" type="checkbox" value="14:00:00"> 14:00 - 15:00</div>
            <div class="form-check"><input class="form-check-input" type="checkbox" value="15:00:00"> 15:00 - 16:00</div>
            <div class="form-check"><input class="form-check-input" type="checkbox" value="16:00:00"> 16:00 - 17:00</div>
            <div class="form-check"><input class="form-check-input" type="checkbox" value="17:00:00"> 17:00 - 18:00</div>
            <div class="form-check"><input class="form-check-input" type="checkbox" value="18:00:00"> 18:00 - 19:00</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-4">
    <button class="btn btn-primary" onclick="salvarAgenda()">Salvar</button><a href="../public/index.php" class="btn btn-custom">← Voltar para o início</a>
  </div>
  <script>
    async function buscarDias(ano, mes) {
      const res = await fetch(`../controllers/AgendaController.php?acao=buscar&ano=${ano}&mes=${mes}`);
      return await res.json();
    }

    function marcarTodos() {
      const checkboxes = document.querySelectorAll('#listaHorarios input[type="checkbox"]');
      const todosMarcados = Array.from(checkboxes).every(cb => cb.checked);
      checkboxes.forEach(cb => cb.checked = !todosMarcados);
    }

    async function gerarCalendario(ano, mes) {
      const corpo = document.getElementById("corpo-calendario");
      corpo.innerHTML = "";
      const primeiroDia = new Date(ano, mes - 1, 1);
      const ultimoDia = new Date(ano, mes, 0).getDate();
      let diaSemana = primeiroDia.getDay();
      let linha = document.createElement("tr");
      const diasDoBanco = await buscarDias(ano, mes);
      
      const mapa = {};
        diasDoBanco.forEach(d => {
        const dia = parseInt(d.data.split("-")[2], 10); // garante o dia correto da string
        mapa[dia] = d.disponivel;
        });      
      

      console.log(mapa);
      for (let i = 0; i < diaSemana; i++) {
        linha.innerHTML += '<td class="branco"></td>';
      }

      for (let dia = 1; dia <= ultimoDia; dia++) {
        const data = new Date(ano, mes - 1, dia);
        const td = document.createElement("td");
        td.textContent = dia;
        td.dataset.dia = dia;

        if (data.getDay() === 0 ) {
          td.className = "branco";
        } else {
          const status = mapa[dia] !== undefined ? (mapa[dia] == 1 ? "verde" : "vermelho") : "verde";
          td.className = status;
          td.addEventListener('click', () => {
            td.classList.toggle("verde");
            td.classList.toggle("vermelho");
          });
        }

        linha.appendChild(td);

        if ((diaSemana + dia) % 7 === 0 || dia === ultimoDia) {
          corpo.appendChild(linha);
          linha = document.createElement("tr");
        }
      }
    }

    async function salvarAgenda() {
      const ano = document.getElementById('ano').value;
      const mes = document.getElementById('mes').value;
      const horarios = Array.from(document.querySelectorAll('#listaHorarios input[type="checkbox"]:checked')).map(cb => cb.value);
      const dias = document.querySelectorAll("#corpo-calendario td[data-dia]");
      const agenda = [];

      dias.forEach(td => {
        if (td.classList.contains("verde") || td.classList.contains("vermelho")) {
          const dataStr = `${ano}-${String(mes).padStart(2, '0')}-${String(td.dataset.dia).padStart(2, '0')}`;
          agenda.push({
            data: dataStr,
            disponivel: td.classList.contains("verde") ? 1 : 0,
            horarios: horarios
          });
        }
      });

      await fetch('../controllers/AgendaController.php?acao=salvar', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ ano, mes, agenda })
      });

      alert("Agenda salva com sucesso!");
    }

    document.addEventListener('DOMContentLoaded', async () => {
      const dataAtual = new Date();
      const anoEl = document.getElementById('ano');
      const mesEl = document.getElementById('mes');

      anoEl.value = dataAtual.getFullYear();
      mesEl.value = dataAtual.getMonth() + 1;
      await gerarCalendario(anoEl.value, mesEl.value);

      anoEl.addEventListener('change', () => gerarCalendario(anoEl.value, mesEl.value));
      mesEl.addEventListener('change', () => gerarCalendario(anoEl.value, mesEl.value));
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>