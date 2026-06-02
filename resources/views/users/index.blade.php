@extends('layouts.app')

@section('title', 'Users')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-users"></i> Users Management</h2>
        <a href="{{ route('users.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add User
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Joined</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('M d, Y') }}</td>
                <td>
                    <a href="{{ route('users.show', $user) }}" class="btn btn-secondary btn-sm">View</a>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-secondary btn-sm">Edit</a>
                    @if($user->id !== Auth::id())
                    <form method="POST" action="{{ route('users.destroy', $user) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align: center; padding: 20px;">No users found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination">
        {{ $users->links() }}
    </div>
</div>
@endsection
