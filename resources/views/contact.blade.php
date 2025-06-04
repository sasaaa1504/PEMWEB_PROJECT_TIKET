{{-- resources/views/contact.blade.php --}}
@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Contact Us</h1>

    <div class="row">
        <div class="col-md-6">
            <h5>Get in Touch</h5>
            <p>If you have any questions, feel free to reach out to us!</p>
            <ul class="list-unstyled">
                <li><strong>Address:</strong> 123 Main Street, Cityville, Country</li>
                <li><strong>Phone:</strong> +62 812 3456 7890</li>
                <li><strong>Email:</strong> support@hittix.com</li>
                <li><strong>Office Hours:</strong> Mon - Fri, 9 AM - 5 PM</li>
            </ul>
        </div>

        <div class="col-md-6">
            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name" required />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Your Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email" required />
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" rows="4" placeholder="Write your message here..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </div>
</div>
@endsection
