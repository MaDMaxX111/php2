<?php

//Константы ошибок
define('ERROR_NOT_FOUND', 1);
define('ERROR_TEMPLATE_EMPTY', 2);


//Функция разбивания строки на составляющие. Принимает несколько параметров в качестве разделителя
function multiexplode ($delimiters,$string) {
    
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}



//Функция получает переменные в зависимости от выбранной страницы. news или newspage или feedback
function prepareVariables($page_name){
    $vars = [];
    switch ($page_name){
		
        case "index":
			$vars['content'] = '../templates/index.php';
        
			break;	
			
        case "news":
			if (isset($_POST['editor1']))
			{
				$vars["response"] = EditNewsContent($_GET['id_news']); //Сохранить отредактированную новость
			}
		
			$vars['content'] = '../templates/news.php';
			$vars['news'] = getNews();
	
            break;
			
			
        case "newspage":
			$vars['content'] = '../templates/newspage.php';
			$vars['id_news'] = $_GET['id_news'];
            $content = getNewsContent($vars['id_news']);
			$vars["news_title"] = '<div id="editor">
					<form action="/newsedit/?id_news=' . $vars['id_news'] . '" method="post">
					Здравствуйте пользователь. У вас есть доступ к редактированию материала страниц.
    				<input type="submit" name="EditContent" value="Редактировать"/>
    				</form>	
					</div>';
            $vars["news_title"] .= $content["news_title"];
            $vars["news_content"] = $content["news_content"];

            break;
			
		case "newsedit":
			$vars['content'] = '../templates/newsedit.php';
			$vars['id_news'] = $_GET['id_news'];
            $content = getNewsContent($_GET['id_news']);
			$vars["news_content"] = $content["news_content"];
			$vars["news_preview"] = $content["news_preview"];
			$vars["news_title"] = $content["news_title"];

            break;	
        case "feedback":
			$vars['content'] = '../templates/feedback.php';
			
			if(isset($_POST['MySubmit']))
			{
				$vars['response'] = setFeedback();
			}
			else $vars['response'] = "";
			
			if(isset($_POST['MySubmitDelete']))
			{
				$vars['response'] = delFeedbackAll();
			}
			else $vars['response'] = "";
			
			if(isset($_GET['del_feedback']))
			{
				$vars['response'] = delFeedback();
			}
			else $vars['response'] = "";
			
			$FeedBacks = getFeedbacksFeed();
			
		
			$vars[feedbackfeed] = $FeedBacks;
			


            break;
			
		case "register":
		
			if (isset($_POST['registerSubmit']))
			{
		    $login = $_POST['login'];
		    $pass = $_POST['pass'];
    		$fname = $_POST['fname'];
    		$lname = $_POST['lname'];
    		$oname = $_POST['oname'];
			$tel = $_POST['tel'];
    		$email = $_POST['email'];
    		$age = $_POST['age'];
    		$gender = $_POST['gender'];
    		$comments = $_POST['comments'];
    		$sport = $_POST['sport'];
    		$turism = $_POST['turist'];
    		$diving = $_POST['padi'];
    		$travels = $_POST['travels'];
    		$automobile = $_POST['auto'];
    		$it = $_POST['it'];

			$sql = "INSERT INTO `php1`.`users` (`id_user`, `login`, `pass`, `Fam`, `Ima`, `Otch`, `tel`, `email`, `age`, `sex`, `comment`, `sport`, `turism`, `diving`, `travels`, `automobile`, `it`) VALUES (NULL, '$login', '$pass', '$fname', '$lname', '$oname', '$tel', '$email', '$age', '$gender', '$comments', '$sport', '$turism', '$diving', '$travels', '$automobile', '$it');";
			$response = executeSQL($sql);
			}
			
			if ($response)
			{
				$vars['register'] = "Регистрация прошла успешно!";
				$vars['content'] = '../templates/register_completed.php';
			}
			
			if (!$response && isset($_POST['registerSubmit']))
			{
				$vars['register'] = "Ошибка регистрации";
				$vars['content'] = '../templates/register.php';
			}
			
			if (!isset($_POST['registerSubmit']))
			{
				$vars['content'] = '../templates/register.php';
			}
			
            break;
    }

    return $vars;
}







function EditNews($id_news){
    $response = "";
    $db_link = getConnection();


	$sql = "INSERT INTO feedback (feedback_body, feedback_user) VALUES('$feedback_body', '$feedback_user')";
    $res = executeQuery($sql, $db_link);

    if(!$res)
        $response = "Произошла ошибка!";
    else
        $response = "Отзыв добавлен";

    return $response;
}



function getNews(){
    $sql = "SELECT id_news, news_title, news_preview FROM news";
    $news = getAssocResult($sql);
    return $news;
}

function getNewsContent($id_news){
    $id_news = (int)$id_news;

    $sql = "SELECT * FROM news WHERE id_news = ".$id_news;
    $news = getAssocResult($sql);

    $result = [];
    if(isset($news[0]))
        $result = $news[0];

    return $result;
}


//Функция редактирования новостей
function EditNewsContent($id_news){
    $id_news = (int)$id_news;

    $sql = "update news set news_content = '". $_POST['editor1'] ."', news_title = '". $_POST['editor_title'] ."', news_preview = '". $_POST['editor_preview'] ."' WHERE id_news = ".$id_news; 
	executeQuery($sql);
}

//Функиця добавления новости
function AddNews($id_news){
	
    $feedback_user = mysqli_real_escape_string($db_link, (string)htmlspecialchars(strip_tags($_POST['name'])));
    $feedback_body = mysqli_real_escape_string($db_link, (string)htmlspecialchars(strip_tags($_POST['MyText'])));

	$sql = "INSERT INTO news (feedback_body, feedback_user) VALUES('$feedback_body', '$feedback_user')";
    $res = executeQuery($sql, $db_link);



    return $result;
}


function getFeedbacksFeed(){
    $sql = "SELECT * FROM feedback";
    $feed = getAssocResult($sql);
    return $feed;
}

//Функция добавления новости
function setFeedback(){
    $response = "";
    $db_link = getConnection();

	$_POST['name'] = 'user1';

    $feedback_user = mysqli_real_escape_string($db_link, (string)htmlspecialchars(strip_tags($_POST['name'])));
    $feedback_body = mysqli_real_escape_string($db_link, (string)htmlspecialchars(strip_tags($_POST['MyText'])));

	$sql = "INSERT INTO feedback (feedback_body, feedback_user) VALUES('$feedback_body', '$feedback_user')";
    $res = executeQuery($sql, $db_link);

    if(!$res)
        $response = "Произошла ошибка!";
    else
        $response = "Отзыв добавлен";

    return $response;
}


//Функция выполнения запроса на добавление
function executeSQL($sql){

    return $res = executeQuery($sql);

}

function delFeedback(){
    $db_link = getConnection();

    $feedback_id = mysqli_real_escape_string($db_link, (string)htmlspecialchars(strip_tags($_GET['del_feedback'])));
    $sql = "DELETE FROM `php1`.`feedback` WHERE `feedback`.`id_feedback` = $feedback_id;";
    $res = executeQuery($sql, $db_link);

    if(!$res)
        $response = "Произошла ошибка!";
    else
        $response = "Отзыв Удален";

    return $response;
}

function delFeedbackAll(){
    $db_link = getConnection();

    $sql = "DELETE FROM `php1`.`feedback`";
    $res = executeQuery($sql, $db_link);

    if(!$res)
        $response = "Произошла ошибка!";
    else
        $response = "Все отзывы Удалены";

    return $response;
}