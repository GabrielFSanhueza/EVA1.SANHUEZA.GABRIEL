document.addEventListener('DOMContentLoaded', () => {
    const modoSwitch = document.querySelector('#modoSwitch');
  
    // Establecer el modo predeterminado a claro si no está almacenado
    if (!localStorage.getItem('darkMode')) {
      localStorage.setItem('darkMode', 'false');
    }
  
    const isDarkMode = localStorage.getItem('darkMode') === 'true';
  
    // Aplicar modo oscuro si está activado
    if (isDarkMode) {
      document.body.classList.add('dark-mode');
      modoSwitch.checked = true; // Marcar el switch como activado
    }
  
    // Cambiar el modo claro/oscuro al hacer clic en el switch
    modoSwitch.addEventListener('change', () => {
      document.body.classList.toggle('dark-mode'); // Alternar la clase 'dark-mode' en el body
      const isDarkMode = document.body.classList.contains('dark-mode');
      localStorage.setItem('darkMode', isDarkMode); // Guardar el estado del modo en localStorage
    });
  });
  
  