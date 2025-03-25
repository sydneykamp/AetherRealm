<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flot Chart</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/flot.js"></script>
    <link rel="stylesheet" href="css/flot.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/styles.css">

    <style>
        #placeholder {
            float: left;
            width: 675px;
        }

        #choices {
            float: right;
            width: 135px;
            color: black;
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


    <main>
        <section class="container mx-auto p-8 text-center mt-12 mb-6">
            <h1 class="text-4xl font-bold my-6 text-indigo-300">FFXIV Character Population Chart</h1>
            <p class="text-lg">Visualize the character population for each race in Final Fantasy XIV over the past few years!</p>
        </section>
    
        <div id="content">
            <div class="demo-container">
                <div id="placeholder" class="demo-placeholder"></div>
                <p id="choices" class="text-black"></p>
            </div>
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

    <script type="text/javascript">
        var datasets = { <?php include 'chardata.php' ?> }

        var i = 0;
        $.each(datasets, function(key, val) {
            val.color = i;
            ++i;
        });

        var choiceContainer = $("#choices");
        $.each(datasets, function(key, val) {
            choiceContainer.append("<br/><input type='checkbox' name='" + key + "' checked='checked' id='id" + key + "'></input>" + "<label for='id" + key + "'>" + val.label + "</label>");
        });

        choiceContainer.find("input").click(plotAccordingToChoices);

        function plotAccordingToChoices() {
            var data = [];

            choiceContainer.find("input:checked").each(function() {
                var key = $(this).attr("name");
                if (key && datasets[key]) {
                    data.push(datasets[key]);
                }
            });

            if (data.length > 0) {
                $.plot("#placeholder", data, {
                    yaxis: {
                        min: 0
                    },
                    xaxis: {
                        tickDecimals: 0
                    }
                });
            }
        }

        plotAccordingToChoices();
    </script>
</body>
</html>