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
            background: linear-gradient(135deg, #ffe4e6a4 0%, #ffccd5 50%, #ffb3bb 100%);
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
            background: rgba(255, 255, 255, 0.628);
            /* background: #FEEDFE; */
            backdrop-filter: blur(50px);
            border-radius: 20px;
            padding: 3rem 2rem;
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 25px 50px rgba(247, 57, 152, 0.258);
        }

        .logos-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            gap: .5rem;
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
            background: linear-gradient(45deg, #ffffff, #ffb6c1);
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
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            border-radius: 15px;
            padding: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.8);
            transition: all 0.3s ease;
            text-align: center;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .content-card:hover {
            transform: translateY(-8px);
            background: rgba(255, 255, 255, 0.85);
            box-shadow: 0 25px 50px rgba(255, 105, 180, 0.4);
        }

        .content-card h3 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 0.8rem;
            color: #222;
        }

        .content-card p {
            font-size: 1.1rem;
            color: #444;
            font-weight: 500;
        }

        .register-btn {
            background: linear-gradient(45deg, #ff69b4, #ff1493);
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
            box-shadow: 0 10px 30px rgba(255, 105, 180, 0.3);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .register-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(255, 105, 180, 0.4);
        }

        .collaboration-section {
            margin-top: 2rem;
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(20px);
            border-radius: 15px;
            padding: 2.5rem;
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .collaboration-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #ff1493;
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
            background: rgba(255, 255, 255, 0.5);
            border-radius: 10px;
            padding: 0.8rem;
            transition: transform 0.3s ease;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .collab-logo:hover {
            transform: scale(1.1);
            box-shadow: 0 15px 35px rgba(255, 105, 180, 0.4);
        }

        .plus-symbol {
            font-size: 2rem;
            font-weight: bold;
            color: #ffb6c1;
        }

        .admin-link {
            position: absolute;
            bottom: 15px;
            right: 25px;
            color: rgba(255, 255, 255, 0.5);
            text-decoration: none;
            font-size: 0.8rem;
            transition: color 0.3s ease;
        }

        .admin-link:hover {
            color: rgba(255, 255, 255, 0.8);
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
        <div class="logos-container" style="margin-bottom: 0.5rem; margin-top: 0.5rem;">
            <div
                style="display: flex; flex-direction: row; align-items: center; justify-content: center; width: 100%; gap: 0.5rem;">
                <img src="{{ asset('img/uddogtara.png') }}" alt="BRAC TARA" class="logo"
                    style="max-width: 48%; height: auto;" />

                <img src="{{ asset('img/tara_logo.png') }}" alt="Udyog TARA" class="logo"
                    style="max-width: 48%; height: auto;" />
            </div>
        </div>
        <style>
            @media (max-width: 768px) {
                .logos-container {
                    margin-bottom: 0.2rem !important;
                    margin-top: 0.2rem !important;
                }

                .logos-container>div {
                    gap: 0.3rem !important;
                }

                .logo {
                    max-width: 48% !important;
                    height: auto !important;
                }
            }
        </style>

        <!-- Title -->
        <h1 class="title"
            style="
            background: linear-gradient(45deg, #ff1493, #c71585);
            display: inline-block;
            padding: 16px 28px;
            border-radius: 12px;
            -webkit-background-clip: initial;
            -webkit-text-fill-color: initial;
            background-clip: initial;
            font-size: 2rem;
            line-height: 1.2;
            word-break: break-word;
            ">
            ডিজিটাল দক্ষতা উন্নয়ন ওয়ার্কশপ
        </h1>

        <!-- Subtitle -->
        <p class="subtitle"
            style="
            font-size: 1rem;
            margin-bottom: 2rem;
            line-height: 1.3;
            font-weight: 600;
            color: black;
            word-break: break-word;
            ">
            নারী উদ্যোক্তার উদ্যোগে এআই
        </p>

        <style>
            @media (max-width: 768px) {
                .title {
                    font-size: 1.2rem !important;
                    padding: 10px 12px !important;
                }

                .subtitle {
                    font-size: 0.95rem !important;
                }
            }

            @media (max-width: 480px) {
                .title {
                    font-size: 1rem !important;
                    padding: 8px 6px !important;
                }

                .subtitle {
                    font-size: 0.9rem !important;
                }
            }
        </style>

        <!-- Content Grid -->
        <div class="content-grid">
            @if (session('registered'))
                <!-- WhatsApp Group Join Button -->
                <div class="content-card" style="grid-column: 1 / -1;">
                    <p>✅ আপনার রেজিস্ট্রেশন সম্পন্ন হয়েছে</p>
                    <h3>অংশগ্রহণ নিশ্চিত করতে হোয়াটসঅ্যাপ গ্রুপে যোগ দিন </h3>
                    <a href="https://chat.whatsapp.com/HK4ExvJlazbJP8ixr2gsO3" target="_blank" class="register-btn"
                        style="margin-top: 1.5rem;">
                        গ্রুপে যোগ দিন
                    </a>
                    <br/> 
                    <a href="{{ url('/') }}" style="display: inline-block; margin-top: 1.5rem; color: #ff1493; text-decoration: underline; font-weight: 600;">
                        ← মূল পাতায় ফিরে যান
                    </a>
                </div>
            @else
                <!-- Registration Form -->
                <form method="POST" action="{{ route('draft.register') }}" style="grid-column: 1 / -1;">
                    @csrf
                    <div class="content-card">
                        <h3>অংশগ্রহণ নিশ্চিত করুন</h3>
                        <p style="margin-bottom: 1.5rem;">শুধু মোবাইল নম্বর দিতে হবে</p>

                        <!-- Phone Number Field -->
                        <div style="margin-bottom: 1.5rem;">
                            <input type="tel" name="phone_number" placeholder=" আপনার মোবাইল নম্বর লিখুন" required
                                value="{{ old('phone_number') }}"
                                style="width: 100%; padding: 1rem; border-radius: 10px; border: 1px solid #ddd; font-size: 1.1rem; text-align: center;" />
                            @error('phone_number')
                                <div style="color: #ff6b6b; font-size: 0.9rem; margin-top: 0.5rem;">{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="register-btn" style="margin-top: 1rem;">
                            নিশ্চিত করুন
                        </button>
                    </div>
                </form>
            @endif
        </div>

        <!-- Collaboration Section -->
        <div class="collaboration-section">
            <div class="content-grid" style="gap: 2rem; margin-bottom: 0;">
                <!-- সহযোগিতায় -->
                <div>
                    <h4 class="collaboration-title" style="text-align: center;">সহযোগিতায়</h4>
                    <div class="collaboration-logos" style="justify-content: center;">
                        <img src="{{ asset('img/GF_LOGO.png') }}" alt="Gates Foundation Logo"
                            class="collab-logo"
                            style="height: 70px; max-width: auto; width: 100%; object-fit: contain;" />
                    </div>
                </div>
                <!-- সহযোগিতায় (লার্নিং পার্টনার) -->
                <div>
                    <h4 class="collaboration-title" style="text-align: center;">লার্নিং পার্টনার</h4>
                    <div class="collaboration-logos" style="justify-content: center;">
                        <img src="{{ asset('img/bdosn_logo.jpg') }}" alt="BdOSN Logo"
                            class="collab-logo"
                            style="height: 70px; max-width: auto; width: 100%; object-fit: contain;"
                            id="bdosn-logo" />
                        <style>
                            @media (max-width: 768px) {
                                #bdosn-logo {
                                    width: 60% !important;
                                    max-width: 60% !important;
                                    height: auto !important;
                                }
                            }
                        </style>
                    </div>
                </div>
            </div>
        </div>
        <style>
            @media (max-width: 768px) {
                .collaboration-section .content-grid {
                    grid-template-columns: 1fr !important;
                    gap: 1.2rem !important;
                }
            }
        </style>
        <style>
            @media (max-width: 768px) {
            .collaboration-section {
                padding: 1.2rem !important;
            }
            .collaboration-logos {
                flex-direction: column !important;
                gap: 1rem !important;
            }
            .collab-logo {
                max-width: 90vw !important;
                height: auto !important;
            }
            }
            @media (max-width: 480px) {
            .collab-logo {
                max-width: 80vw !important;
                height: auto !important;
            }
            }
        </style>

        <a href="{{ route('workshop.admin.registrations') }}" class="admin-link" style="color: black;">Admin
        </a>
    </div>




</body>

</html>
