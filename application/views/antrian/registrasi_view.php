<body>

    <!-- Portfolio Section Heading -->
    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Registrasi</h2>

    <!-- Icon Divider -->
    <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
            <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
    </div>


    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-6" style="margin-top: 20px">
                <form action="<?php echo base_url('registrasi/registrasi') ?>" method="post">

                    <div>
                        <label>Nomor Identitas</label>
                        <input type="text" id="no_identitas" name="no_identitas" class="form-control" value="">
                    </div>

                    <div>
                        <label>Nama</label>
                        <input type="text" id="nama" name="nama_pasien" class="form-control" value="">
                    </div>

                    <div>
                        <label>Jenis Kelamin</label>
                        <select id="jenis_kelamin" name="j_kel" class="form-control">
                            <option disabled selected style="display: none">Pilih</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <label>Tanggal Lahir</label>
                        <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" value="">
                    </div>

                    <div class="form-group">
                        <label>Agama</label>
                        <select name="agama" class="form-control" required="required">
                            <option disabled selected style="display:none">--Pilih Agama--</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="Khatolik">Katholik</option>           
                        </select>                
                    </div>

                    <div>
                        <label>Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" placeholder="Masukkan Pekerjaan">
                    </div>

                    <div>
                        <label>Alamat</label>
                        <textarea id="alamat" name="alamat" class="form-control"></textarea>
                    </div>

                    <div>
                        <label>No Telephone</label>
                        <input type="no_telp" id="no_telp" name="no_telp" class="form-control" value="">
                    </div>

                    <div>
                        <label>Username</label>
                        <input type="text" id="username" name="username" class="form-control" value="">
                    </div>

                    <div>
                        <label>Password</label>
                        <input type="password" id="pass" name="pass" class="form-control" value="">
                    </div>

                    <br><br>
                    <div>
                        <a href="<?= base_url('registrasi/registrasi/'); ?>"><input type="submit" name="" value="Registrasi" class="btn btn-info">
                    </div>

                </form>
            </div>
        </div>
    </div>



</body>

</html>