      </div>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- Jquery JS-->
    <script src="<?php echo base_url('vendor/jquery-3.2.1.min.js'); ?>"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo base_url('vendor/bootstrap-4.1/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendor/bootstrap-4.1/bootstrap.min.js'); ?>"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo base_url('vendor/slick/slick.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendor/wow/wow.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendor/animsition/animsition.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendor/counter-up/jquery.waypoints.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendor/counter-up/jquery.counterup.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendor/circle-progress/circle-progress.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendor/perfect-scrollbar/perfect-scrollbar.js'); ?>"></script>
    <script src="<?php echo base_url('vendor/chartjs/Chart.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendor/select2/select2.min.js'); ?>"></script>

    <!-- Main JS-->
    <script src="<?php echo base_url('js/main.js'); ?>"></script>
    <script src="<?php echo base_url('js/DataTables/datatables.min.js'); ?>"></script>

    <script>
      $("#zero_config").DataTable();
    </script>

    <script>
    $(document).ready(function(){
        setTimeout(function() {
            $('#flashdata').fadeOut('slow');
        }, 5000); // <-- time in milliseconds, 5000 ms = 5 sec
    });
    document.querySelector('.card-header .btn-copy').addEventListener('click', function() {
      var text = document.querySelector('.body-text').innerText;
      var textarea = document.createElement('textarea');
      textarea.textContent = text;
      document.body.appendChild(textarea);
      textarea.select();
      document.execCommand('copy');
      document.body.removeChild(textarea);
      // When the user clicks on div, open the popup
    });
    function myFunction() {
      var popup = document.getElementById("myPopup");
      popup.classList.toggle("show");
      setTimeout(function() {
          $('#myPopup').fadeOut('slow');
      }, 1500);
    }
    </script>

  </body>
</html>