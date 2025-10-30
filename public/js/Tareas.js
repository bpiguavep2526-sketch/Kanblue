document.addEventListener('DOMContentLoaded', function() {
  const btnNuevaTarea = document.getElementById('btnNuevaTarea');
  if(btnNuevaTarea) {
    btnNuevaTarea.addEventListener('click', function() {
      // Redirige a la ruta Laravel 'editartarea'
      window.location.href = '//editarTarea'; // o usa route('editartarea') si generas URL desde Blade
    });
  }
});
