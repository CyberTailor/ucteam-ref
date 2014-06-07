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
        Пишите: <a href="mailto:mail@ucteam.ru">mail@ucteam.ru</a>
    </footer>
</body>
</html>
