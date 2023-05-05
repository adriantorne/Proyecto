const switchButton = document.getElementById('switch');
 
switchButton.addEventListener('click', () => {
    document.body.classList.toggle('dark'); //toggle the HTML body the class 'dark'
    switchButton.classList.toggle('active');//toggle the HTML button with the id='switch' with the class 'active'
});


/* Función para guardar la configuración del modo oscuro */
function setDarkMode(value) {
  if (value) {
    document.documentElement.setAttribute('data-theme', 'dark');
    localStorage.setItem('darkModeEnabled', true);
  } else {
    document.documentElement.removeAttribute('data-theme');
    localStorage.removeItem('darkModeEnabled');
  }
}

/* Función para cambiar al modo oscuro */
function enableDarkMode() {
  setDarkMode(true);
}

/* Función para cambiar al modo claro */
function disableDarkMode() {
  setDarkMode(false);
}

/* Función para manejar el cambio de modo oscuro */
function handleDarkModeChange() {
  var darkModeEnabled = localStorage.getItem('darkModeEnabled');
  if (darkModeEnabled) {
    setDarkMode(true);
  } else {
    setDarkMode(false);
  }
}

/* Evento click del botón */
var darkModeButton = document.getElementById('dark-mode-button');
darkModeButton.addEventListener('click', function() {
  var darkModeEnabled = localStorage.getItem('darkModeEnabled');
  if (darkModeEnabled) {
    disableDarkMode();
  } else {
    enableDarkMode();
  }
});

/* Manejador de eventos DOMContentLoaded para establecer el modo oscuro al cargar la página */
document.addEventListener('DOMContentLoaded', handleDarkModeChange);
