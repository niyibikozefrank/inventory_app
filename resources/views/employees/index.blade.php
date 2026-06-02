@extends('layouts.app')

@section('title', 'Employees')

@section('page-title', 'Employees Directory')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
<style>
    .employees-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .search-box {
        flex: 1;
        min-width: 250px;
    }

    .search-box input {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 14px;
        transition: border-color 0.3s;
    }

    .search-box input:focus {
        outline: none;
        border-color: #667eea;
    }

    .employees-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
    }

    .employee-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .employee-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .employee-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        margin: 0 auto 15px;
        object-fit: cover;
        border: 3px solid #667eea;
    }

    .employee-placeholder {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        margin: 0 auto 15px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 32px;
        border: 3px solid #667eea;
    }

    .employee-name {
        font-size: 18px;
        font-weight: 600;
        color: #333;
        text-align: center;
        margin-bottom: 8px;
    }

    .employee-email {
        font-size: 13px;
        color: #666;
        text-align: center;
        margin-bottom: 15px;
        word-break: break-all;
    }

    .employee-status {
        display: inline-block;
        background: #d4edda;
        color: #155724;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        margin: 0 auto;
        display: block;
        text-align: center;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #999;
    }

    .empty-state-icon {
        font-size: 64px;
        margin-bottom: 20px;
    }

    .empty-state h3 {
        color: #333;
        margin-bottom: 10px;
    }

    .stats-section {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .stat-value {
        font-size: 32px;
        font-weight: bold;
        color: #667eea;
        margin-bottom: 10px;
    }

    .stat-label {
        color: #666;
        font-size: 14px;
    }
</style>

<div class="stats-section">
    <div class="stat-card">
        <div class="stat-value">{{ $totalEmployees }}</div>
        <div class="stat-label">Total Employees</div>
    </div>
    <div class="stat-card">
        <div class="stat-value">{{ $activeEmployees }}</div>
        <div class="stat-label">Active Employees</div>
    </div>
</div>

<div class="employees-header">
    <div class="search-box">
        <input type="text" id="employeeSearch" placeholder="Search by name or email...">
    </div>
</div>

@if($employees->count() > 0)
    <div class="employees-grid" id="employeesGrid">
        @foreach($employees as $employee)
            <div class="employee-card" data-name="{{ strtolower($employee->name) }}" data-email="{{ strtolower($employee->email) }}">
                @if($employee->profile_photo_path)
                    <img src="{{ Storage::url($employee->profile_photo_path) }}" alt="{{ $employee->name }}" class="employee-avatar">
                @else
                    <div class="employee-placeholder">
                        {{ strtoupper(substr($employee->name, 0, 1)) }}
                    </div>
                @endif
                <div class="employee-name">{{ $employee->name }}</div>
                <div class="employee-email">{{ $employee->email }}</div>
                <span class="employee-status">Employee</span>
            </div>
        @endforeach
    </div>
@else
    <div class="empty-state">
        <div class="empty-state-icon">👥</div>
        <h3>No employees found</h3>
        <p>There are no employees in the system yet.</p>
    </div>
@endif

<script>
    const searchInput = document.getElementById('employeeSearch');
    const employeesGrid = document.getElementById('employeesGrid');
    
    if (searchInput && employeesGrid) {
        searchInput.addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            const cards = employeesGrid.querySelectorAll('.employee-card');
            let visibleCount = 0;
            
            cards.forEach(card => {
                const name = card.getAttribute('data-name');
                const email = card.getAttribute('data-email');
                
                if (name.includes(searchTerm) || email.includes(searchTerm)) {
                    card.style.display = '';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });
            
            // Show empty state if no results
            if (visibleCount === 0) {
                if (!document.getElementById('noResults')) {
                    const noResults = document.createElement('div');
                    noResults.id = 'noResults';
                    noResults.className = 'empty-state';
                    noResults.innerHTML = '<div class="empty-state-icon">🔍</div><h3>No employees found</h3><p>Try adjusting your search criteria.</p>';
                    employeesGrid.parentElement.appendChild(noResults);
                }
            } else {
                const noResults = document.getElementById('noResults');
                if (noResults) {
                    noResults.remove();
                }
            }
        });
    }
</script>

@endsection
