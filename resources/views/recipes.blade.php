<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- ADD THIS CONFIGURATION BLOCK HERE -->
    <script>
        tailwind.config = {
            darkMode: 'class', // This is the magic line that makes the toggle work
        }
    </script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>Recipe Collection</title>
    
    <script>
        // Check for saved preference OR system preference on initial load
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>
<body class="bg-slate-50 dark:bg-slate-950 min-h-screen py-16 px-4 transition-colors duration-500">
    
    <!-- Floating Toggle Button -->
    <button id="theme-toggle" class="fixed bottom-6 right-6 z-50 p-4 bg-emerald-600 dark:bg-emerald-500 text-white rounded-full shadow-2xl hover:scale-110 active:scale-95 transition-all focus:outline-none ring-4 ring-white dark:ring-slate-900">
        <i id="theme-toggle-dark-icon" class="hidden fas fa-moon text-xl"></i>
        <i id="theme-toggle-light-icon" class="hidden fas fa-sun text-xl"></i>
    </button>

    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-16">
            <h1 class="text-5xl font-extrabold text-emerald-900 dark:text-emerald-400 mb-4 transition-colors">Chef's Selection</h1>
            <p class="text-emerald-600 dark:text-emerald-500 text-lg transition-colors">Fresh recipes for every occasion</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            @forelse($recipes as $recipe)
                <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 shadow-sm border border-emerald-100 dark:border-slate-800 hover:shadow-xl hover:border-emerald-300 dark:hover:border-emerald-600 transition-all duration-300 flex flex-col">
                    
                    <!-- Image Section -->
                    <div class="w-full h-48 mb-6 overflow-hidden rounded-2xl bg-emerald-100 dark:bg-slate-800 flex items-center justify-center">
                        @if(!empty($recipe['photo_url']))
                            <img src="{{ $recipe['photo_url'] }}" 
                                 alt="{{ $recipe['recipe_name'] }}" 
                                 class="w-full h-full object-cover shadow-inner dark:opacity-80 transition-opacity">
                        @else
                            <span class="text-emerald-600 dark:text-emerald-400 text-3xl font-bold">
                                {{ substr($recipe['recipe_name'] ?? 'R', 0, 1) }}
                            </span>
                        @endif
                    </div>

                    <h2 class="text-xl font-bold text-slate-800 dark:text-white mb-4 transition-colors">{{ $recipe['recipe_name'] }}</h2>
                    
                    <div class="mt-auto">
                        <a href="/recipes/{{ $recipe['id'] }}" class="inline-flex items-center text-emerald-600 dark:text-emerald-400 font-semibold hover:text-emerald-800 dark:hover:text-emerald-200 transition-colors">
                            View Recipe <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-slate-400 dark:text-slate-500">No recipes available.</div>
            @endforelse
        </div>
    </div>

    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
        var themeToggleBtn = document.getElementById('theme-toggle');

        // Change the icons based on current state
        if (document.documentElement.classList.contains('dark')) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        themeToggleBtn.addEventListener('click', function() {
            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }

            // if NOT set via local storage previously
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
        });
    </script>
</body>
</html>
