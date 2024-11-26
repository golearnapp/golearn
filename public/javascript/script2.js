document.addEventListener('DOMContentLoaded', function()
{
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl,
    {
      initialView: 'dayGridMonth',
      locale: 'pt-br',      
      headerToolbar: 
      {
        left: 'prev,today',
        center: 'title',
        right: 'next'
      }
      
    });
    calendar.render();
});

function initializeDropdown() {
  const profileDropdownList = document.querySelector(".profile-dropdown-list");
  const btn = document.querySelector(".profile-dropdown-btn");

  if (profileDropdownList && btn) {
    const classList = profileDropdownList.classList;

    const toggle = () => classList.toggle("active");

    btn.addEventListener("click", toggle);

    window.addEventListener("click", function (e) {
      if (!btn.contains(e.target)) classList.remove("active");
    });
  }
}

function toggleSidebar() {
  const sidebar = document.getElementById('sidebar');
  const mainContent = document.getElementById('mainContent');
  const menuButton = document.getElementById('menuButton');

  if (sidebar && mainContent && menuButton) {
    // Alterna a visibilidade da sidebar
    sidebar.classList.toggle('collapsed');

    // Ajusta o espaço do main
    if (sidebar.classList.contains('collapsed')) {
      mainContent.classList.add('collapsed');
      mainContent.classList.remove('expanded');
    } else {
      mainContent.classList.add('expanded');
      mainContent.classList.remove('collapsed');
    }

    // Alterna o estado ativo do botão de menu
    menuButton.classList.toggle('active');
  }
}

// Chame as funções para inicializar os componentes
initializeDropdown();
toggleSidebar();

function showForm(formId) {
  // Selecionar todos os formulários
  const forms = document.querySelectorAll('.content');
  if (forms.length === 0) return;

  // Ocultar todos os formulários
  forms.forEach(form => form.classList.remove('active'));

  // Mostrar o formulário selecionado
  const selectedForm = document.getElementById(formId);
  if (selectedForm) {
      selectedForm.classList.add('active');
  }
}
const content = document.querySelector(".content");
const btnNew = document.querySelector(".addNote-content");

const colors = ["#845EC2", "#008F7A", "#008E9B", "#FFC75F", "#FF8066", "#BA3CAF"];
const randomColor = () => colors[Math.floor(Math.random() * colors.length)];

function loadItems() {
  fetch("index.php?action=getNotes")
    .then((response) => response.json())
    .then((items) => {
      content.innerHTML = "";
      items.forEach((item) => addHTML(item));
    });
}

btnNew.onclick = () => {
  const color = randomColor();
  fetch("index.php?action=saveNote", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ text: "", color }),
  }).then(loadItems);
};

function addHTML(item) {
  const div = document.createElement("div");

  div.innerHTML = `<div class="item" style="background-color: ${item.color}">
    <span class="remove">X</span>
    <textarea data-id="${item.id}">${item.text}</textarea>
  </div>`;

  content.appendChild(div);

  div.querySelector("textarea").oninput = (e) => {
    const text = e.target.value;
    const id = e.target.dataset.id;

    fetch("index.php?action=updateNote", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ id, text }),
    });
  };

  div.querySelector(".remove").onclick = () => {
    const id = div.querySelector("textarea").dataset.id;

    fetch("index.php?action=deleteNote", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ id }),
    }).then(loadItems);
  };
}

loadItems();