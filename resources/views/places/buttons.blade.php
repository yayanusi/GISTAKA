<div class="project-actions text-center">
    <a href="{{ route('places.show',$model) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Lihat</a>
    <a href="{{ route('places.edit',$model) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
    <button href="{{ route('places.destroy',$model) }}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i>Hapus</button>
</div>

<script src="{{asset('/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>

<script>
    $('button#delete').on('click',function(e){
        e.preventDefault();

        var href = $(this).attr('href');

            Swal.fire({
            title: 'Hapus Data Ini?',
            text: "Perhatian data yang sudah di hapus tidak bisa di kembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText : 'Batal!'
            }).then((result) => {
            if (result.isConfirmed) {

                document.getElementById('deleteForm').action = href;
                document.getElementById('deleteForm').submit();
            }
            })
        });

</script>
