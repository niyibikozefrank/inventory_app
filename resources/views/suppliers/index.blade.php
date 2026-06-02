@extends('layouts.app')

@section('title', 'Suppliers')

@section('content')

<style>
.supplier-panel{
    background:#fff;
    border-radius:15px;
    box-shadow:0 4px 20px rgba(0,0,0,.08);
    overflow:hidden;
}

.supplier-panel-header{
    display:flex;
                <div class="supplier-photo" role="button" title="Click to preview"
                     @php
                         $photo = $supplier->photo ?? null;
                         $avatar = $photo ? asset('storage/' . $photo) : 'https://ui-avatars.com/api/?name=' . urlencode($supplier->name) . '&background=667eea&color=fff&size=256';
                     @endphp
                     data-photo="{{ $avatar }}">
                    <div class="avatar-placeholder" aria-hidden="true">
                        <div class="avatar-shimmer"></div>
                    </div>
                    @if($photo)
                        <img data-src="{{ asset('storage/' . $photo) }}" alt="{{ $supplier->name }}" class="supplier-avatar-img supplier-photo-img" loading="lazy" />
                    @else
                        <img data-src="https://ui-avatars.com/api/?name={{ urlencode($supplier->name) }}&background=667eea&color=fff&size=256" alt="{{ $supplier->name }}" class="supplier-avatar-img supplier-photo-img" loading="lazy" />
                    @endif
                </div>

                <div class="supplier-info">
                    <h3>{{ $supplier->name }}</h3>
                    <span style="background:#fff;color:#667eea;padding:6px 14px;border-radius:25px;font-size:12px;font-weight:bold;display:inline-block;margin-top:8px;">
                        ID #{{ $supplier->id }}
                    </span>
                    <div class="supplier-city muted" style="margin-top:8px;">{{ $supplier->city }}</div>
                </div>
    gap:15px;
    padding:20px;
    background:linear-gradient(135deg,#667eea,#764ba2);
    color:white;
}

.supplier-panel-title h2{
    margin:0;
    font-size:28px;
}

.supplier-panel-title p{
    margin-top:5px;
    opacity:.9;
}

.supplier-panel-actions{
    display:flex;
    gap:10px;
    align-items:center;
}

.supplier-search input{
    padding:10px 15px;
    border:none;
    border-radius:8px;
    width:280px;
    outline:none;
}

.supplier-grid{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(350px,1fr));
    gap:25px;
    padding:25px;
}

.supplier-card{
    background:#fff;
    border-radius:15px;
    border:1px solid #e5e7eb;
    overflow:hidden;
    transition:.3s;
    box-shadow:0 2px 10px rgba(0,0,0,.08);
}

.supplier-card:hover{
    transform:translateY(-5px);
    box-shadow:0 10px 25px rgba(0,0,0,.15);
}

