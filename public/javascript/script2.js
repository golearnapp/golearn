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
