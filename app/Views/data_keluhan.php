<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="<?= base_url('img/askes.jpg') ?>">

  
  <title>
    Data Keluhan | Sistem Informasi Kesehatan Taruna
  </title>
  <!-- LINK MASTER  -->

  <?= $master ?>

  <link href=" <?= base_url('css/dataTables.min.css?v=2.0.0') ?>" rel="stylesheet" />

  <!-- DATATABLES -->
  <style>
      tr,td{
          background:transparent !important;
          
         
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
                <div class="card p-2 pb-3">
                    <div class="table-responsive" >
                        <table id="myTable" class="table align-items-center m-0 px-0 px-md-3" style="box-sizing: border-box !important;" >
                            <thead >
                            <tr>
                                <td style="width:70px;">Tgl Laporan</td>
                                <td>Nama</td>
                                <td>Keluhan</td>
                                <td>Deskipsi Keluhan</td>
                                <td>Tindakan</td>
                                <td>Aksi</td>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1;foreach ($keluhan as $item) : ?>
                                <?php $getPenangananUser = $penangananmodel->getPenangananUser($item['id_keluhan']);?>

                                <tr class="text-xs">
                                    <td><?= date_format(date_create($item['created_at'])," j M Y (H:i:s) ");  ?></td>
                                    <td><?= $item['username'] ?></td>
                                    <td>
                                        <div class="m-0 mr-2 badge badge-sm <?php 
                                          $badge = 
                                          ($item['kategori'] == 'Ringan' ? 
                                              'bg-gradient-success' : 
                                          ($item['kategori'] == 'Sedang' ?
                                              'bg-gradient-warning' :
                                          ($item['kategori'] == 'Berat' ?
                                              'bg-gradient-danger' : ''
                                          ))); echo $badge;
                                      ?> "><?= $item['kategori'] ?></div> | <?= $item['keluhan'] ?>
                                    </td>
                                    <td><?= $item['deskripsi_keluhan'] ?></td>
                                    <td><?= (isset($getPenangananUser['tindak_lanjut']) ? $getPenangananUser['tindak_lanjut'] : "-"); ?></td>
                                    <td>
                                      <?php if(empty($getPenangananUser)){ ?>

                                        <a onclick="beri_penanganan(<?= $item['id_keluhan'] ?>,'tambah');" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Berikan Penanganan">Beri Penanganan</a><br>
                                      
                                        <?php }else{ ?>
                                        
                                        <a onclick="beri_penanganan(<?= $item['id_keluhan'] ?>,'edit');" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Berikan Penanganan">Edit Penanganan</a><br>
                                      
                                        <?php } ?>
                                      
                                                                        
                                        <a onclick="return confirm('Apakah anda yakin akan mendiagnosa sembuh ?')" href="already_healthy_by_askes/<?= $item['id_keluhan'] ?>" class="btn btn-light btn-xs" data-toggle="tooltip" data-placement="top" title="Jika Sudah Sembuh Klik Ini"> Diagnosa Sembuh</a>
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

      <!-- LINK MODAL -->

        <!-- Modal -->
        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Penanganan Keluhan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form name="add_name" action="add_penanganan" method="post" id="add_name">  

                    <div class="modal-body">
                        Nama : <span id="label_nama"></span> <br>
                        Kelas : <span id="label_kelas"></span><br>
                        NPM : <span id="label_npm"></span><br>
                        <hr>

                        <b>Keluhan :</b> <span id="label_keluhan"></span><br>
                        <b>Deskripsi Keluhan :</b> <span id="label_desk_keluhan"></span><br>
                        <b>Kategori Keluhan :</b> <span id="label_kategori_keluhan"></span><br>

                        <hr>
                            <input type="hidden" name="npm" id="input_npm" class="form-control nilai_list mb-2" />
                            <input type="hidden"  id="input_id_penanganan" name="id_penanganan" />
                            <input type="hidden" name="id_keluhan" id="input_id_keluhan" class="form-control nilai_list mb-2" />
                            Tindak Lanjut : <br>
                            <input type="text" id="input_tindak_lanjut" name="tindak_lanjut" placeholder="Tindak Lanjut" class="form-control nilai_list mb-2" required />
                            Keterangan tindak lanjut:<br>
                            <textarea  id="input_keterangan" name="keterangan" placeholder="Keterangan" class="form-control nilai_list mb-2" ></textarea>
                            <small>*Kosongkan Obat dan Keterangan jika tidak memerlukan obat</small><br>

                            <div class="table-responsive">  
                                <table class="table table-bordered" id="dynamic_field">  
                                    <tr>  
                                            
                                            <td colspan="2"><button type="button" name="add" id="add" class="col-12 btn btn-success">Tambah Obat</button></td>  
                                    </tr>  
                                </table>  
                                
                            </div>  

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>  

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
  <script src="<?= base_url('js/bootstrap.min.js?v=2.0.0') ?> "></script>
  <script src="<?= base_url('js/bootstrap5.min.js?v=2.0.0') ?> "></script>
  <script>
    var strIconSearch = '<i class="fas fa-search"></i>';
    var strNoRecord = '<center><br><h5 class="text-secondary">Keluhan Tidak Ada :)</h5><br><img style="border-radius:60px" src="<?= base_url('img/vector.gif') ?>" height="300px" alt=""><br></center>';
    $(document).ready( function () {
        $('#myTable').DataTable( {
          ordering: false,
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
  <script>  
        $('form').submit(function(){
            $(this).find(':submit').attr('disabled','disabled');
        });
        $(document).ready(function(){  
            var i=1;  
            $('#add').click(function(){  
                i++;  
                $('#dynamic_field').append('<tr class="row_add" id="row'+i+'"><td><input type="hidden" id="input_id_obat" name="id_obat[]"/><input type="text" name="obat[]" placeholder="Nama Obat" class="form-control nilai_list mb-2" /><textarea type="text" name="keterangan_obat[]" class="form-control nilai_list" placeholder="Keterangan obat, dosis, dll"></textarea></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  

            });  
            $(document).on('click', '.btn_remove', function(){  
                var button_id = $(this).attr("id");   
                $('#row'+button_id+'').remove();  
            });  

            $(document).on('click', '.btn_remove_delete', function(){  
                c = confirm("apakah anda yakin obat ini akan di hapus ?");
                var button_id = $(this).attr("id"); 

                if (c) {
                    $.ajax({  
                        url:"hapus_obat/"+$(this).attr("idobat"),  
                        method:"GET",   
                        success:function(data)  
                        {  
                            alert("Hapus obat berhasil");
                            $('#rows'+button_id+'').remove();  
                        },
                        error: function (request, status, error) {
                            alert(request.responseText);
                        }
                    }); 
                }
            });  

            $('#submit').click(function(){            
                $.ajax({  
                    url:"name.php",  
                    method:"POST",  
                    data:$('#add_name').serialize(),  
                    success:function(data)  
                    {  
                            alert(data);  
                            $('#add_name')[0].reset();  
                    }  
                });  
            });  
        });  
  </script>
  <script>
      function beri_penanganan(obj,opt){
                 $('#add_name')[0].reset();  
                 $('.row_add').remove();  


                 if(opt == "edit"){
                     $('#add_name').attr('action', 'update_penanganan');
                 }else{ 
                    $('#add_name').attr('action','add_penanganan');
                 }

                 $.ajax({  
                    url:"modal_beri_penanganan/"+obj,  
                    method:"GET",  
                    dataType: "json",
                    success:function(data)  
                    {  
                        $('#label_nama').html(data.users.nama);
                        $('#label_kelas').html(data.users.nama_kelas);
                        $('#label_npm').html(data.users.npm);
                        $('#input_npm').val(data.users.npm);

                        $('#input_id_keluhan').val(data.keluhan.id_keluhan);
                        $('#label_keluhan').html(data.keluhan.keluhan);
                        $('#label_desk_keluhan').html(data.keluhan.deskripsi_keluhan);
                        $('#label_kategori_keluhan').html(data.keluhan.kategori);

                        $('#input_id_penanganan').val(data.penanganan.id_penanganan);
                        $('#input_tindak_lanjut').val(data.penanganan.tindak_lanjut);
                        $('#input_keterangan').val(data.penanganan.keterangan);
                        
                        var i=1;  
                        data.obat.forEach(element => {
                            i++; 
                            $('#dynamic_field').append('<tr class="row_add" id="rows'+i+'"><td> <input type="hidden" id="input_id_obat" name="id_obat[]" value="'+element.id_obat+'" /><input type="text" name="obat[]" placeholder="Nama Obat" value="'+element.nama_obat+'" class="form-control nilai_list mb-2" /><textarea type="text" name="keterangan_obat[]" class="form-control nilai_list" placeholder="Keterangan obat, dosis, dll">'+element.keterangan_obat+'</textarea></td><td><button type="button" name="remove" idobat='+element.id_obat+' id="'+i+'" class="btn btn-danger btn_remove_delete">Hapus Obat</button></td></tr>'); 
                        });


                         
                    }  
                });
      }
  </script>

  <script src="<?= base_url('js/datatables.min.js?v=2.0.0') ?> "></script>

</body>

</html>