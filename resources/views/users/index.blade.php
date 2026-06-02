@extends('layouts.app')

@section('title', 'Users')

@section('content')
<div class="card supplier-panel">
    <div class="card-header supplier-panel-header">
        <div class="supplier-panel-title">
            <h2><i class="fas fa-users"></i> Users</h2>
            <p class="muted">Manage users, roles and quick actions</p>
            <div class="supplier-panel-meta">
                <span class="supplier-count">{{ $users->total() }} users</span>
            </div>
        </div>
        <div class="supplier-panel-actions">
            <a href="{{ route('users.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> New User
            </a>
        </div>
    </div>

    <div class="card-body supplier-panel-body">
        <div class="supplier-grid">
            @forelse($users as $user)
            <div class="supplier-card">
                <div class="supplier-header">
                    <div class="supplier-info" style="width:100%;">
                        <h3>{{ $user->name }}</h3>
                        <div class="supplier-city muted" style="margin-top:8px;">{{ $user->email }}</div>
                    </div>
                </div>

                <ul class="supplier-detail-list">
                    <li><strong>Role:</strong> {{ ucfirst($user->role ?? 'User') }}</li>
                    <li><strong>Joined:</strong> {{ $user->created_at->format('M d, Y') }}</li>
                </ul>

                <div class="supplier-actions">
                    <a href="{{ route('users.show', $user) }}" class="crud-btn view-btn">
                        <i class="fas fa-eye"></i>
                        View
                    </a>

                    <a href="{{ route('users.edit', $user) }}" class="crud-btn edit-btn">
                        <i class="fas fa-pen"></i>
                        Update
                    </a>

                    @if($user->id !== Auth::id())
                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="crud-btn delete-btn" onclick="return confirm('Delete this user?')">
                            <i class="fas fa-trash"></i>
                            Delete
                        </button>
                    </form>
                    @endif
                </div>
            </div>
            @empty
                <div style="text-align:center; padding:30px; grid-column:1/-1;">No users found</div>
            @endforelse
        </div>
    </div>

    <div class="card-footer supplier-panel-footer" style="margin-top:18px; display:flex; flex-direction:column; align-items:center; gap:10px;">
        <div class="pagination">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