.supplier-header{
    background:linear-gradient(135deg,#667eea,#764ba2);
    padding:20px;
    display:flex;
    align-items:center;
    gap:15px;
    color:white;
}

.supplier-photo{
    width:80px;
    height:80px;
    border-radius:50%;
    object-fit:cover;
    border:3px solid white;
}

.supplier-info h3{
    margin:0;
    font-size:20px;
}

.supplier-city{
    display:inline-block;
    margin-top:6px;
    background:white;
    color:#667eea;
    padding:5px 12px;
    border-radius:20px;
    font-size:12px;
    font-weight:600;
}

.supplier-details{
    padding:20px;
}

.detail-item{
    display:flex;
    align-items:center;
    gap:10px;
    margin-bottom:12px;
    color:#555;
}

.detail-item i{
    color:#667eea;
    width:20px;
}

.supplier-stats{
    display:grid;
    grid-template-columns:1fr 1fr;
    border-top:1px solid #eee;
    border-bottom:1px solid #eee;
}

.stat-box{
    text-align:center;
    padding:15px;
}

.stat-box h4{
    margin:0;
    color:#667eea;
    font-size:22px;
}

.stat-box p{
    margin-top:5px;
    color:#777;
    font-size:13px;
}

.supplier-actions{
    display:flex;
    gap:10px;
    padding:20px;
}

.btn{
    padding:10px 15px;
    border:none;
    border-radius:8px;
    text-decoration:none;
    text-align:center;
    cursor:pointer;
    font-weight:600;
}

.btn-primary{
    background:#667eea;
    color:white;
}

.btn-secondary{
    background:#6c757d;
    color:white;
}

.btn-danger{
    background:#dc3545;
    color:white;
}

.btn-outline{
    background:#f8f9fa;
    border:1px solid #ddd;
    color:#333;
    padding:4px 10px;
    font-size:12px;
}

.btn:hover{
    opacity:.9;
}

.pagination{
    padding:20px;
}

.empty-state{
    grid-column:1/-1;
    text-align:center;
    padding:60px;
    background:#fafafa;
    border-radius:15px;
}

.empty-state i{
    font-size:60px;
    color:#667eea;
    margin-bottom:15px;
}

@media(max-width:768px){

    .supplier-panel-header{
        flex-direction:column;
        align-items:flex-start;
    }

    .supplier-search input{
        width:100%;
    }

    .supplier-grid{
        grid-template-columns:1fr;
    }

    .supplier-actions{
        flex-direction:column;
    }
}
</style>

<div class="supplier-panel">

```
<div class="supplier-panel-header">

    <div class="supplier-panel-title">
        <h2>
            <i class="fas fa-people-carry"></i>
            Suppliers
        </h2>
        <p>Manage suppliers, contacts and supplier information</p>
    </div>

    <div class="supplier-panel-actions">

        <div class="supplier-search">
            <input
                type="text"
                id="supplier-search"
                placeholder="Search suppliers..."
            >
        </div>

        <a href="{{ route('suppliers.create') }}"
           class="btn btn-primary">
            <i class="fas fa-plus"></i>
            New Supplier
        </a>

    </div>

</div>

<div class="supplier-grid">

    @forelse($suppliers as $supplier)

    @php
        $avatar = $supplier->photo
            ? asset('storage/'.$supplier->photo)
            : 'https://ui-avatars.com/api/?name='.urlencode($supplier->name).'&background=667eea&color=fff';
    @endphp

    <div class="supplier-card">

        <div class="supplier-header">

            <img src="{{ $avatar }}"
                 alt="{{ $supplier->name }}"
                 class="supplier-photo">

            <div class="supplier-info">
                <h3>{{ $supplier->name }}</h3>

                <span class="supplier-city">
                    {{ $supplier->city ?? 'Unknown City' }}
                </span>
            </div>

        </div>

        <div class="supplier-details">

            <div class="detail-item">
                <i class="fas fa-user"></i>
                <span>{{ $supplier->contact_person ?? 'N/A' }}</span>
            </div>

            <div class="detail-item">
                <i class="fas fa-phone"></i>
                <span>{{ $supplier->phone ?? 'N/A' }}</span>
            </div>

            <div class="detail-item">
                <i class="fas fa-envelope"></i>
                <span>{{ $supplier->email ?? 'N/A' }}</span>
            </div>

            <div class="detail-item">
                <i class="fas fa-map-marker-alt"></i>
                <span>{{ $supplier->address ?? 'No Address' }}</span>
            </div>

        </div>

        <div class="supplier-stats">

            <div class="stat-box">
                <h4>{{ $supplier->created_at->format('d') }}</h4>
                <p>Day Added</p>
            </div>

            <div class="stat-box">
                <h4>{{ $supplier->created_at->format('M Y') }}</h4>
                <p>Registered</p>
            </div>

        </div>

        <div class="supplier-actions">

            <a href="{{ route('suppliers.show',$supplier) }}"
               class="btn btn-secondary">
                <i class="fas fa-eye"></i>
                View
            </a>

            <a href="{{ route('suppliers.edit',$supplier) }}"
               class="btn btn-primary">
                <i class="fas fa-edit"></i>
                Edit
            </a>

            <form action="{{ route('suppliers.destroy',$supplier) }}"
                  method="POST"
                  style="flex:1;">

                @csrf
                @method('DELETE')

                <button type="submit"
                        class="btn btn-danger"
                        style="width:100%;"
                        onclick="return confirm('Delete this supplier?')">
                    <i class="fas fa-trash"></i>
                    Delete
                </button>

            </form>

        </div>

    </div>

    @empty

    <div class="empty-state">
        <i class="fas fa-box-open"></i>
        <h3>No Suppliers Found</h3>
        <p>Create your first supplier to get started.</p>
    </div>

    @endforelse

</div>

<div style="padding:20px;text-align:center;">
    {{ $suppliers->links() }}
</div>
```

</div>

@endsection
