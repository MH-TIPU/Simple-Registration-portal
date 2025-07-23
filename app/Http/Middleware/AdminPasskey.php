<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminPasskey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is already authenticated in this session
        if (session('admin_authenticated')) {
            return $next($request);
        }

        // Check if passkey is provided
        if ($request->has('passkey')) {
            $passkey = $request->input('passkey');
            
            // Get passkey from config (you can change this in .env file)
            $correctPasskey = env('ADMIN_PASSKEY', 'admin123');
            
            if ($passkey === $correctPasskey) {
                session(['admin_authenticated' => true]);
                return redirect($request->url());
            } else {
                return $this->showPasskeyForm($request, 'Invalid passkey. Please try again.');
            }
        }

        // Show passkey form
        return $this->showPasskeyForm($request);
    }

    private function showPasskeyForm($request, $error = null)
    {
        $html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Access - Enter Passkey</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600" rel="stylesheet" />
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: "Inter", sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        .passkey-container {
            background: white;
            padding: 3rem 2rem;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .lock-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #667eea;
        }
        h1 {
            color: #2d3748;
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }
        p {
            color: #4a5568;
            margin-bottom: 2rem;
        }
        .form-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }
        label {
            display: block;
            color: #4a5568;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }
        input[type="password"] {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        input[type="password"]:focus {
            outline: none;
            border-color: #667eea;
        }
        .btn {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }
        .error {
            background: #fed7d7;
            color: #c53030;
            padding: 0.75rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }
        .back-link {
            margin-top: 1.5rem;
        }
        .back-link a {
            color: #667eea;
            text-decoration: none;
            font-size: 0.9rem;
        }
        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="passkey-container">
        <div class="lock-icon">🔒</div>
        <h1>Admin Access</h1>
        <p>Enter the admin passkey to continue</p>
        
        ' . ($error ? '<div class="error">' . $error . '</div>' : '') . '
        
        <form method="GET">
            <div class="form-group">
                <label for="passkey">Passkey:</label>
                <input type="password" id="passkey" name="passkey" required autocomplete="off" autofocus>
            </div>
            <button type="submit" class="btn">Access Admin Panel</button>
        </form>
        
        <div class="back-link">
            <a href="' . route('workshop.landing') . '">← Back to Workshop</a>
        </div>
    </div>
    
    <script>
        // Auto-focus on the passkey input
        document.getElementById("passkey").focus();
    </script>
</body>
</html>';

        return response($html);
    }
}
