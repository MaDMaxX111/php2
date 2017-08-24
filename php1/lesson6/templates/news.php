				<!-- main -->
				<div class="main">
				<h1> Блок вывода новостей!!!</h1>
                    
                    <?php
					foreach($content['news'] as $news)
					{
						echo
						'
						<div class="News" >
                    	<a href="/newspage/?id_news=' . $news['id_news'] . '"><p> Новость №' . $news['id_news'] .'</p>
						<p>'. $news['news_title'] .'</p>
						<p>'. $news['news_preview'] .'</p>
						</a>
                    	</div>
						';
					}
					?>
					
				</div>
				<!-- end of main -->
				