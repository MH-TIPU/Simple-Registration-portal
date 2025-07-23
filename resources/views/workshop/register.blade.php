<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register for AI Workshop</title>
    
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
            padding: 1rem;
        }
        
        .form-container {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }
        
        .form-title {
            text-align: center;
            color: #333;
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .form-subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }
        
        .form-group {
            margin-bottom: 1rem;
        }
        
        .form-label {
            display: block;
            color: #333;
            font-weight: 500;
            margin-bottom: 0.3rem;
            font-size: 0.9rem;
        }
        
        .form-input {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f9f9f9;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            background: white;
        }
        
        .form-input.error {
            border-color: #e74c3c;
            background: #ffeaea;
        }
        
        .error-message {
            color: #e74c3c;
            font-size: 0.8rem;
            margin-top: 0.3rem;
        }
        
        .submit-btn {
            width: 100%;
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: none;
            padding: 1rem;
            font-size: 1rem;
            font-weight: 600;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }
        
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }
        
        .back-link {
            display: block;
            text-align: center;
            color: #667eea;
            text-decoration: none;
            margin-top: 1rem;
            font-size: 0.9rem;
        }
        
        .back-link:hover {
            text-decoration: underline;
        }
        
        .required {
            color: #e74c3c;
        }
        
        .workshop-info {
            background: #f0f7ff;
            border: 1px solid #e3f2fd;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        
        .workshop-info h3 {
            color: #1976d2;
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }
        
        .workshop-info p {
            color: #555;
            font-size: 0.85rem;
            margin: 0.2rem 0;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div style="display: flex; justify-content: center;">
            <img src="{{ asset('img/bdosn_logo.jpg') }}" alt="BDOSN logo featuring stylized text BDOSN in blue and green with a digital network motif, conveying a modern and innovative atmosphere" class="logo" style="width: 100px; height: auto; margin-bottom: 1rem;">
        </div>
        <h1 class="form-title"> উদ্যোগ Tara </h1>
        <p class="form-subtitle">
            ডিজিটাল দক্ষতা উন্নয়ন ওয়ার্কশপ - এ অংশ নিয়ে হয়ে উঠুন স্মার্ট নাড়ী উদ্যোক্তা।
        </p>
        <p class="form-subtitle">* Fill in your details to join us</p>
        
        <form action="{{ route('workshop.register.submit') }}" method="POST">
            @csrf
            
            <!-- Name Field -->
            <div class="form-group">
                <label for="name" class="form-label">
                    Full Name <span class="required">*</span>
                </label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    class="form-input {{ $errors->has('name') ? 'error' : '' }}"
                    value="{{ old('name') }}"
                    placeholder="Enter your full name"
                    required
                >
                @if($errors->has('name'))
                    <div class="error-message">{{ $errors->first('name') }}</div>
                @endif
            </div>
            
            <!-- Phone Number Field -->
            <div class="form-group">
                <label for="phone_number" class="form-label">
                    Phone Number <span class="required">*</span>
                </label>
                <input 
                    type="tel" 
                    id="phone_number" 
                    name="phone_number" 
                    class="form-input {{ $errors->has('phone_number') ? 'error' : '' }}"
                    value="{{ old('phone_number') }}"
                    placeholder="Enter your phone number"
                    required
                >
                @if($errors->has('phone_number'))
                    <div class="error-message">{{ $errors->first('phone_number') }}</div>
                @endif
            </div>
            
            <!-- Email Field -->
            <div class="form-group">
                <label for="email" class="form-label">
                    Email Address <span class="required">*</span>
                </label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="form-input {{ $errors->has('email') ? 'error' : '' }}"
                    value="{{ old('email') }}"
                    placeholder="Enter your email"
                    required
                >
                @if($errors->has('email'))
                    <div class="error-message">{{ $errors->first('email') }}</div>
                @endif
            </div>
            
            <!-- Enterprise Name Field -->
            <div class="form-group">
                <label for="enterprise_name" class="form-label">
                    Institute/Organization <span class="required">*</span>
                </label>
                <input 
                    type="text" 
                    id="enterprise_name" 
                    name="enterprise_name" 
                    class="form-input {{ $errors->has('enterprise_name') ? 'error' : '' }}"
                    value="{{ old('enterprise_name') }}"
                    placeholder="Enter your Institute or organization"
                    required
                >
                @if($errors->has('enterprise_name'))
                    <div class="error-message">{{ $errors->first('enterprise_name') }}</div>
                @endif
            </div>
            
            <!-- Submit Button -->
            <button type="submit" class="submit-btn">
                Register Now
            </button>
        </form>
        
        <!-- Back Link -->
        <a href="{{ route('workshop.landing') }}" class="back-link">
            ← Back to Workshop Info
        </a>
    </div>
</body>
</html>
