<x-layout>
<!--/breadcrumb-bg-->
<div class="breadcrumb-bg w3l-inner-page-breadcrumb py-5">
    <div class="container pt-lg-5 pt-md-3 p-lg-4 pb-md-3 my-lg-3">
        <h2 class="title pt-5"></h2>
        <ul class="breadcrumbs-custom-path mt-3 text-center">
            <li><a href="">Home</a></li>
            <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> </li>
        </ul>
    </div>
</div>
<!--//breadcrumb-bg-->
<!-- banner bottom shape -->
<div class="position-relative">
    <div class="shape overflow-hidden">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- banner bottom shape -->
<!--/serices-6-->
<section class="w3l-serices-6 py-5" id="services1">
    <div class="container py-lg-5 py-md-4 py-2">
        <div class="title-content text-center">
            <h6 class="title-subhny text-center">panti HM 1</h6>
            <h3 class="title-w3l mb-sm-5 mb-4 pb-sm-0 pb-2 text-center"></h3>
        </div>

        <!-- Card Wrapper -->
        <div class="d-flex justify-content-center">
            <div class="card shadow p-4" style="max-width: 1000px; width: 100%;">
                <form action="/creat-donasi" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">nama</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                    </div>


                    <div class="row">
                        <div class="form-group mb-3 col-md-6">
                            <label for="no_telpon">No Telpon</label>
                            <input class="form-control" name="no_telpon" id="no_telpon" placeholder="Masukan No telpon">
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" name="jumlah" id="jumlah" class=" form-control" placeholder="jumlah">
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary w-100">Bayar</button>
                </form>
            </div>
        </div>

    </div>
</section>

@if (isset($snap_token))
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        snap.pay("{{ $snap_token }}", {
            onSuccess: function(result) {
                console.log("Success:", result);
                var myModal = new bootstrap.Modal(document.getElementById('successModal'));
                myModal.show();
            },
            onPending: function(result) {
                console.log("Pending:", result);
            },
            onError: function(result) {
                console.log("Error:", result);
            },
            onClose: function() {
                console.log('Customer closed the popup without finishing the payment');
            }
        });
    });
</script>
@endif

<!-- Modal -->
<div class="modal fade" id="successModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="successModalLabel">Terima Kasih!</h1>
      </div>
      <div class="modal-body">
        Pembayaran Anda berhasil. Terima kasih atas donasinya!
      </div>
      @if (isset($id))
        <div class="modal-footer">
            <form action="/updatestatus/{{ $id }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Tutup</button>
        </form>
        </div>
        

          
      {{-- <div class="modal-footer">
        <a href="/updatestatus/{{ $id }}" type="button" class="btn btn-success" >Tutup</a>
      </div> --}}
      @endif
    </div>
  </div>
</div>

</x-layout>

<!--//services-6-->