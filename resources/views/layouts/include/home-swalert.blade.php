<script src="{{asset('customs/js/sweetalert.min.js')}}"></script>
    @if (session('status'))
        <script>
            swal({
                title: "{{ session('status') }}", 
                icon: "success",
                button: "OK!"
            })
        </script>
    @elseif (session('info'))
        <script>
            swal({
                title: "{{ session('info') }}", 
                icon: "warning",
                button: "OK!"
            })
        </script>
    @endif