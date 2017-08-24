				<!-- main -->
				<div class="main">
					    <form action="/feedback/" method="post">
        				Текст сообщения <input type="text" name="MyText" value="" />
        				<input type="submit" name="MySubmit" value="Отправить"/>
        				<input type="submit" name="MySubmitDelete" value="Удалить все записи"/>
    					</form>
                        <?php echo $content['response'];?>
                        <?php //echo $content['feedbackfeed'];?>
             			<?php   
             			        
                        	foreach ($content['feedbackfeed'] as $i => $value)
							{
							echo
							"
								<div id=\"news\">
								<p>Отзыв №$i <br>" . $content['feedbackfeed'][$i]['feedback_body'] . "<br> 
								Пользователь: ". $content['feedbackfeed'][$i]['feedback_user'] ." </p>
								<a href=\"/feedback/?del_feedback=". $content['feedbackfeed'][$i]['id_feedback'] ."\">Удалить</a>
								</div>
								";
							}
						?>
				</div>
				<!-- end of main -->
