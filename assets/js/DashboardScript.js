window.addEventListener('DOMContentLoaded', (event) => {
  $('.sidebarToggle').click(function () {
    // event.preventDefault();
    document.body.classList.toggle('sb-sidenav-toggled');
    localStorage.setItem(
      'sb|sidebar-toggle',
      document.body.classList.contains('sb-sidenav-toggled')
    );
  });
});
