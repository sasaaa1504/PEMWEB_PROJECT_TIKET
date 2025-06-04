@extends('layouts.app')

@section('title', 'About - HitTix')

@section('content')
    <div class="text-center mb-5">
        <h1>About HitTix</h1>
        <p class="lead">
            HitTix adalah platform terbaik untuk membeli tiket konser dan acara hiburan favoritmu dengan mudah dan aman.
            Kami berkomitmen memberikan pengalaman pemesanan tiket yang cepat, nyaman, dan terpercaya untuk semua pengguna.
        </p>
    </div>

    <section class="mb-5">
        <h2 class="mb-3">Our Mission</h2>
        <p>
            Misi kami adalah menghubungkan penikmat hiburan dengan pertunjukan terbaik, mendukung artis dan event organizer,
            serta memberikan layanan tiket yang inovatif dan terpercaya.
        </p>
    </section>

    <section>
        <h2 class="mb-4">Meet The Team</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <img src="https://via.placeholder.com/300x300?text=Alya" class="card-img-top" alt="Alya" />
                    <div class="card-body text-center">
                        <h5 class="card-title">Alya</h5>
                        <p class="card-text">Founder & CEO</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <img src="https://via.placeholder.com/300x300?text=Raka" class="card-img-top" alt="Raka" />
                    <div class="card-body text-center">
                        <h5 class="card-title">Head of Marketing</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <img src="https://via.placeholder.com/300x300?text=Nina" class="card-img-top" alt="Nina" />
                    <div class="card-body text-center">
                        <h5 class="card-title">Lead Developer</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
