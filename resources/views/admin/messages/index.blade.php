@extends('admin.admin_dashboard')

@section('content')
<div class="container py-5">
    <h2 class="text-white mb-4">Inquiry Inbox</h2>

    <div class="card bg-dark text-light border-0 shadow">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $msg)
                        <tr>
                            <td>{{ $msg->created_at->format('d M, Y') }}</td>
                            <td>{{ $msg->name }}</td>
                            <td>{{ $msg->email }}</td>
                            <td>{{ $msg->subject ?? 'N/A' }}</td>
                            <td>
                                <button class="btn btn-sm btn-info" onclick="alert('{{ addslashes($msg->message) }}')">
                                    Read Message
                                </button>
                            </td>
                            <td>
                                <form action="{{ route('admin.message.delete', $msg->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete message?')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">No messages yet.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection