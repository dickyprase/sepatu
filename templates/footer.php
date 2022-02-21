<footer class="footer">
                <div class="container-fluid">
				    <div class="row">
                        <div class="col-md-6">
                            <nav class="d-flex">
                                <ul class="m-0 p-0">
                                    <li>
                                        <a href="#">
                                            Home
                                        </a>
                                    </li>
                            </nav>
                    
                        </div>
                        <div class="col-md-6">
                        <p class="copyright d-flex justify-content-end"> &copy 2022 Design by  <a href="#">  CV Sepatu</a>
                            </p>
                        </div>
				    </div>
				</div>
            </footer>					
			<div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
   <script src="assets/js/popper.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
   <script src="assets/js/jquery-3.3.1.min.js"></script>
     <!-- Page level plugins -->
     <script src="assets/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/datatables/dataTables.bootstrap4.min.js"></script>
  
    <script type="text/javascript">
        $(document).ready(function () {
            $('#dtBasicExample').DataTable();

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
				$('#content').toggleClass('active');
            });
			
			 $('.more-button,.body-overlay').on('click', function () {
                $('#sidebar,.body-overlay').toggleClass('show-nav');
            });
        });
    </script>
</body>
</html>


