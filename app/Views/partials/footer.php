<!-- Footer Start -->
<footer class="footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col fs-13 text-muted text-center">
        &copy; <script>
          document.write(new Date().getFullYear())
        </script> - Made with <span class="mdi mdi-heart text-danger"></span> by <a href="#!" class="text-reset fw-semibold">XYZ</a>
      </div>
    </div>
  </div>
</footer>
<!-- end Footer -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const toggleBtn = document.querySelector('.button-toggle-menu');
    if (toggleBtn) {
      toggleBtn.addEventListener('click', () => {
        const body = document.body;
        const current = body.getAttribute('data-sidebar');
        const next = current === 'default' ? 'hidden' : 'default';
        body.setAttribute('data-sidebar', next);
        localStorage.setItem('sidebarState', next);
      });

      const savedSidebarState = localStorage.getItem('sidebarState');
      if (savedSidebarState) {
        document.body.setAttribute('data-sidebar', savedSidebarState);
      }
    }
  });
</script>