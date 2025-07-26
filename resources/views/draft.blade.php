<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>উদ্যোগ TARA ওয়ার্কশপ</title>
    
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
            /* background: #FEEDFE; */
            
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            padding: 2rem;
        }
        
        .container {
            text-align: center;
            max-width: 800px;
            width: 100%;
            background: rgba(255, 255, 255, 0.1);
            /* background: #FEEDFE; */
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 3rem 2rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .logos-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            gap: 1rem;
        }
        
        .logo {
            width: 120px;
            height: auto;
            /* background: rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 0.5rem; */
        }
        
        .title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, #ffffff, #ffd700);
            -webkit-background-clip: text;
            background-clip: text;
            line-height: 1;
            color: white
        }
        
        .subtitle {
            font-size: 1rem;
            margin-bottom: 2rem;
            line-height: 1;
            font-weight: 600;
            color: black
        }
        
        .content-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .content-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            border-radius: 15px;
            padding: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            text-align: center;
        }
        
        .content-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.2);
        }
        
        .content-card h3 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .content-card p {
            font-size: 1rem;
            opacity: 0.9;
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
            margin: 1.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(255, 107, 107, 0.3);
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .register-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(255, 107, 107, 0.4);
        }
        
        .collaboration-section {
            margin-top: 2rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border-radius: 15px;
            padding: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .collaboration-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #ffd700;
        }
        
        .collaboration-logos {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2rem;
            flex-wrap: wrap;
        }
        
        .collab-logo {
            width: 100px;
            height: auto;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            padding: 0.5rem;
            transition: transform 0.3s ease;
        }
        
        .collab-logo:hover {
            transform: scale(1.1);
        }
        
        .plus-symbol {
            font-size: 2rem;
            font-weight: bold;
            color: #ffd700;
        }
        
        .admin-link {
            position: absolute;
            bottom: 20px;
            right: 20px;
            color: rgba(255,255,255,0.5);
            text-decoration: none;
            font-size: 0.8rem;
            transition: color 0.3s ease;
        }
        
        .admin-link:hover {
            color: rgba(255,255,255,0.8);
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 2rem 1rem;
            }
            
            .title {
                font-size: 5px;
            }
            
            .content-grid {
                grid-template-columns: 1fr;
            }
            
            .logos-container {
                flex-direction: column;
                gap: 1rem;
            }
            
            .collaboration-logos {
                flex-direction: column;
                gap: 1rem;
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
        
        <!-- Top Logo Row -->
        <div class="logos-container">
            <img src="{{ asset('img/tara_logo.png') }}" alt="Udyog TARA" class="logo" />
            <img src="{{ asset('img/uddogtara.png') }}" alt="BRAC TARA" class="logo" />
        </div>

        <!-- Title -->
        <h1 class="title" style="background: #8F2A89; padding: 10px;  border-radius: 20px; -webkit-background-clip: initial; -webkit-text-fill-color: initial; background-clip: initial;">
            ডিজিটাল দক্ষতা উন্নয়ন ওয়ার্কশপ
        </h1>

        <!-- Subtitle -->
        <p class="subtitle">নারী উদ্যোক্তার উদ্যোগে এআই</p>

        <!-- Content Grid -->
        <div class="content-grid">
            @if(session('registered'))
            <!-- WhatsApp Group Join Button -->
            <div class="content-card" style="grid-column: 1 / -1;">
                <h3>✅ অংশগ্রহণ নিশ্চিত</h3>
                <p>আপনার রেজিস্ট্রেশন সম্পন্ন হয়েছে</p>
                <a href="https://chat.whatsapp.com/your-group-link" target="_blank" class="register-btn" style="margin-top: 1.5rem;">
                    হোয়াটসঅ্যাপ গ্রুপে যোগ দিন
                </a>
            </div>
            @else
            <!-- Registration Form -->
            <form method="POST" action="{{ route('draft.register') }}" style="grid-column: 1 / -1;">
                @csrf
                <div class="content-card">
                    <h3>রেজিস্ট্রেশন</h3>
                    <p style="margin-bottom: 1.5rem;">শুধু মোবাইল নম্বর দিয়ে রেজিস্টার করুন</p>
                    
                    <!-- Phone Number Field -->
                    <div style="margin-bottom: 1.5rem;">
                        <input 
                            type="tel" 
                            name="phone_number" 
                            placeholder="মোবাইল নম্বর লিখুন" 
                            required 
                            value="{{ old('phone_number') }}"
                            style="width: 100%; padding: 1rem; border-radius: 10px; border: 1px solid #ddd; font-size: 1.1rem; text-align: center;"
                        />
                        @error('phone_number')
                            <div style="color: #ff6b6b; font-size: 0.9rem; margin-top: 0.5rem;">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="register-btn" style="margin-top: 1rem;">
                        রেজিস্টার করুন
                    </button>
                </div>
            </form>
            @endif
        </div>

        <!-- Collaboration Section -->
        <div class="collaboration-section">
            <h4 class="collaboration-title">সহযোগিতায়</h4>
            <div class="collaboration-logos">
            <img src="{{ asset('img/GF_LOGO.png') }}" alt="Gates Foundation Logo"  style="height: 60px; width: auto;" />
            <img src="{{ asset('img/bdosn_logo.jpg') }}" alt="BdOSN Logo"  style="height: 60px; width: auto;" />
            </div>
        </div>

    </div>

    <!-- Admin link -->
    <a href="{{ route('workshop.admin.registrations') }}" class="admin-link">
        Admin
    </a>

</body>
</html>
