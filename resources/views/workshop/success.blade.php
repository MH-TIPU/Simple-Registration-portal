<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Successful!</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600" rel="stylesheet" />
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
            padding: 2rem;
        }
        
        .success-container {
            background: white;
            padding: 3rem 2rem;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            text-align: center;
            animation: slideIn 0.6s ease-out;
        }
        
        @keyframes slideIn {
            0% {
                transform: scale(0.9);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
        
        .success-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            animation: bounce 1s ease-out;
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-20px);
            }
            60% {
                transform: translateY(-10px);
            }
        }
        
        .success-title {
            color: #2d3748;
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #4CAF50;
        }
        
        .success-message {
            color: #4a5568;
            font-size: 1.1rem;
            margin-bottom: 2rem;
            line-height: 1.6;
        }
        
        .next-steps {
            background: #f0f9ff;
            border: 1px solid #e3f2fd;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            text-align: left;
        }
        
        .next-steps h3 {
            color: #1976d2;
            font-size: 1.1rem;
            margin-bottom: 1rem;
            text-align: center;
        }
        
        .next-steps ul {
            list-style: none;
            padding: 0;
        }
        
        .next-steps li {
            color: #555;
            font-size: 0.95rem;
            margin: 0.5rem 0;
            padding-left: 1.5rem;
            position: relative;
        }
        
        .next-steps li::before {
            content: '✓';
            color: #4CAF50;
            font-weight: bold;
            position: absolute;
            left: 0;
        }
        
        .contact-info {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .contact-info h4 {
            color: #856404;
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }
        
        .contact-info p {
            color: #856404;
            font-size: 0.9rem;
            margin: 0.2rem 0;
        }
        
        .home-link {
            display: inline-block;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 0.8rem 2rem;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 500;
            margin-top: 1rem;
            transition: all 0.3s ease;
        }
        
        .home-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-icon">✅</div>
        
        <h1 class="success-title">Registration Successful!</h1>
        
        <p class="success-message">
            Thank you for registering for the উদ্যোগ Tara AI Workshop! 
            Your spot has been confirmed and we're excited to have you join us.
        </p>
        
        {{-- <div class="next-steps">
            <h3>What's Next?</h3>
            <ul>
            <li>We'll send you a confirmation email with workshop details</li>
            <li>Location and timing information will be shared soon</li>
            <li>Bring a laptop and enthusiasm to learn!</li>
            <li>Any preparation materials will be emailed to you</li>
            </ul>
        </div> --}}
        <a href="https://chat.whatsapp.com/HK4ExvJlazbJP8ixr2gsO3" target="_blank" class="home-link" style="background: #25D366; margin-top: 0;">
            Join our WhatsApp Group
        </a>
        
        {{-- <div class="contact-info">
            <h4>Need Help?</h4>
            <p>If you have any questions, feel free to contact us:</p>
            <p><strong>Email:</strong> workshop@example.com</p>
            <p><strong>Phone:</strong> +1 (555) 123-4567</p>
        </div> --}}
        
        <a href="{{ route('workshop.landing') }}" class="home-link">
            Back to Home
        </a>
    </div>
</body>
</html>
