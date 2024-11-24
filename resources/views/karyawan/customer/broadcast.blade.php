@extends('layouts.backend')
@section('title', 'Karyawan - Broadcast Customer')
@section('header', 'Broadcast Customer')
@section('content')
    <div class="container">
        <h2>Broadcast WhatsApp ke Customer</h2>
        <form action="{{ route('send.broadcast') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="message">Pesan Broadcast</label>
                <textarea name="message" id="message" class="form-control" rows="5" placeholder="Tulis pesan broadcast di sini..."
                    required></textarea>
            </div>


            @livewire('costumers-list')
            <button type="submit" class="btn btn-primary">Kirim Broadcast</button>
        </form>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif
    </div>
@endsection
