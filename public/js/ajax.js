// ajax.js
$(document).ready(function() {
    $('#formTambahKelas').on('submit', function(e) {
        e.preventDefault(); // Mencegah form untuk submit secara default

        var formData = new FormData(this);

        $.ajax({
            url: "{{ route('kelas.store') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    $('#tambahKelasModal').modal('hide'); // Menutup modal setelah sukses
                    location.reload(); // Refresh halaman untuk menampilkan data terbaru
                } else {
                    alert('Terjadi kesalahan!');
                }
            },
            error: function(xhr, status, error) {
                alert('Terjadi kesalahan saat menambah data!');
            }
        });
    });
});
