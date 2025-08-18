  @yield('meta')

  @include('admin.layout.header')

  @include('admin.layout.sidebar')

  @yield('main')

  @include('admin.layout.footer')

 @if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        Toast.fire({
            icon: 'success',
            title: @json(session('success'))
        });
    });
</script>
@endif


  @yield('js')
