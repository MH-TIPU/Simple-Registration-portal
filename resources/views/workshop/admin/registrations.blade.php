<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Workshop Registrations - Admin</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: #f8fafc;
            font-family: 'Inter', sans-serif;
            color: #2d3748;
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .header {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #2d3748;
        }
        
        .stats {
            display: flex;
            gap: 2rem;
            flex-wrap: wrap;
        }
        
        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            text-align: center;
            min-width: 120px;
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            display: block;
        }
        
        .stat-label {
            font-size: 0.875rem;
            opacity: 0.9;
        }
        
        .actions {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }
        
        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #4CAF50, #45a049);
            color: white;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(76, 175, 80, 0.3);
        }
        
        .btn-secondary {
            background: #e2e8f0;
            color: #4a5568;
        }
        
        .btn-secondary:hover {
            background: #cbd5e0;
        }
        
        .btn-success {
            background: linear-gradient(135deg, #48BB78, #38A169);
            color: white;
        }
        
        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(72, 187, 120, 0.3);
        }
        
        .btn-warning {
            background: linear-gradient(135deg, #ED8936, #DD6B20);
            color: white;
        }
        
        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(237, 137, 54, 0.3);
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #F56565, #E53E3E);
            color: white;
        }
        
        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(245, 101, 101, 0.3);
        }
        
        .btn-info {
            background: linear-gradient(135deg, #4299E1, #3182CE);
            color: white;
        }
        
        .btn-info:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(66, 153, 225, 0.3);
        }
        
        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
        }
        
        .action-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }
        
        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            border: 1px solid #c3e6cb;
        }
        
        .search-container {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
        }
        
        .search-box {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        
        .search-box:focus {
            outline: none;
            border-color: #667eea;
        }
        
        .table-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .table thead {
            background: #f7fafc;
        }
        
        .table th,
        .table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .table th {
            font-weight: 600;
            color: #4a5568;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        .table tbody tr:hover {
            background: #f7fafc;
        }
        
        .table td {
            font-size: 0.9rem;
        }
        
        .email {
            color: #667eea;
        }
        
        .date {
            color: #718096;
            font-size: 0.875rem;
        }
        
        .no-registrations {
            text-align: center;
            padding: 3rem;
            color: #718096;
        }
        
        .no-registrations-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
            
            .header {
                flex-direction: column;
                text-align: center;
            }
            
            .table-container {
                overflow-x: auto;
            }
            
            .table {
                min-width: 600px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="header">
            <div>
                <h1>Workshop Registrations</h1>
                <p>Manage and export workshop registration data</p>
            </div>
            <div class="stats">
                <div class="stat-card">
                    <span class="stat-number">{{ $registrations->count() }}</span>
                    <span class="stat-label">Total Registrations</span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">{{ $registrations->where('registered_at', '>=', now()->startOfDay())->count() }}</span>
                    <span class="stat-label">Today</span>
                </div>
            </div>
        </div>
        
        <div class="actions">
            <a href="{{ route('workshop.admin.create') }}" class="btn btn-success">
                ➕ Add New Registration
            </a>
            <a href="{{ route('workshop.admin.export') }}" class="btn btn-primary">
                📊 Export to Excel
            </a>
            <button type="button" id="bulkDeleteBtn" class="btn btn-danger" style="display: none;" onclick="bulkDelete()">
                🗑️ Delete Selected
            </button>
            <a href="{{ route('workshop.landing') }}" class="btn btn-secondary">
                🏠 Back to Landing
            </a>
            <a href="{{ route('workshop.admin.logout') }}" class="btn btn-secondary" 
               onclick="return confirm('Are you sure you want to logout?')">
                🚪 Logout
            </a>
        </div>
        
        <div class="search-container">
            <input type="text" id="searchInput" class="search-box" placeholder="Search registrations by phone number...">
        </div>
        
        <div class="table-container">
            @if($registrations->count() > 0)
                <form id="bulkDeleteForm" method="POST" action="{{ route('workshop.admin.bulk-delete') }}">
                    @csrf
                </form>
                
                <table class="table" id="registrationsTable">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" id="selectAll" onchange="toggleSelectAll()">
                            </th>
                            <th>ID</th>
                            <th>Phone Number</th>
                            <th>Registration Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registrations as $registration)
                            <tr>
                                <td>
                                    <input type="checkbox" name="selected_ids[]" value="{{ $registration->id }}" class="registration-checkbox" form="bulkDeleteForm" onchange="toggleBulkDeleteBtn()">
                                </td>
                                <td><strong>#{{ $registration->id }}</strong></td>
                                <td>{{ $registration->phone_number }}</td>
                                <td class="date">{{ $registration->registered_at->format('M j, Y g:i A') }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('workshop.admin.show', $registration->id) }}" class="btn btn-info btn-sm">👁️ View</a>
                                        <a href="{{ route('workshop.admin.edit', $registration->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
                                        <form method="POST" action="{{ route('workshop.admin.destroy', $registration->id) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this registration?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">🗑️ Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="no-registrations">
                    <div class="no-registrations-icon">📝</div>
                    <h3>No registrations yet</h3>
                    <p>When students register for the workshop, their information will appear here.</p>
                </div>
            @endif
        </div>
    </div>
    
    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            const table = document.getElementById('registrationsTable');
            
            if (!table) return;
            
            const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
            
            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const cells = row.getElementsByTagName('td');
                let match = false;
                
                // Search in phone number column only (index 2 because of checkbox column)
                const phoneCell = cells[2]; // phone number column
                
                if (phoneCell && phoneCell.textContent.toLowerCase().includes(searchTerm)) {
                    match = true;
                }
                
                row.style.display = match ? '' : 'none';
            }
        });

        // Bulk delete functionality
        function toggleSelectAll() {
            const selectAllCheckbox = document.getElementById('selectAll');
            const checkboxes = document.querySelectorAll('.registration-checkbox');
            
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAllCheckbox.checked;
            });
            
            toggleBulkDeleteBtn();
        }

        function toggleBulkDeleteBtn() {
            const checkboxes = document.querySelectorAll('.registration-checkbox:checked');
            const bulkDeleteBtn = document.getElementById('bulkDeleteBtn');
            
            if (checkboxes.length > 0) {
                bulkDeleteBtn.style.display = 'inline-flex';
                bulkDeleteBtn.textContent = `🗑️ Delete Selected (${checkboxes.length})`;
            } else {
                bulkDeleteBtn.style.display = 'none';
            }
        }

        function bulkDelete() {
            const checkboxes = document.querySelectorAll('.registration-checkbox:checked');
            
            if (checkboxes.length === 0) {
                alert('Please select at least one registration to delete.');
                return;
            }
            
            const count = checkboxes.length;
            const confirmMessage = `Are you sure you want to delete ${count} registration${count > 1 ? 's' : ''}? This action cannot be undone.`;
            
            if (confirm(confirmMessage)) {
                document.getElementById('bulkDeleteForm').submit();
            }
        }
    </script>
</body>
</html>
