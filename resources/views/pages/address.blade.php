@extends('layouts.app')

@section('title', 'Address')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-map-marker-alt"></i> Address</h2>
    </div>
    <div class="card-body">
        <div class="content-block">
            <p><strong>Inventory Management System</strong></p>
            <p>Kigali, Rwanda</p>

            <h3>Contact Information</h3>
            <ul>
                <li><strong>Email:</strong> info@inventorysystem.com</li>
                <li><strong>Phone:</strong> +250 788 123 456</li>
                <li><strong>Website:</strong> www.inventorysystem.com</li>
                <li><strong>Working Hours:</strong> Monday – Friday, 8:00 AM – 5:00 PM</li>
            </ul>

            <h3>Location Description</h3>
            <p>Our office is located in Kigali, Rwanda, where we provide inventory management solutions designed to help businesses efficiently manage products, suppliers, stock transactions, and inventory records. We are committed to delivering reliable, secure, and innovative services that support business growth and operational excellence.</p>
        </div>
    </div>
</div>
@endsection