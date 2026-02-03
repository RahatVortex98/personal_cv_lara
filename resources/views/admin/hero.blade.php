<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Hero Section</title>

    <!-- Your existing styles + some table improvements -->
    <style>
        /* Your full CSS here – I kept it unchanged */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            padding: 40px 20px;
            min-height: 100vh;
            color: #e2e8f0;
        }
        .container { max-width: 1200px; margin: 0 auto; }
        h1 { color: #fff; margin-bottom: 30px; font-size: 28px; font-weight: 600; }
        .table-wrapper {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        table { width: 100%; border-collapse: collapse; }
        thead {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
        }
        th, td {
            padding: 16px 20px;
            text-align: left;
            font-size: 14px;
        }
        th {
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #fff;
        }
        tbody tr {
            background: rgba(255, 255, 255, 0.03);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
        }
        tbody tr:hover {
            background: rgba(59, 130, 246, 0.1);
        }
        .actions a {
            color: #60a5fa;
            text-decoration: none;
            margin-right: 12px;
        }
        .actions a:hover { text-decoration: underline; }
        .no-data {
            text-align: center;
            padding: 40px;
            color: #94a3b8;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hero Section Management</h1>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Image Path</th>
                        <th>Resume Path</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($heroes->isEmpty())
                        <tr>
                            <td colspan="4" class="no-data">No hero records found. Add one from the admin panel.</td>
                        </tr>
                    @else
                        @foreach ($heroes as $hero)
                            <tr>
                                <td>{{ Str::limit($hero->description ?? 'N/A', 80) }}</td>
                                <td>
                                    @if ($hero->image)
                                        <a href="{{ Storage::url($hero->image) }}" target="_blank">View Image</a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @if ($hero->resume)
                                        <a href="{{ Storage::url($hero->resume) }}" target="_blank">View Resume</a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="actions">
                                    <button><a href="{{ route('admin.hero.edit', $hero->id) }}">Edit</a></button>
                                    <!-- Add delete later with confirmation -->
                                    <!-- <a href="#" onclick="return confirm('Delete?')">Delete</a> -->
                                </td>
                                <td>
                            <form action="{{ route('admin.hero.destroy', $hero->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this hero?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                                                    </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Add New Button -->
        <div style="margin-top: 20px; text-align: right;">
            <a href="#" class="btn" style="background: #3b82f6; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none;">
                + Add New Hero Entry
            </a>
        </div>
    </div>
</body>
</html>