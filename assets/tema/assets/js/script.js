//function untuk ambil data dari Rest API
function tampil_data() {
    $.ajax({
        method: 'GET',
        url: 'https://portal.katingankab.go.id/Secserver',
        dataType: 'json',
        success: function(result) {
            console.log(result);
            var data='';    
 
            //perulangan untuk pasrng data JSON ke HTML
            $.each(result.data, function(i, item){
                data+='<tr>';
                  data+='<td>'+item.id_berita+'</td>';
                  data+='<td>'+item.id_user+'</td>';
                  data+='<td>'+item.id_kategori+'</td>';
                  data+='<td>'+item.slug_berita+'</td>';
                  data+='<td>'+item.judul_berita+'</td>';
                  data+='<td>'+item.isi+'</td>';
                  data+='<td>'+item.status_berita+'</td>';
                  data+='<td>'+item.jenis_berita+'</td>';
                  data+='<td>'+item.keywords+'</td>';
                  data+='<td>'+item.caption+'</td>';
                  data+='<td>'+item.icon+'</td>';
                  data+='<td>'+item.urutan+'</td>';
                  data+='<td>'+item.tanggal_post+'</td>';
                  data+='<td>'+item.tanggal_publish+'</td>';
                  data+='<td>'+item.tanggal+'</td>';
                  data+='<td><img src="https://portal.katingankab.go.id/assets/upload/image/'+item.gambar+'"></td>';
                  data+='<td><button class="btn btn-info btn-edit" data="'+item.id_berita+'" data-toggle="modal" data-target="#Modaledit">edit</button> <button class="btn btn-danger btn-hapus" data="'+item.id_berita+'">hapus</button></td>';
                data+='</tr>';
            });
 
            //memasukan ke element HTML
            $('#tempat_data').html(data);
        }
    });
}
 
//inisialisasi fungsi
tampil_data();

//function untuk bersihkan form 
function bersih() {
    $('#id_berita').val('');
    $('#id_user').val('');
    $('#id_kategori').val('');
    $('#slug_berita').val('');
    $('#judul_berita').val('');
    $('#isi').val('');
    $('#status_berita').val('');
    $('#jenis_berita').val('');
    $('#keywords').val('');
    $('#caption').val('');
    $('#icon').val('');
    $('#urutan').val('');
    $('#tanggal_post').val('');
    $('#tanggal_publish').val('');
    $('#tanggal').val('');
    $('#gambar').val('');
}

//simpan
$('#save').click(function(){
  //ambil nilai dari form
  let id_berita=$('#id_berita').val();
  let id_user=$('#id_user').val();
  let id_kategori=$('#id_kategori').val();
  let slug_berita=$('#slug_berita').val();
  let judul_berita=$('#judul_berita').val();
  let isi=$('#isi').val();
  let status_berita=$('#status_berita').val();
  let jenis_berita=$('#jenis_berita').val();
  let keywords=$('#keywords').val();
  let caption=$('#caption').val();
  let icon=$('#icon').val();
  let urutan=$('#urutan').val();
  let tanggal_post=$('#tanggal_post').val();
  let tanggal_publish=$('#tanggal_publish').val();
  let tanggal=$('#tanggal').val();
  let gambar=$('#gambar').val();

   
  
  //untuk simpan ke Rest API
  $.ajax({
      method: 'POST',
      url: 'https://portal.katingankab.go.id/Secserver',
      data: 'id_berita='+id_berita+'&id_user='+id_user+'&id_kategori='+id_kategori+'&slug_berita='+slug_berita+'&judul_berita='+judul_berita+'&isi='+isi+'&status_berita='+status_berita+'&jenis_berita='+jenis_berita+'&keywords='+keywords+'&icon='+icon+'&caption='+caption+'&urutan='+urutan+'&tanggal_post='+tanggal_post+'&tanggal_publish='+tanggal_publish+'&tanggal='+tanggal+'&gambar='+gambar,
     
      success: function(result) {
        tampil_data();
        bersih();
      }
  });
});

function selectFolder(e) {
var theFiles = e.target.files;
var relativePath = theFiles[0].webkitRelativePath;
var folder = relativePath.split("https://portal.katingankab.go.id/assets/upload/image/");
console.log(folder[0]);
}
//untuk menampilkan data yang akan diedit
$(document).on('click', '.btn-edit', function() {
  let id_berita=$(this).attr('data');
  //panggil rest api server dan filter data
  $.ajax({
    method: 'GET',
    url: 'https://portal.katingankab.go.id/Secserver',
    data: 'id_berita='+id_berita,
    success: function(result) {
      $('#id_beritaEdit').val(result.data[0].id_berita);
      $('#id_userEdit').val(result.data[0].id_user);
      $('#id_kategoriEdit').val(result.data[0].id_kategori);
      $('#slug_beritaEdit').val(result.data[0].slug_berita);
      $('#judul_beritaEdit').val(result.data[0].judul_berita);
      $('#isiEdit').val(result.data[0].isi);
      $('#status_beritaEdit').val(result.data[0].status_berita);
      $('#jenis_beritaEdit').val(result.data[0].jenis_berita);
      $('#keywordsEdit').val(result.data[0].keywords);
      $('#captionEdit').val(result.data[0].caption);
      $('#iconEdit').val(result.data[0].icon);
      $('#urutanEdit').val(result.data[0].urutan);
      $('#tanggal_postEdit').val(result.data[0].tanggal_post);
      $('#tanggal_publishEdit').val(result.data[0].tanggal_publish);
      $('#tanggalEdit').val(result.data[0].tanggal);
      $('#gambarEdit').val(result.data[0].gambar);
    }
  });
});

//update data
$('#update').click(function(){
  //hasil form Edit data
  let id_berita=$('#id_beritaEdit').val();
  let id_user=$('#id_userEdit').val();
  let id_kategori=$('#id_kategoriEdit').val();
  let slug_berita=$('#slug_beritaEdit').val();
  let judul_berita=$('#judul_beritaEdit').val();
  let isi=$('#isiEdit').val();
  let status_berita=$('#status_beritaEdit').val();
  let jenis_berita=$('#jenis_beritaEdit').val();
  let keywords=$('#keywordsEdit').val();
  let caption=$('#captiopnnEdit').val();
  let icon=$('#iconEdit').val();
  let urutan=$('#urutanEdit').val();
  let tanggal_post=$('#tanggal_postEdit').val();
  let tanggal_publish=$('#tanggal_publishEdit').val();
  let tanggal=$('#tanggalEdit').val();
  let gambar=$('#gambarEdit').val();

  //request ke API Server untuk PUT
  $.ajax({
      method: 'PUT',
      url: 'https://portal.katingankab.go.id/Secserver',
      data: 'id_berita='+id_berita+'&id_user='+id_user+'&id_kategori='+id_kategori+'&slug_berita='+slug_berita+'&judul_berita='+judul_berita+'&isi='+isi+'&status_berita='+status_berita+'&jenis_berita='+jenis_berita+'&keywords='+keywords+'&icon='+icon+'&caption='+caption+'&urutan='+urutan+'&tanggal_post='+tanggal_post+'&tanggal_publish='+tanggal_publish+'&tanggal='+tanggal+'&gambar='+gambar,
      success: function(result) {
        tampil_data();
      }
  });
});

//untuk hapus data
$(document).on('click', '.btn-hapus', function(){
  let id_berita=$(this).attr('data');
  //request ke api server untuk delete
  $.ajax({
    method: 'DELETE',
    url: 'https://portal.katingankab.go.id/Secserver',
    data:'id_berita='+id_berita,
    success: function(result) {
      tampil_data();
    }
  });
});

