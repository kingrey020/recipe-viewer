<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- 1. THIS CONFIG IS REQUIRED TO MAKE LIGHT/DARK TOGGLE WORK -->
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>{{ $recipe['recipe_name'] }}</title>
    
    <script>
        // 2. Apply theme immediately to prevent flashing
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>
<body class="bg-slate-50 dark:bg-slate-950 transition-colors duration-500 min-h-screen py-16 px-4">

    <!-- FLOATING DARK MODE TOGGLE -->
    <button id="theme-toggle" class="fixed bottom-6 right-6 z-50 p-4 bg-emerald-600 dark:bg-emerald-500 text-white rounded-full shadow-2xl hover:scale-110 active:scale-95 transition-all focus:outline-none ring-4 ring-white dark:ring-slate-900">
        <i id="theme-toggle-dark-icon" class="hidden fas fa-moon text-xl"></i>
        <i id="theme-toggle-light-icon" class="hidden fas fa-sun text-xl"></i>
    </button>

    <div class="max-w-3xl mx-auto">
        <!-- Back Button -->
        <a href="/recipes" class="text-emerald-700 dark:text-emerald-400 font-semibold hover:text-emerald-900 dark:hover:text-emerald-300 mb-8 inline-block transition-colors">
            <i class="fas fa-long-arrow-alt-left mr-2"></i> Back to Catalog
        </a>

        <!-- Recipe Detail Card -->
        <div class="bg-white dark:bg-slate-900 rounded-[2rem] overflow-hidden shadow-sm border border-slate-100 dark:border-slate-800 transition-colors">
            
            <!-- Large Feature Image -->
            @if(!empty($recipe['photo_url']))
                <div class="w-full h-80 bg-slate-200 dark:bg-slate-800">
                    <img src="{{ $recipe['photo_url'] }}" 
                         alt="{{ $recipe['recipe_name'] }}" 
                         class="w-full h-full object-cover dark:opacity-80 transition-opacity">
                </div>
            @endif

            <div class="p-10">
                <h1 class="text-4xl font-extrabold text-slate-900 dark:text-white mb-8 transition-colors">{{ $recipe['recipe_name'] }}</h1>
                
                <div class="grid gap-8">
                    <!-- Ingredients Box -->
                    <div class="bg-emerald-50 dark:bg-emerald-900/20 p-6 rounded-2xl border border-emerald-100 dark:border-emerald-900/30 transition-colors">
                        <h3 class="text-emerald-900 dark:text-emerald-400 font-bold mb-3 flex items-center uppercase tracking-wider text-sm">
                            <i class="fas fa-leaf mr-2"></i> Ingredients
                        </h3>
                        <!-- preserve line breaks from DB -->
                        <p class="text-emerald-800 dark:text-emerald-200/80 whitespace-pre-line leading-relaxed">{{ $recipe['ingredients'] }}</p>
                    </div>

                    <!-- Procedure Section -->
                    <div>
                        <h3 class="text-slate-900 dark:text-slate-200 font-bold mb-4 uppercase tracking-wider text-sm transition-colors">
                            <i class="fas fa-tasks mr-2 text-emerald-500"></i> Preparation
                        </h3>
                        <p class="text-slate-600 dark:text-slate-400 leading-relaxed whitespace-pre-line transition-colors">{{ $recipe['procedure'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DARK MODE LOGIC -->
    <script>
        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
        const themeToggleBtn = document.getElementById('theme-toggle');

        // Set correct icon on load
        if (document.documentElement.classList.contains('dark')) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        themeToggleBtn.addEventListener('click', function() {
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
        });
    </script>
</body>
</html>
