<footer id="footer">
  <?php do_action('footer_section');?>
</footer>
  <style>
    .fixed{
      position: fixed;
    }
  </style>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script>
    $('#toggle').click(function () {
      $(this).toggleClass('active');
      $(this).toggleClass('fixed');
      $('#overlay').toggleClass('open');
    });
  </script>
</body>

</html>