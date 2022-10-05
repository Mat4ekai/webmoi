<?php
class Contact_Index_View extends FacadePage {

    public function SendForm(Facade $facade, $data)
    {
        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])){
            // Переменные с формы
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message= $_POST['message'];

            // Параметры для подключения
            $db_host = "localhost";
            $db_user = "root"; // Логин БД
            $db_password = "MySQL!SuperPass01"; // Пароль БД
            $db_base = 'vpp'; // Имя БД
            $db_table = "form"; // Имя Таблицы БД

            try {
                // Подключение к базе данных
                $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
                // Устанавливаем корректную кодировку
                $db->exec("set names utf8");
                // Собираем данные для запроса
                $data = array( 'name' => $name, 'email' => $email, 'subject' => $subject, 'message' => $message);
                // Подготавливаем SQL-запрос
                $query = $db->prepare("INSERT INTO $db_table (name, email, subject, message) values (:name, :email, :subject, :message)");
                // Выполняем запрос с данными
                $query->execute($data);
                // Запишим в переменую, что запрос отрабтал
                $result = true;
            } catch (PDOException $e) {
                // Если есть ошибка соединения или выполнения запроса, выводим её
                print "Ошибка!: " . $e->getMessage() . "<br/>";
            }

            if ($result) {
                echo "Успех. Информация занесена в базу данных";
            }
        }

    }
}