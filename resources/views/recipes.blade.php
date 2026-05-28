<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>Recipe Collection</title>
</head>
<body class="bg-slate-50 min-h-screen py-16 px-4">
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-16">
            <h1 class="text-5xl font-extrabold text-emerald-900 mb-4">Chef's Selection</h1>
            <p class="text-emerald-600 text-lg">Fresh recipes for every occasion</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            @forelse($recipes as $recipe)
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-emerald-100 hover:shadow-xl hover:border-emerald-300 transition-all duration-300">
                    <div class="w-14 h-14 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center mb-6 text-xl font-bold">
                        {{ substr($recipe['recipe_name'] ?? 'R', 0, 1) }}
                    </div>
                    <h2 class="text-xl font-bold text-slate-800 mb-4">{{ $recipe['recipe_name'] }}</h2>
                    <a href="/recipes/{{ $recipe['id'] }}" class="inline-flex items-center text-emerald-600 font-semibold hover:text-emerald-800">
                        View Recipe <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            @empty
                <div class="col-span-full text-center text-slate-400">No recipes available.</div>
            @endforelse
        </div>
    </div>
</body>
</html>