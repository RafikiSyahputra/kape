<div class="modal_status">
    <div class="modal_window">
        {{-- <div class="title">Hasil Pencarian</div> --}}
        <div class="row">
            <div class="col-lg-5">
                <p class="text"> Nama Customer</p>
                <p class="font" id="customer"></p>
            </div>
            <div class="col-lg-3">
                <p class="text">Tanggal Transaksi</p>
                <p class="font" id="tgl_transaksi"></p>
            </div>
            <div class="col-lg-3">
                <p class="text">Status Pesanan</p>
                <p class="font" id="status_order"></p>
            </div>
        </div>
        <br />
        <button class="btn btn-danger btn-block" onclick="close_dlgs()">Tutup</button>
    </div>
</div>

<style>
    .modal_window>.title {
        font-size: 18px;
        font-weight: bold;
        color: black;
    }

    .text {
        color: black !important;
        font-weight: bold;
    }

    .font {
        color: slategrey !important;
    }

    .modal_window {
        width: auto;
        height: auto;
        border: 1px solid #ddd;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 100%;
        padding: 20px;
        margin-top: 20px;
        background-color: white;
        border-radius: 5px;
    }

    .modal_status {
        display: none;
        position: center;
        top: 0px;
        left: 0px;
        right: 0px;
        bottom: 0px;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 99999;
        border-radius: 5px;
    }
</style>
