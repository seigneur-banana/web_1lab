<?php session_start(); ?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title>web lab 1</title>
    <style>
        #mainHeading {
            width: 756px;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            color: #ffd35f;
            font-family: "Times New Roman", cursive;
            font-size: 23pt;
        }
        #mainHeading::selection {
            color: white;
            background-color: #114da4;
        }
        #mainHeading span {
            color: #66ff00;
            font-size: 23pt;
        }
        #mainHeading span::selection {
            color: white;
            background-color: #4a98ff;
        }
        table {
            width: 50%;
            margin-top: 40px;
            margin-left: auto;
            margin-right: auto;
            font-family: "Calibri", sans-serif;
            font-size: large;
            border: 1px solid grey;
        }
        table td {
            padding: 5px 15px;
            border: 1px solid grey;
        }
        table th{
            padding-top: 5px;
            padding-bottom: 5px;
            border: 1px solid grey;

        }
        .submitButton {
            font-family: "Times New Roman", sans-serif;
            width: 548px;
            height: 45px;
            padding: 6px 0 4px 10px;
            border: 1px solid #cecece;
            background: #F6F6f6;
            border-radius: 8px;
            font-size: 16pt;
            margin-top: 0.5%;
            cursor: pointer;
        }
        .text input{
            height: 18pt;
            margin-left: 2.7%;
            width: 400px;
            font-size: 14pt;
            font-family: 'Times New Roman', sans-serif;
        }
        .history {
            width: 756px;
            border-collapse: collapse;
            font-size: 14pt;
            margin: 0 auto 12px;
        }
        .history td {
            border: 1px solid rgb(118, 118, 118);
            padding-left: 5px;
            padding-right: 5px;
        }
        .history th {
            border: 1px solid rgb(118, 118, 118);
            padding-left: 5px;
            padding-right: 5px;
        }
        .error {
            background-color: #ffe3e3;
            width: 756px;
            margin-left: auto;
            margin-right: auto;
            font-size: 16pt;
            font-weight: bold;
            border-radius: 3px;
            border: 1px solid darkred;
            text-align: center;
            color: darkred;
            height: 50px;
            padding-top: 20px;
            padding-bottom: 0;
        }
        select {
            width: 435px;
            font-size: 14pt;
            padding: 6px 0 4px 10px;
            border: 1px solid #cecece;
            background: #F6F6f6;
            border-radius: 8px;
            -webkit-appearance: none;/* Chrome */
            -moz-appearance: none;/* Firefox */
            appearance: none;/* убираем дефолнтные стрелочки */
            font-family: inherit;/* наследует от родителя */
            color: #444;
        }
        .text{
            display: inline-block;
        }
        .text input[type=text] {
            margin-left: 5px;
            width: 414px;
            padding: 6px 0 4px 20px;
            border: 1px solid #cecece;
            background: #F6F6f6;
            border-radius: 8px;
        }
        .form_radio_btn {
            display: inline-block;
            margin-right: 10px;
        }
        .form_radio_btn input[type=radio] {
            display: none;
        }
        .form_radio_btn label {
            display: inline-block;
            cursor: pointer;
            padding: 0 15px;
            line-height: 34px;
            border: 1px solid #999;
            border-radius: 6px;
            user-select: none;
        }
        /* Checked */
        .form_radio_btn input[type=radio]:checked + label {
            background: #ffe0a6;
        }

    </style>
</head>
<body>
    <table>
        <tr>
            <th colspan=2 id="mainHeading"><span>Бадмаев Николай Игоревич</span> гр. P3230 вариант: 30004</th>
        </tr>
        <form action="script.php" method="get" name="pointCheckForm">
            <tr>
                <td><b>Изменение Х:</b>
                    <label>
                        <select name="coordinateX">
                            <option value="-2">-2</option>
                            <option value="-1.5">-1,5</option>
                            <option value="-1">-1</option>
                            <option value="-0.5">-0,5</option>
                            <option value="0">0</option>
                            <option value="0.5">0,5</option>
                            <option value="1">1</option>
                            <option value="1.5">1,5</option>
                            <option value="2">2</option>
                        </select>
                    </label>
                </td>
                <td rowspan="4"><img src="img/area.png" title="График" alt="График"/></td>
            </tr>
            <tr>
                <td><b>Изменение Y:</b><div class="text"><label data-validate="Обязательное поле"><input type="text" class="number" name="coordinateY" data-min="-3" data-max="3" data-separator="," autocomplete="off" autofocus></label></div></td>
            </tr>
            <tr>
                <td><b>Изменение R:</b>
                    <div class="form_radio_btn">
                        <input id="radio-1" type="radio" name="radius" value="1" checked>
                        <label for="radio-1">1</label>
                    </div>

                    <div class="form_radio_btn">
                        <input id="radio-2" type="radio" name="radius" value="2">
                        <label for="radio-2">2</label>
                    </div>

                    <div class="form_radio_btn">
                        <input id="radio-3" type="radio" name="radius" value="3">
                        <label for="radio-3">3</label>
                    </div>

                    <div class="form_radio_btn">
                        <input id="radio-4" type="radio" name="radius" value="4">
                        <label for="radio-4">4</label>
                    </div>

                    <div class="form_radio_btn">
                        <input id="radio-5" type="radio" name="radius" value="5">
                        <label for="radio-5">5</label>
                    </div>

                </td>
            </tr>
            <tr>
                <td><button class="submitButton" type="submit">Вычислить</button></td>
            </tr>
        </form>
        <tr>
            <td colspan=2>
                <?php
                if (isset($_SESSION['rows']))
                {
                    echo "<table class='history'>";
                    echo "<thead><tr><th>Значение X</th><th>Значение Y</th><th>Значение R</th><th>Попадание</th><th>Дата и время</th><th>Скорость выполнения</th></tr></thead>";
                    echo "<tbody>";
                    foreach ($_SESSION['rows'] as $row)
                    {
                        echo $row;
                    }
                    echo "</tbody>";
                    echo "</table>";
                }
                else
                {
                    echo "<div class='error'>История запросов пуста</div>";
                }
                ?>
            </td>

        </tr>
    </table>
</body>
</html>

<script>
    function onlyDigits() {
        const separator = this.dataset.separator;
        const replaced = new RegExp('[^\\d\\' + separator + '\\-]', "g");
        const regex = new RegExp('\\' + separator, "g");
        this.value = this.value.replace(replaced, "");

        const minValue = parseFloat(this.dataset.min);
        const maxValue = parseFloat(this.dataset.max);
        const val = parseFloat(separator === "." ? this.value : this.value.replace(new RegExp(separator, "g"), "."));
        if (minValue <= maxValue) {
            if (this.value[0] === "-") {
                if (this.value.length > 8)
                    this.value = this.value.substr(0, 8);
            } else {
                if (this.value.length > 7)
                    this.value = this.value.substr(0, 7);
            }

            if (minValue < 0 && maxValue < 0) {
                if (this.value[0] !== "-")
                    this.value = "-" + this.value[0];
            } else if (minValue >= 0 && maxValue >= 0) {
                if (this.value[0] === "-")
                    this.value = this.value.substr(0, 0);
            }

            if (val < minValue || val > maxValue)
                this.value = this.value.substr(0, 0);

            if (this.value.match(regex))
                if (this.value.match(regex).length > 1)
                    this.value = this.value.substr(0, 0);

            if (this.value.match(/-/g))
                if (this.value.match(/-/g).length > 1)
                    this.value = this.value.substr(0, 0);
        }
    }

    document.querySelector(".number").onkeyup = onlyDigits;
</script>