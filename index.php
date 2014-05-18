<!DOCTYPE html>
<html>
<body>
    <form action="compile.php" method="POST">
        Генерируем реферативный обзор
        <select name="what">
            <option value="gk">Гражданского</option>
            <option value="nk">Налогового</option>
        </select> кодекса РФ
        <br>
        <select name="sex">
            <option value="f">учащейся</option>
            <option value="m">учащегося</option>
        </select>
        11
        <select name="group">
            <option value="А">А</option>
            <option value="Б">Б</option>
            <option value="В">В</option>
            <option value="Г">Г</option>
        </select> класса
        <input type="text" name="name" size="30" value="Артушары">
        <input type="submit" value="Отправить">
    </form>
</body>
</html>
