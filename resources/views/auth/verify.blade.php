@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verifikasi Email Kamu') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Link verifikasi telah dikirim ke E-Mail mu, diperiksa ya!') }}
                            </div>
                        @endif

                        {{ __('Sebelum melanjutkannya, jangan lupa diperiksa dibagian Inbox maupun Spam.') }}
                        {{ __('Jika kamu tidak menerimanya..') }}, <a
                            href="{{ route('Kirim Ulang Verifikasi Berhasil') }}">{{ __('Kirim Ulang Kode Verifikasi') }}</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
