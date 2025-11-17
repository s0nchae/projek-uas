<!-- jQuery -->
<script src="/adminlte/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Ekko Lightbox -->
<script src="/adminlte/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>

<!-- Filterizr (opsional) -->
<script src="/adminlte/plugins/filterizr/jquery.filterizr.min.js"></script>

<!-- Overlay Scrollbars -->
<script src="/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE -->
<script src="/adminlte/dist/js/adminlte.min.js"></script>

<!-- Bootstrap JS & Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

<!-- jQuery (dibutuhkan untuk Ajax) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Froala -->
<script src="https://cdn.jsdelivr.net/npm/froala-editor@4.4.7/js/froala_editor.min.js"></script>

<!-- CKEditor 5 CDN -->
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script> -->

<!-- TinyMCE Text Editor -->
<!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/8/tinymce.min.js" referrerpolicy="origin"></script> -->


<script>
  $(function () {
    $(document).on("click", '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({ alwaysShowClose: true });
    });

    // $(".filter-container").filterizr({ gutterPixels: 3 });
  });
</script>



<script>

    // let editor;

// Inisialisasi CKEditor
// ClassicEditor
//     .create(document.querySelector('#konten'))
//     .then(newEditor => { editor = newEditor; })
//     .catch(error => { console.error(error); });



// FORM ARTIKEL: sinkronisasi CKEditor sebelum submit, tanpa preventDefault
// $('#artikelForm').on('submit', function() {
    //     if(editor) $('#konten').val(editor.getData());
    // });

</script>
    
    
    
<script>
// FORM KATEGORI: pakai AJAX, preventDefault biar tidak reload
// $('#addCategoryForm').on('submit', function(e){
//     e.preventDefault();
//     let form = $(this);

//     $.ajax({
//         url: '{{ route("admin.category.store") }}',
//         method: 'POST',
//         data: form.serialize(),
//         success: function(res){
//             if(res.success){
//                 $('select[name="kategori"]').append(
//                     `<option value="${res.category.name}" selected>${res.category.name}</option>`
//                 );
//                 form[0].reset();
//                 $('#addCategoryModal').modal('hide');
//                 alert('Kategori berhasil ditambahkan!');
//             }
//         },
//         error: function(){
//             alert('Gagal menambahkan kategori!');
//         }
//     });
// });
</script>






