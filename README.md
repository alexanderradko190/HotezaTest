<h1>Phone Formatter</h1>
<p>
Реализовал форматирование номеров телефонов к формату Е164 на фреймворке Yii2.</p> 
<p> 
Для удобства проверки сделал форму, инпут для подгрузки файла и страницу с результатами 
валидации. Разделил логику на модель, контроллер и класс PhoneNormalizer.
</p>
<p>
В контроллере в цикле while происходит построчное чтение .csv - файла с номерами. На каждой итерации вызывается класс PhoneNormalizer.php, 
происходит парсинг каждого номера и проверяется на соответствие региону. Если данный номер не соответствует никакому региону, 
то возвращается результат без преобразования. Если соответствует, то номер телефона приводится к формату Е164. Контроллер возвращает данные в 
формате json на случай, если будем передавать эти данные через API.
</p>
<p>
Предусмотрел параметр is_formatted для отслеживания номеров, которые не были приведены к формату Е164.
</p>

