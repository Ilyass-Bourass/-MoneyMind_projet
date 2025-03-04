<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suggestions IA - MoneyMind</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .ai-container {
            max-width: 900px;
            margin: 2rem auto;
            padding: 2rem;
            background: linear-gradient(145deg, #ffffff 0%, #f8faff 100%);
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }

        .ai-header {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid #e5e7eb;
        }

        .ai-icon {
            font-size: 2.5rem;
            margin-right: 1rem;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        .ai-title {
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(to right, #4f46e5, #7c3aed);
            -webkit-background-clip: text;
            color: transparent;
        }

        .ai-content {
            background: #ffffff;
            padding: 2rem;
            border-radius: 15px;
            border: 1px solid #e5e7eb;
            margin-bottom: 1.5rem;
        }

        .ai-message {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #374151;
        }

        .advice-section {
            margin: 1rem 0;
            padding: 1rem;
            border-left: 4px solid #4f46e5;
            background: #f5f7ff;
            border-radius: 0 10px 10px 0;
        }

        .highlight {
            background: #fef3c7;
            padding: 1rem 1.5rem;
            border-radius: 10px;
            margin: 1rem 0;
            border-left: 4px solid #d97706;
            font-weight: 500;
        }

        .ai-footer {
            background: #f8faff;
            padding: 1.5rem;
            border-radius: 12px;
            font-size: 0.95rem;
            color: #6b7280;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .ai-footer i {
            font-size: 1.5rem;
            color: #4f46e5;
        }

        @media (max-width: 640px) {
            .ai-container {
                margin: 1rem;
                padding: 1rem;
            }
        }
    </style>
</head>
<body style="background-color: #f3f4f6; margin: 0; font-family: 'Inter', sans-serif;">
    <div class="flex min-h-screen">
        <!-- Navbar -->
        <x-user-navbar />

        <!-- Contenu Principal -->
        <main class="flex-1 ml-72 p-6">
            <div class="ai-container">
                <div class="ai-header">
                    <div class="ai-icon">🤖</div>
                    <h1 class="ai-title">Analyse et Conseils Personnalisés</h1>
                </div>

                <div class="ai-content">
                    <div class="ai-message">
                        @if(isset($advice))
                            @php
                                $adviceParts = explode("\n", $advice);
                            @endphp

                            @foreach($adviceParts as $part)
                                @if(trim($part) !== '')
                                    <div class="advice-section">
                                        {!! nl2br(e($part)) !!}
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <div class="highlight">
                                <i class="fas fa-info-circle mr-2"></i>
                                Aucune suggestion disponible pour le moment. Veuillez ajouter des dépenses pour obtenir une analyse personnalisée.
                            </div>
                        @endif
                    </div>
                </div>

                <div class="ai-footer">
                    <i class="fas fa-robot"></i>
                    <p>Ces suggestions sont générées par notre intelligence artificielle pour vous aider à optimiser votre gestion financière. Les recommandations sont basées sur l'analyse de vos habitudes de dépenses.</p>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('.ai-container');
            container.style.opacity = '0';
            container.style.transform = 'translateY(20px)';
            container.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
            
            setTimeout(() => {
                container.style.opacity = '1';
                container.style.transform = 'translateY(0)';
            }, 100);

            // Animation pour les sections de conseil
            const sections = document.querySelectorAll('.advice-section');
            sections.forEach((section, index) => {
                section.style.opacity = '0';
                section.style.transform = 'translateX(-20px)';
                section.style.transition = 'all 0.4s ease';
                
                setTimeout(() => {
                    section.style.opacity = '1';
                    section.style.transform = 'translateX(0)';
                }, 200 + (index * 100));
            });
        });
    </script>
</body>
</html>