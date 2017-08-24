				
				<!-- main -->
				<div class="main">
<?php //echo $content['id_news'];?>
<?php //echo $content['news_content'];
echo "<pre>";
//print_r($content);
echo "</pre>";
?>
<h1>Редактирование новостей</h1>
		<form action="/news/?id_news=<?php echo $content['id_news'];?>" method="post">
        <h3>Редактирование заголовка новости</h3>
        	<textarea name="editor_title" id="editor_title" rows="10" cols="80"><?php echo $content['news_title'];?></textarea>
            <script>
                CKEDITOR.replace('editor_title');
            </script>
            
                            <br>
        <h3>Редактирование аннотации новости</h3>
            <textarea name="editor_preview" id="editor_preview" rows="10" cols="80"><?php echo $content['news_preview'];?></textarea>
            <script>
                CKEDITOR.replace('editor_preview');
            </script>
        <br>

        <h3>Редактирование контента новости</h3>
            <textarea name="editor1" id="editor1" rows="10" cols="80"><?php echo $content['news_content'];?></textarea>
            <script>
                CKEDITOR.replace('editor1');
            </script>
            
             
            <input type="submit" name="SaveContent" value="Сохранить"/>
        </form>					
				</div>
				<!-- end of main -->
