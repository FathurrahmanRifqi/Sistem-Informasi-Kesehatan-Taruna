<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="<?= base_url('img/askes.jpg') ?>">
  
  <title>
    Dashboard | Sistem Informasi Kesehatan Taruna
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
<div class="preloader" style="display: none;">
        <div class="loader_34">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <!-- LINK SIDEBAR  -->
  <?= $sidebar ?>
  
  <main class="main-content position-relative border-radius-lg ">
    <!-- LINK NAVBAR -->
    <?= $navbar ?>

    <!-- LINK CONTENT -->
    <div class="container-fluid py-4">
      <!-- COUNT INFORMATION -->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">JUMLAH TARUNA</p>
                    <h1 class="m-2 font-weight-bolder">
                      <?= $total_taruna;?>
                    </h1>
                    <p class="mb-0">
                      <a class="btn btn-primary btn-sm " href=""> Detail</a>
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="fa fa-users text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">TARUNA SEHAT</p>
                    <h1 class="m-2 font-weight-bolder">
                      <?= $total_sehat;?>
                    </h1>
                    <p class="mb-0">
                      <a class="btn btn-success btn-sm " href=""> Detail</a>
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="fa fa-heart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">TARUNA SAKIT</p>
                    <h1 class="m-2 font-weight-bolder">
                      <?= $total_sakit;?>
                    </h1>
                    <p class="mb-0">
                      <a class="btn btn-danger btn-sm " href=""> Detail</a>
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="fa fa-heartbeat text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">TARUNA ISOMAN</p>
                    <h1 class="m-2 font-weight-bolder">
                      <?= $total_isoman;?>
                    </h1>
                    <p class="mb-0">
                      <a class="btn btn-warning btn-sm " href=""> Detail</a>
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="fa fa-head-side-mask text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        
      
      </div>

      <!-- LINK KELUHAN SAYA -->
      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card pb-4">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2 ms-2">KELUHAN SAYA </h6>
              </div>
            </div>
            <div class="table-responsive" >
              <table id="myTable" class="table align-items-center m-0 px-0 px-md-3" style="box-sizing: border-box !important;" >
                <thead style="opacity:0;height:0px">
                  <tr>
                    <td></td>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1;foreach ($keluhan as $item) : ?>
                  <?php $getPenangananUser = $penangananmodel->getPenangananUser($item['id_keluhan']); ?>
                  <?php $id = $no++; ?>

                  <tr>
                    <td >
                      <div class="main-card m-0 mt-0 mb-2 card">
                          <div class="card-body">
                              <div id="exampleAccordion<?= $id ?>" data-children=".item<?= $id ?>">
                                  <div class="item<?= $id ?>">
                                  
                                      <small><i class="fa fa-calendar"></i> <?= date_format(date_create($item['created_at']),"l, j F Y (H:i:s) ");  ?></small><br>
                                      <button type="button" aria-expanded="true" aria-controls="exampleAccordion<?= $id ?>" data-toggle="collapse" href="#collapseExample<?= $id ?>" class="m-0 p-0 btn btn-link"><?= $item['keluhan'] ?></button> | <div class="mb-2 mr-2 badge badge-sm <?php 
                                          $badge = 
                                          ($item['kategori'] == 'Ringan' ? 
                                              'bg-gradient-success' : 
                                          ($item['kategori'] == 'Sedang' ?
                                              'bg-gradient-warning' :
                                          ($item['kategori'] == 'Berat' ?
                                              'bg-gradient-danger' : ''
                                          ))); echo $badge;
                                      ?> "><?= $item['kategori'] ?></div> | 

                                      <?php if(!empty($getPenangananUser)){ ?>
                                        <div class="mb-2 mr-2 badge badge-sm bg-gradient-info">Sudah Terkonfirmasi</div>
                                      <?php }else{ ?>
                                        <div class="mb-2 mr-2 badge badge-sm bg-gradient-dark">Menunggu Konfirmasi</div>
                                      <?php } ?>

                                      


                                      <div data-parent="#exampleAccordion<?= $id ?>" id="collapseExample<?= $id ?>" class="collapse mb-3">
                                        <p class="text-xs font-weight-bold mb-0">Deskripsi Keluhan:</p>
                                        <h5 class="mb-3 text-sm "><?= $item['deskripsi_keluhan'] ?></h5>

                                        <?php if(!empty($getPenangananUser)){ ?>
                                        <?php $getObatPenanganan = $obatmodel->getObatPenanganan($getPenangananUser['id_penanganan']); ?>

                                        <div class="card bg-light">
                                          <div class="card-body">
                                              <p class="text-xs font-weight-bold mb-1">Tindak Lanjut:</p>
                                              <h6 class="text-sm mb-3"><?= $getPenangananUser['tindak_lanjut']?></h6>

                                              <p class="text-xs font-weight-bold mb-1">Keterangan:</p>
                                              <h6 class="text-sm mb-3"><?= $getPenangananUser['keterangan']?></h6>

                                              <p class="text-xs font-weight-bold mb-1">Obat yang di terima:</p>
                                              <?php if(!empty($getObatPenanganan)){ ?>
                                              <h6 class="text-sm mb-3">
                                                <?php foreach ($getObatPenanganan as $obat) : ?>
                                                   <?= "<b>".$obat['nama_obat']."</b>: ".$obat['keterangan_obat']."<br>"?>
                                                <?php endforeach ?>
                                              </h6>
                                              <?php }else{ ?>
                                                <h6 class="text-xs mb-1">Tidak ada obat</h6>
                                              <?php } ?>
                                          </div>
                                        </div>
                                        <?php }else{ ?>
                                          <div class="card bg-light">
                                            <div class="card-body">
                                               <h5 class="text-sm mb-1">Belum ada tanggapan</h5>
                                            </div>
                                          </div>
                                        <?php } ?>
                                      </div>

                                      <a onclick="return confirm('Apakah anda yakin sudah sembuh ?')" href="already_healthy/<?= $item['id_keluhan'] ?>" class="float-end btn btn-light btn-sm" data-toggle="tooltip" data-placement="top" title="Jika Sudah Sembuh Klik Ini"><i class="fa fa-check"></i>&nbsp; Klik Bila Sembuh</a>

                                  </div>
                                
                              </div>
                          </div>
                      </div>
                    </td>
                  </tr>

                  <?php endforeach ?>
                  
                </tbody>
              </table>
            </div>
            
            
           
            
            
            </div>
          </div>
        </div>
       
      </div>
      
    </div>
  </main>
 
  <!--   Core JS Files   -->
  <script src="<?= base_url('js/core/popper.min.js')?>"></script>
  <script src="<?= base_url('js/core/bootstrap.min.js')?>"></script>
  <script src="<?= base_url('js/plugins/perfect-scrollbar.min.js')?>"></script>
  <script src="<?= base_url('js/plugins/smooth-scrollbar.min.js')?>"></script>
  <script src="<?= base_url('js/plugins/chartjs.min.js')?>"></script>
  <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);
 
    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
 
  <script src="<?= base_url('js/jquery.min.js?v=2.0.0') ?> "></script>
  <script src="<?= base_url('js/bootstrap.min.js?v=2.0.0') ?> "></script>
  <script src="<?= base_url('js/bootstrap5.min.js?v=2.0.0') ?> "></script>
  <script>
    var strIconSearch = '<i class="fas fa-search"></i>';
    var strNoRecord = '<center><br><h5 class="text-secondary">Keluhan Tidak Ada :)</h5><br><img style="border-radius:60px" src="<?= base_url('img/vector.gif') ?>" height="300px" alt=""><br></center>';
    $(document).ready( function () {
        $('#myTable').DataTable( {
          ordering : false,
          language: {
            searchPlaceholder: "Filter Data ",
            lengthMenu: "Show _MENU_ Entries",
            search: strIconSearch,
            info: "Showing _START_ to _END_ of _TOTAL_ Entries",
            zeroRecords : strNoRecord
          },
          pageLength: 10,
          searching: true,
          autoWidth: false,
        });
    } );
  </script>
  <script >
    
  </script>
  <script src="<?= base_url('js/datatables.min.js?v=2.0.0') ?> "></script>
</body>

</html>