HAI <?= session('role');?>.. <br>Selamat datang kembali <br>
nama saya <?= session('nama');?> dengan npm <?= session('npm') ?> <br>
username : <?= session('username');?> <br>
Kondisi : <?= $users['status'];?> <br>
ISOMAN : <?php echo ($users['isoman'] > 0 ? "Iya" : "Tidak"); ?><br>
<form action="choose_isoman" method="post">
<input type="hidden" value="<?= session('npm') ?>"/>
Apakah anda sedang menjalani Isolasi Mandiri ? *<br>
<select name="isoman" id="" required>
    <option value="1">Iya</option>
    <option value="0">Tidak</option>
</select><br>
<button type="submit">Submit</button><br>
</form>
<a href="<?= 'auth/asd' ?>">edit kondisi</a><br>

<a href="<?= 'auth/logout' ?>">logout</a><br>

<br>=============================================================<br>
Kondisi Seluruh Taruna <br>
Jumlah : <?= $total_taruna;?>  taruna <br>


Sehat : <?= $total_sehat;?> dari <?= $total_taruna;?> <br>
Sakit : <?= $total_sakit;?> dari <?= $total_taruna;?> <br>
Isolasi Mandiri : <?= $total_isoman;?> dari <?= $total_taruna;?> <small>(termasuk taruna sehat dan sakit)</small>  <br>


<br>=============================================================<br>
Info Kesehatan <br>
<hr>
Gambar<br>
Judul<br>
Deksripsi<br>
<a href="detail">detail</a><br>
<br>
Gambar<br>
Judul<br>
Deksripsi<br>
<a href="detail">detail</a>
<br>
<br>=============================================================<br>

input data kesehatan JIKA ADA <br><small>(Jika anda memiliki minimal 1 keluhan maka kondisi akan otomatis Sakit)</small> <br>
<form action="add_keluhan" method="post">
Keluhan *<br>
<input type="text" placeholder="Isi inti dari keluhan" name="keluhan" required /><br>
Deskripsi Keluhan *<br><small>(Deskripsi detail dari keluhan)</small><br>
<textarea name="deskripsi_keluhan" required></textarea><br>
Kategori Keluhan *<br>
<select name="kategori_keluhan" id="" required>
    <option value="1">Ringan</option>
    <option value="2">Sedang</option>
    <option value="3">Berat</option>
</select><br>
<button type="submit">LAPORKAN KE ASISTEN KESEHATAN</button><br>
<span style='color:green;font-size:15px;'><?= session('msg');?></span>


</form>

<br>=============================================================<br>
Laporan keluhan taruna yang mengalami gejala sakit
<table border="1">
    <tr>
        <td>no</td>
        <td>tanggal</td>
        <td>keluhan</td>
        <td>deskripsi keluhan</td>
        <td>kategori</td>
        <td>status</td>
        <td>tindak lanjut</td>
        <td>keterangan</td>
        <td>obat yang di berikan</td>
        <td>action</td>
    </tr>


    <?php $no=1;foreach ($keluhan as $item) : ?>
    <?php $getPenangananUser = $penangananmodel->getPenangananUser($item['id_keluhan']); ?>
        <!-- Get Keluhan User -->
        <tr>
            <td><?= $no++ ?></td>
            <td><?= date_format(date_create($item['created_at']),"l, j F Y (H:i:s) ");  ?></td>
            <td><?= $item['keluhan'] ?></td>
            <td><?= $item['deskripsi_keluhan'] ?></td>
            <td><?= $item['kategori'] ?></td>
            <?php if(!empty($getPenangananUser)){ ?>
         
                <?php $getObatPenanganan = $obatmodel->getObatPenanganan($getPenangananUser['id_penanganan']); ?>
                <!-- Get Penanganan User -->
               <td>Received</td>
               <td><?= $getPenangananUser['tindak_lanjut']?></td>
               <td><?= $getPenangananUser['keterangan']?></td>


               <?php if(!empty($getObatPenanganan)){ ?>
                <td>
                    <?php foreach ($getObatPenanganan as $obat) : ?>
                        <!-- Get Obat Penanganan User -->
                        <?= "<b>".$obat['nama_obat']."</b>: ".$obat['keterangan_obat']."<br>"?>

                    <?php endforeach ?>
                </td>
                <?php }else{ ?>
                    <td>Pending</td>
                <?php } ?>

            <?php }else{ ?>
               <td>Pending</td>
                <td>belum ada</td>
                <td>belum ada</td>
                <td>belum ada</td>
            <?php } ?>
            <td><a onclick="return confirm('Apakah anda yakin sudah sembuh TOTALitas Tanpa Batas????')" href="already_healthy/<?= $item['id_keluhan'] ?>">Tanggapi</a></td>
        </tr>

    <?php endforeach ?>
</table>

