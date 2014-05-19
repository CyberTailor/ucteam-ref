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
                11
                <select name="group">
                    <option value="А">А</option>
                    <option value="Б">Б</option>
                    <option value="В">В</option>
                    <option value="Г">Г</option>
                    <option value="Е">Е</option>
                    <option value="З" selected>З</option>
                    <option value="И">И</option>
                    <option value="К">К</option>
                    <option value="Л">Л</option>
                    <option value="М">М</option>
                </select> класса
                <input type="text" name="name" style="width: 100%" placeholder="Путимцева Ивана Дмитриевича">
                <br>
                <button type="submit" class="btn btn-default">Создать</button>
            </fieldset>
        </form>
    </div>
    <footer style="text-align: center; padding-top: 20px; padding-bottom: 20px">
        Пишите: <a href="mailto:mail@ucteam.ru?Subject=Генератор рефератов">mail@ucteam.ru</a>
    </footer>
    <!-- Yandex.Metrika counter --><script type="text/javascript">var yaParams = { page: 'ref' };</script><script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter22576558 = new Ya.Metrika({id:22576558, clickmap:true, accurateTrackBounce:true,params:window.yaParams||{ }}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/22576558" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
</body>
</html>
