<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="<?= base_url('img/askes.jpg') ?>">

  
  <title>
    Keluhan | Sistem Informasi Kesehatan Taruna
  </title>
  <!-- LINK MASTER  -->

  <?= $master ?>

  <link href=" <?= base_url('css/dataTables.min.css?v=2.0.0') ?>" rel="stylesheet" />

  <!-- DATATABLES -->
  <style>
      tr,td{
          background:transparent !important;
          padding: 0px !important;
          margin: 0px !important;
          border-bottom:0px;
      }
      #table_id_wrapper .dt-buttons{
          float:left !important;
          margin-bottom:0px !important;
          
      }
      #myTable_wrapper .row:first-child{
        padding-left: 20px;
        padding-right: 20px;
        margin-top: 10px;
      }
      #myTable_wrapper .row:nth-child(3){
        padding-left: 20px;
        padding-right: 20px;
      }
      #table_id_wrapper .dataTables_filter{
        float:right ;
      }
      #myTable_previous a,#myTable_next a{
        width: auto;
        border-radius: 0px !important;
        padding: 4px 10px;
        margin: 0px 10px;
      }
     
  </style>

</head>

<body class="g-sidenav-show  bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <!-- LINK SIDEBAR  -->
  <?= $sidebar ?>
  <div class="main-content position-relative max-height-vh-100 h-100">
    <!-- LINK NAVBAR -->
    <?= $navbar ?>

    <!-- LINK CONTENT -->
   
    <div class="container-fluid py-4">
      <div class="container mb-4">
        <div class="row"> 
            <div class="col-md-12">
                <div class="card">
                    <form action="add_keluhan" method="post">
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0 font-weight-bold">Tambah Keluhan Penyakit Yang Di Alami</p>
                                <button class="btn btn-light btn-sm ms-auto" type="reset"><i class="fa fa-trash"></i> Batal </button>
                                <button class="btn btn-primary btn-sm ms-2 "><i class="fa fa-plus"></i> Tambah Keluhan </button>

                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Input Keluhan Jika Ada, <small>(Jika anda memiliki minimal 1 keluhan maka kondisi akan otomatis Sakit)</p>
                            <div class="row">
                                <div class="col-md-8">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Keluhan *</label>
                                    <input class="form-control" type="text" name="keluhan" placeholder="Inti Keluhan Penyakit, Contoh : Flu" required>
                                </div>
                                </div>

                                <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Kategori Keluhan *</label>
                                    <select  class="form-control form-select" name="kategori_keluhan" required>
                                        <option selected value="1">Ringan</option>
                                        <option value="2">Sedang</option>
                                        <option value="3">Berat</option>
                                    </select>
                                </div>
                                </div>
                            
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Deskripsi Keluhan *<small>(Deskripsi detail dari keluhan)</small></label>
                                    <textarea class="form-control" type="text" name="deskripsi_keluhan" required placeholder="Deskripsi Detail Dari Keluhan, Contoh : Sudah terkena flu dari 3 hari yang lalu, badan terasa panas dingin dan kepala terasa pusing" style="height:300px;max-height:300px"></textarea>

                                </div>
                                </div>

                                

                                
                                
                            </div>
                    
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
      </div>
      <!-- LINK FOOTER  -->
      <?= $footer ?>
    </div>
  </div>
 
  <!--   Core JS Files   -->
  <script src="<?= base_url('js/core/popper.min.js')?>"></script>
  <script src="<?= base_url('js/core/bootstrap.min.js')?>"></script>
  <script src="<?= base_url('js/plugins/perfect-scrollbar.min.js')?>"></script>
  <script src="<?= base_url('js/plugins/smooth-scrollbar.min.js')?>"></script>
  <script src="<?= base_url('js/plugins/chartjs.min.js')?>"></script>
 

 
  <script src="<?= base_url('js/jquery.min.js?v=2.0.0') ?> "></script>
  <script>
      $('form').submit(function(){
        $(this).find(':submit').attr('disabled','disabled');
        });
  </script>
  <script src="<?= base_url('js/bootstrap.min.js?v=2.0.0') ?> "></script>
  <script src="<?= base_url('js/bootstrap5.min.js?v=2.0.0') ?> "></script>

</body>

</html>