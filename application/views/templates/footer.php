 <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder"><?= $footer;?></a>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?= base_url('assets');?>/vendor/libs/jquery/jquery.js"></script>
    <script src="<?= base_url('assets');?>/vendor/libs/popper/popper.js"></script>
    <script src="<?= base_url('assets');?>/vendor/js/bootstrap.js"></script>
    <script src="<?= base_url('assets');?>/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?= base_url('assets');?>/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?= base_url('assets');?>/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="<?= base_url('assets');?>/js/main.js"></script>

    <!-- Page JS -->
    <script src="<?= base_url('assets');?>/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Inisialisasi DataTables -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        $('#yudisiumTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            responsive: true,
            order: [[0, 'asc']], // Urutkan berdasarkan NIM secara ascending
            language: {
                search: "Cari:",
                paginate: {
                    next: "Selanjutnya",
                    previous: "Sebelumnya"
                }
            }
        });
    });
    document.addEventListener("DOMContentLoaded", function () {
      const chartOptions = {
          chart: {
              type: 'bar',
              height: 350,
          },
          series: [{
              name: 'Jumlah Data',
              data: [
                  <?= $mahasiswa; ?>,
                  <?= $pin; ?>,
                  <?= $nonPin; ?>
              ]
          }],
          xaxis: {
              categories: ['Mahasiswa', 'Mahasiswa Pin', 'Mahasiswa Non Pin']
          },
          colors: ['#696cff', '#8592a3', '#71dd37'],
      };

      const chart = new ApexCharts(document.querySelector("#dataChart"), chartOptions);
      chart.render();
      
  });
</script>
<script>
  function filterJurusan() {
    var fakultasTerpilih = document.getElementById("fakultas").value;
    var jurusanOptions = document.querySelectorAll("#jurusan .jurusan-option");

    jurusanOptions.forEach(function(option) {
      if (option.getAttribute("data-fakultas") === fakultasTerpilih) {
        option.style.display = "block"; // Tampilkan jurusan sesuai fakultas
      } else {
        option.style.display = "none";  // Sembunyikan jurusan yang tidak sesuai
      }
    });

    // Reset pilihan jurusan jika fakultas berubah
    document.getElementById("jurusan").value = "";
  }

  // Panggil fungsi filterJurusan saat halaman dimuat (opsional)
  document.addEventListener("DOMContentLoaded", function() {
    filterJurusan();
  });
</script>
  </body>
</html>



