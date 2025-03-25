<?php
if (isset($_POST['submit'])) {
    $skills = $_POST['skills'] ?? [];

    if (!empty($skills)) {
        foreach ($skills as $key => $value) {
            $skills[$key] = htmlspecialchars($value);
        }
    } else {
        $skills = '';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Select Skills</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/styles.css">

    <style>
        .chosen-container .chosen-drop {
            background-color: #3b2a5c;
            border: 2px solid #8a4dbe;
            border-radius: 0 0 8px 8px;
        }

        .chosen-container .chosen-results {
            color: white;
        }
    </style>
</head>

<body class="bg-gradient-to-b from-black via-gray-900 to-purple-800 text-white">
    <header class="bg-gradient-to-r from-pink-600 via-purple-500 to-indigo-600 text-white p-6">
        <div class="container mx-auto flex justify-between gap-6 items-center">
            <a href="index.html">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                </svg>
            </a>

            <nav>
                <ul class="flex space-x-6 flex-wrap menu">
                    <li><a href="index.html" class="hover:text-gray-300 p-2 block">Validation</a></li>
                    <li><a href="masonry.html" class="hover:text-gray-300 p-2 block">Masonry</a></li>
                    <li><a href="multi.php" class="hover:text-gray-300 p-2 block">Multi-Select</a></li>
                    <li><a href="slider.html" class="hover:text-gray-300 p-2 block">Slider</a></li>
                    <li><a href="flot.php" class="hover:text-gray-300 p-2 block">Flot Chart</a></li>
                    <li><a href="custom.html" class="hover:text-gray-300 p-2 block">Custom Mini Game</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container mx-auto min-h-[60vh]">
        <section class="p-8 text-center container mx-auto mt-12 mb-6">
            <h1 class="text-4xl font-bold mb-6 text-indigo-300">Join the Guild of Media Artisans</h1>
            <p class="mb-2 text-lg">To fully gain entry to one of the most prestigious guilds in the realm, you must demonstrate your skills in the magical arts of media creation. Choose your skills wisely, for they will shape your future within our guild.</p>
            <p class="text-lg">Select the media skills you possess from below to let us know how you can contribute to our guild!</p>
        </section>

        <div class="p-6">
            <form id="skills-form" method="POST" class="bg-white p-6 rounded-md text-black">
                <label for="skills" class="block text-xl font-medium mb-2">Select Your Skills</label>

                <select name="skills[]" id="skills" multiple="multiple" class="w-full p-2 border rounded-md">
                    <option value="HTML">HTML</option>
                    <option value="CSS">CSS</option>
                    <option value="JavaScript">JavaScript</option>
                    <option value="PHP">PHP</option>
                    <option value="MySQL">MySQL</option>
                    <option value="Python">Python</option>
                    <option value="Photoshop">Photoshop</option>
                    <option value="Illustrator">Illustrator</option>
                    <option value="Web Design">Web Design</option>
                    <option value="UX/UI Design">UI/UX Design</option>
                </select>

                <input type="submit" value="Submit" name="submit" class="button-64 mt-4 w-full py-2">
            </form>

            <?php if (isset($skills)): ?>
                <div class="mt-6 border p-6 rounded-md">
                    <h2 class="text-xl font-semibold">Selected Skills</h2>
                    <?php if ($skills): ?>
                        <ul class="list-disc pl-6 mt-4">
                            <?php foreach ($skills as $skill): ?>
                                <li><?= htmlspecialchars($skill) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p>No skills selected.</p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <footer class="bg-gray-900 text-white p-6 mt-8">
        <div class="container mx-auto text-center space-y-6">
            <section>
                <h2 class="text-3xl font-bold text-indigo-300 mb-2">AetherRealm</h2>
                <small class="text-gray-400">A community for Final Fantasy XIV adventurers, lore enthusiasts, and heroes of Eorzea.</small>
            </section>

            <hr class="md:w-8/12 mx-auto">

            <p class="text-indigo-200 text-sm">This site is an academic project, not affiliated with Square Enix.</p>
            <p class="text-sm text-gray-400 flex items-center gap-1 justify-center">Created with
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                </svg>
                by Sydney Kampjes
            </p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>

    <script>
        $("#skills").chosen({
            width: "100%"
        });
    </script>
</body>
</html>