<div id="contentR">
<?php echo $content['register']; ?>
<form class="FormR" method="post" action="/register/" novalidate>
  <p><i>Пожалуйста, заполните форму регистрации пользователей. Обязательные поля помечены </i><em>*</em></p>
  <fieldset>
    <legend>Контактная информация</legend>
    <label for="login">Логин <em>*</em></label>
	<input name="login" id="login" placeholder="Login" autofocus required pattern="\S+[A-Za-z]"><br>    
    <label for="pass">Пароль <em>*</em></label>
	<input name="pass" id="pass" type="password" placeholder="q12ZxFFerT" required><br>    
    <label for="pass2">Повторите пароль <em>*</em></label>
	<input name="pass2" id="pass2" type="password" placeholder="q12ZxFFerT" required><br>    
    <label for="fname">Фамилия <em>*</em></label>
	<input name="fname" id="fname" placeholder="Иванов" required pattern="\S+[А-Яа-я]"><br>    
	<label for="lname">Имя <em>*</em></label>
	<input name="lname" id="lname" placeholder="Иван" required pattern="\S+[А-Яа-я]"><br>
	<label for="oname">Отчество <em>*</em></label>
	<input name="oname" id="oname" placeholder="Сидорович" required pattern="\S+[А-яа-я]"><br>
	<label for="tel">Телефон <em>*</em></label>
	<input name="tel" id="tel" placeholder="+7-905-555-55-55" required><br>
	<label for="email">E-mail <em>*</em></label>
	<input name="email" id="email" placeholder="mail@mail.ru" required pattern="\S+[a-z]+@+[a-z]+.+[a-z]"><br>
  </fieldset>
  <fieldset>
    <legend>Персональная информация</legend>
      <label for="age">Возраст<em>*</em></label> 
      <input name="age" id="age" type="number" required min="14" max="100"><br>
      <label for="gender">Пол</label>
      <select name="gender" id="gender">
        <option value="female">Мужской</option>
        <option value="male">Женский</option>
      </select><br>
      <label for="comments">Перечислите дополнительную информацию, которую вы хотели бы сообщить о себе</label>
      <textarea name="comments" id="comments"></textarea>
  </fieldset>

  <fieldset>
    <legend>Выберите ваши увлечения</legend>
    <label for="sport">
    <input name="sport" id="sport" type="checkbox"> Спорт</label>
    <label for="turist">
    <input name="turist" id="turist" type="checkbox"> Туризм</label>
    <label for="padi">
    <input name="padi" id="padi" type="checkbox"> Дайвинг</label>
    <label for="travels">
    <input name="travels" id="travels" type="checkbox"> Путешествия</label>
    <label for="auto">
    <input name="auto" id="auto" type="checkbox"> Автомобили</label>
    <label for="it">
    <input name="it" id="it" type="checkbox"> IT</label>
    
  </fieldset>
  <p><input name="registerSubmit" type="submit" value="Отправить информацию"></p>
</form>
</div>
