<footer id="footer">
  <?php do_action('footer_section');?>
</footer>
  <style>
    .fixed{
      position: fixed;
    }
  </style>
  <?php wp_footer();?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
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
    $(".fname").mouseleave(function(){
      var val1 =  $(".fname").val();
      $("[name='wpep-first-name-field']").val(val1);
      $("[name='wpep-first-name-field']").focus();
    });
    $(".lname").mouseleave(function(){
      var val2 =  $(".lname").val();
      $("[name='wpep-last-name-field']").val(val2);
      $("[name='wpep-last-name-field']").focus();
    });
    
    
  </script>



</body>

</html>