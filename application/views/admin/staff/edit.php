<?php echo form_open_multipart(base_url('admin/staff/edit/'.$staff->id_staff),'id="tambah"') ?>

    <div class="row">
      <div class="col-md-5">
        <div class="form-group has-error">
          <label class="text-danger">Nama staff <span class="text-danger">*</span></label>
          <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama lengkap" value="<?php echo $staff->nama ?>">
        </div>
        <div class="form-group">
          <label>NIP</label>
          <input type="text" name="nip" id="nip" class="form-control" placeholder="NIP" value="<?php echo $staff->nip ?>">
        </div>
        <div class="form-group">
            <label>Jabatan</label>
            <?php 
             $jabatan = $staff->jabatan;
             $jabatan_array = array('Kepala Dinas', 'Camat', 'Sekretaris', 'Sekretaris Camat', 'Sekretaris Dinas');
            
             if(!in_array($jabatan, $jabatan_array)) { echo "<p>Masukan Jabatan Kecuali Kepala Dinas / Camat dan Sekretaris Dinas / Sekretaris Camat</p>"; } ?>
            
            <input type="<?php if($staff->jabatan=="Kepala Dinas" ||$staff->jabatan=="Camat" ||$staff->jabatan=="Sekretaris"||$staff->jabatan=="Sekretaris Camat" || $staff->jabatan=="Sekretaris Dinas") { echo "hidden"; } ?>" name="jabatan<?php if($staff->jabatan=="Kepala Dinas" ||$staff->jabatan=="Camat" ||$staff->jabatan=="Sekretaris"||$staff->jabatan=="Sekretaris Camat" || $staff->jabatan=="Sekretaris Dinas") { echo "nn"; } ?>" class="form-control" placeholder="Jabatan" value="<?php echo $staff->jabatan ?>" >
           
            <select name="jabatan<?php 
            $jabatan = $staff->jabatan;
            $jabatan_array = array('Kepala Dinas', 'Camat', 'Sekretaris', 'Sekretaris Camat', 'Sekretaris Dinas');
            
            if(!in_array($jabatan, $jabatan_array)) { echo "nn"; } ?>" class="form-control" 
            <?php 
             $jabatan = $staff->jabatan;
             $jabatan_array = array('Kepala Dinas', 'Camat', 'Sekretaris', 'Sekretaris Camat', 'Sekretaris Dinas');
            
             if(!in_array($jabatan, $jabatan_array)) { echo "hidden"; } ?>>
              <option value="Kepala Dinas" <?php if($staff->jabatan=="Kepala Dinas") { echo "selected"; } ?>>Kepala Dinas</option>
              <option value="Camat" <?php if($staff->jabatan=="Camat") { echo "selected"; } ?>>Camat</option>
              <option value="Sekretaris Dinas" <?php if($staff->jabatan=="Sekretaris Dinas") { echo "selected"; } ?>>Sekretaris Dinas</option>
              <option value="Sekretaris Camat" <?php if($staff->jabatan=="Sekretaris Camat") { echo "selected"; } ?>>Sekretaris Camat</option>
            </select>  
         
          </div>
         
        <!-- <div class="form-group">
          <label>Telepon</label>
          <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Telepon" value="<?php echo $staff->telepon ?>">
        </div>

        <div class="form-group">
          <label>Email staff</label>
          <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo $staff->email ?>">
        </div> -->

       

        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Urutan</label>
                <input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $staff->urutan ?>">
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group">
              <label>Tampilkan di website?</label>
              <select name="status_staff" class="form-control">
                <option value="No">No</option>
              <option value="Yes" <?php if($staff->status_staff=="Yes") { echo "selected"; } ?>>Yes</option>
              </select>
            </div>
          </div>
        </div>
        
      </div>

      <div class="col-md-7">
        <div class="row">
            <!-- <div class="col-md-6">
              <div class="form-group">
                <label>Tempat lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat/kota kelahiran" value="<?php echo $staff->tempat_lahir ?>">
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group">
                <label>Tanggal lahir</label>
                <input type="text" name="tanggal_lahir" class="form-control tanggal" placeholder="dd-mm-yyyy" value="<?php echo date('d-m-Y',strtotime($staff->tanggal_lahir)) ?>" >
              </div>
            </div>
            </div>

        <div class="form-group">
          <label>Alamat rumah/kantor</label>
          <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat"><?php echo $staff->alamat ?></textarea>
        </div>

        <div class="form-group">
          <label>Keahlian yang dikuasai</label>
          <textarea name="keahlian" id="keahlian" class="form-control" placeholder="Keahlian yang dikuasai"><?php echo $staff->keahlian ?></textarea>
        </div>

        <div class="form-group">
          <label>Kata Kunci pencarian di Google</label>
          <textarea name="keywords" id="keywords" class="form-control" placeholder="Keywords"><?php echo $staff->keywords ?></textarea>
        </div> -->
        <div class="col-md-6">
        <div class="form-group">
          <label>Upload Foto/Logo</label>
          <div class="input-group">
              <div class="custom-file">
                <input type="file" name="gambar" id="gambar" class="custom-file-input" placeholder="gambar" value="<?php echo $staff->gambar ?>">
                <label class="custom-file-label" for="exampleInputFile">Upload Foto/Logo</label>
              </div>
          </div>
        </div>
        </div>
        <div class="form-group btn-group">
          <button type="submit" name="submit" class="btn btn-success btn-lg"><i class="fa fa-save"></i> Simpan Data</button>
          <button type="reset" name="reset" class="btn btn-info btn-lg"><i class="fa fa-cut"></i> Reset</button>
         
        </div>


      </div>
    </div>
  
<?php echo form_close(); ?>

<script>
$().ready(function() {
// validate signup form on keyup and submit
$("#tambah").validate({
rules: {
  nama: {
    required: true,
    minlength: 4
  },
  email: {
    required: false,
    email: true
  },
},
messages: {
  nama: {
    required: "Isi nama dengan lengkap",
    minlength: "Nama minimal 4 karakter"
  },
  email: "Masukkan alamat email",
}
});
});
</script>