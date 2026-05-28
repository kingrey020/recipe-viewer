<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>{{ $recipe['recipe_name'] }}</title>
</head>
<body class="bg-slate-50 py-16 px-4">
    <div class="max-w-3xl mx-auto">
        <a href="/recipes" class="text-emerald-700 font-semibold hover:text-emerald-900 mb-8 inline-block">
            <i class="fas fa-long-arrow-alt-left mr-2"></i> Back to Catalog
        </a>

        <div class="bg-white rounded-[2rem] p-10 shadow-sm border border-slate-100">
            <h1 class="text-4xl font-extrabold text-slate-900 mb-8">{{ $recipe['recipe_name'] }}</h1>
            
            <div class="grid gap-8">
                <!-- Ingredients -->
                <div class="bg-emerald-50 p-6 rounded-2xl">
                    <h3 class="text-emerald-900 font-bold mb-3 flex items-center uppercase tracking-wider text-sm">
                        <i class="fas fa-leaf mr-2"></i> Ingredients
                    </h3>
                    <p class="text-emerald-800">{{ $recipe['ingredients'] }}</p>
                </div>

                <!-- Procedure -->
                <div>
                    <h3 class="text-slate-900 font-bold mb-4 uppercase tracking-wider text-sm">
                        <i class="fas fa-tasks mr-2 text-emerald-500"></i> Preparation
                    </h3>
                    <p class="text-slate-600 leading-relaxed">{{ $recipe['procedure'] }}</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>