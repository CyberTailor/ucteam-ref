<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Генератор рефератов</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .centered {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
        }
        footer {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
        }
    </style>
    <meta property="vk:app_id" content="3939277">
    <script src="//vk.com/js/api/openapi.js?105"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <div class="centered" style="width: 280px; height: 200px; line-height: 1.8">
        <form action="compile.php" method="POST">
            <fieldset style="padding: 20px">
                Реферативный обзор
                <br>
                <select name="what">
                    <option value="gk">Гражданского</option>
                    <option value="nk">Налогового</option>
                </select> кодекса РФ
                <br>
                <select name="sex">
                    <option value="f">учащейся</option>
                    <option value="m" selected>учащегося</option>
                </select>
                <input name="group" type="text" style="width: 30px" maxlength="4" value="11 З"> класса
                <br>
                <input name="name" type="text" style="width: 210px" placeholder="Путимцева Ивана Дмитриевича">
                <br>
                <button type="submit" style="width: 80px; height: 30px">Создать</button>
            </fieldset>
        </form>
        <div style="padding-left: 25px; padding-top: 20px"><span id="vk_like"></span><script>VK.Widgets.Like('vk_like', { width: 250 }, 3000);</script></div>
    </div>
    <footer style="text-align: center; padding-top: 20px; padding-bottom: 20px">
        <a href="mailto:mail@ucteam.ru?Subject=Генератор рефератов"><i class="fa fa-envelope-o fa-lg" style="color:#000"></i></a>
        &nbsp;<a href="https://github.com/slava-sh/ucteam-ref"><i class="fa fa-github fa-lg" style="color:#000"></i></a>
    </footer>
    <!-- Yandex.Metrika counter --><script type="text/javascript">var yaParams = { page: 'ref' };</script><script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter22576558 = new Ya.Metrika({id:22576558, clickmap:true, accurateTrackBounce:true,params:window.yaParams||{ }}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/22576558" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
</body>
</html>
