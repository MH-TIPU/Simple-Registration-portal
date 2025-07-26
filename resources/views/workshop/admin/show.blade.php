<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Registration - Admin</title>
    
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
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .header {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
            text-align: center;
        }
        
        .header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.5rem;
        }
        
        .details-container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
        }
        
        .detail-group {
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .detail-group:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }
        
        .detail-label {
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        .detail-value {
            font-size: 1.1rem;
            color: #2d3748;
            font-weight: 500;
        }
        
        .email-value {
            color: #667eea;
        }
        
        .date-value {
            color: #718096;
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
            font-size: 1rem;
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
        
        .btn-secondary {
            background: #e2e8f0;
            color: #4a5568;
        }
        
        .btn-secondary:hover {
            background: #cbd5e0;
        }
        
        .actions {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            flex-wrap: wrap;
        }
        
        .back-link {
            margin-bottom: 1rem;
        }
        
        .back-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }
        
        .back-link a:hover {
            text-decoration: underline;
        }
        
        .id-badge {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
            
            .actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="back-link">
            <a href="{{ route('workshop.admin.registrations') }}">← Back to Registrations</a>
        </div>
        
        <div class="header">
            <div class="id-badge">Registration #{{ $registration->id }}</div>
            <h1>Registration Details</h1>
            <p>View complete workshop registration information</p>
        </div>
        
        <div class="details-container">
            <div class="detail-group">
                <div class="detail-label">Phone Number</div>
                <div class="detail-value">{{ $registration->phone_number }}</div>
            </div>
            
            <div class="detail-group">
                <div class="detail-label">Registration Date</div>
                <div class="detail-value date-value">{{ $registration->registered_at->format('l, F j, Y \a\t g:i A') }}</div>
            </div>
            
            <div class="detail-group">
                <div class="detail-label">Time Since Registration</div>
                <div class="detail-value date-value">{{ $registration->registered_at->diffForHumans() }}</div>
            </div>
        </div>
        
        <div class="actions">
            <a href="{{ route('workshop.admin.edit', $registration->id) }}" class="btn btn-warning">
                ✏️ Edit Registration
            </a>
            <form method="POST" action="{{ route('workshop.admin.destroy', $registration->id) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this registration? This action cannot be undone.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    🗑️ Delete Registration
                </button>
            </form>
            <a href="{{ route('workshop.admin.registrations') }}" class="btn btn-secondary">
                📋 Back to List
            </a>
        </div>
    </div>
</body>
</html>
