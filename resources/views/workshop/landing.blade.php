<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AI Workshop Registration</title>
    
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
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            padding: 2rem;
        }
        
        .container {
            text-align: center;
            max-width: 600px;
            width: 100%;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 3rem 2rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, #ffffff, #ffd700);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .subtitle {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            line-height: 1.6;
        }
        
        .register-btn {
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            border: none;
            padding: 1.2rem 3rem;
            font-size: 1.3rem;
            font-weight: 600;
            color: white;
            border-radius: 50px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(255, 107, 107, 0.3);
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .register-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(255, 107, 107, 0.4);
        }
        
        .info {
            margin-top: 2rem;
            font-size: 1rem;
            opacity: 0.8;
        }
        
        .highlight {
            color: #ffd700;
            font-weight: 600;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 2rem 1rem;
            }
            
            .title {
                font-size: 2.2rem;
            }
            
            .register-btn {
                padding: 1rem 2rem;
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset('img/bdosn_logo.jpg') }}" alt="Logo" class="logo" style="width: 100px; height: auto; margin-bottom: 1rem;">
        <h1 class="title"> উদ্যোগ Tara </h1>
        
        <p class="subtitle">
            ডিজিটাল দক্ষতা উন্নয়ন ওয়ার্কশপ - এ অংশ নিয়ে হয়ে উঠুন স্মার্ট নারী উদ্যোক্তা।
        </p>
        
        <a href="{{ route('workshop.register.form') }}" class="register-btn">
            Register Now
        </a>
        
        {{-- <div class="info">
            <p><span class="highlight">Duration:</span> 4 hours</p>
            <p><span class="highlight">Format:</span> Onsite Workshop</p>
            <p><span class="highlight">Requirements:</span> No prior experience needed</p>
        </div> --}}
        
        <!-- Admin link (discreet) -->
        <div style="position: absolute; bottom: 20px; right: 20px;">
            <a href="{{ route('workshop.admin.registrations') }}" 
               style="color: rgba(255,255,255,0.5); text-decoration: none; font-size: 0.8rem;">
                Admin
            </a>
        </div>
    </div>
</body>
</html>
