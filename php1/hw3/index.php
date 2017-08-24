<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.01.2017
 * Time: 9:54
 */
//●	С помощью цикла while выведите все числа в промежутке от 0 до 100,
// которые делятся на 3 без остатка.

echo 'Часть №1:<br><br>';

$i=0;
while ($i<100){

    if ($i%3 == 0 && $i) echo $i . '<br>';
    $i++;

}

//●	С помощью цикла do…while напишите функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
//0 – это ноль
//1 – нечетное число
//2 – четное число
//3 – нечетное число
//…
//10 – четное число

echo '<br><br>Часть №2:<br><br>';

$i=0;

do {

    if (!$i){
        echo "$i - это ноль<br>";
    } elseif (!($i%2)){
        echo "$i - это четное<br>";
    } else {
        echo "$i - это нечетное<br>";
    }

    $i++;

} while ($i<=10);

//●	Объявите массив, где в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями городов из соответствующей области.
//Выведите в цикле значения массива, чтобы результат был таким:
//Московская область:
//Москва, Зеленоград, Клин
//Ленинградская область:
//Санкт-Петербург, Всеволожск, Павловск, Кронштадт
//Рязанская область
//…
//(названия городов можно найти на maps.yandex.ru)


echo '<br><br>Часть №3:<br><br>';

$regions = [];

$regions['Московская область'] = [
    'Москва',
    'Зеленоград',
    'Клин'
];

$regions['Ленинградская область'] = [
    'Санкт-Петербург',
    'Всеволожск',
    'Павловск',
    'Кронштадт'
];

$regions['Рязанская область'] = [
    'Ермишь',
    'Захарово',
    'Кадом',
    'Касимов',
    'Спас-Клепики'
];

foreach ($regions as $key => $region){

    echo $key . ':<br>';
    foreach ($region as $index => $city) {

        echo "$city";

        if ($index == count($region)-1) {
            echo '<br>';
        } else {
            echo ', ';
        }
    }
}


//●	Объявите массив, индексами которого являются буквы русского языка, а значениями –
// соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …,
// ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
//Напишите функцию транслитерации строк.

function translit_string($string){

    $latins_symbols = [
        'а'=> 'a',
        'б' => 'b',
        'в' => 'v',
        'г' => 'g',
        'д' => 'd',
        'е' => 'e',
        'ё' => 'e',
        'ж' => 'zh',
        'з' => 'z',
        'и' => 'i',
        'й' => 'y',
        'к' => 'k',
        'л' => 'l',
        'м' => 'm',
        'н' => 'n',
        'о' => 'o',
        'п' => 'p',
        'р' => 'r',
        'с' => 's',
        'т' => 't',
        'у' => 'u',
        'ф' => 'f',
        'х' => 'kh',
        'ц' => 'ts',
        'ч' => 'ch',
        'ш' => 'sh',
        'щ' => 'shch',
        'ъ' => '',
        'ы' => 'y',
        'ь' => '',
        'э' => 'e',
        'ю' => 'iu',
        'я' => 'ia'
    ];

    return strtr($string, $latins_symbols);
}
//●	Напишите функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.

echo '<br><br>Часть №3:<br><br>';

echo translit_string('привет мир') . '<br>';

function replace_space($string){

    $array = explode(' ',$string);
    $result = implode('_', $array);

    return $result;
}

echo replace_space('привет мир') . '<br>';

//●	В имеющемся шаблоне сайта замените статичное меню (ul - li) на генерируемое через PHP.
//Необходимо представить пункты меню как элементы массива и вывести их циклом.
// Подумайте, как можно реализовать меню с вложенными подменю? Попробуйте его реализовать.
$categories = [];
$categories[] = [
    'title' => 'Home',
    'childs' => [
        [
            'title' => 'Home 01',
            'href'  => '#home01'
        ],
        [
            'title' => 'Home 02',
            'href'  => '#home02'
        ],
        [
            'title' => 'Home 03',
            'href'  => '#home03'
        ],
        [
            'title' => 'Home 04',
            'href'  => '#home04'
        ],
        [
            'title' => 'Home 05',
            'href'  => '#home05'
        ],
        [
            'title' => 'Home 06',
            'href'  => '#home06'
        ],
        [
            'title' => 'Home 07',
            'href'  => '#home07'
        ],
    ],
];

$categories[] = [
    'title' => 'megamenu',
    'childs' => [
        [
            'title' => 'Womens1',
            'childs'  => [
                [
                    'title' => 'Dresses',
                    'href'  => '#'
                ],
                [
                    'title' => 'Jumpsuits',
                    'href'  => '#'
                ],
                [
                    'title' => 'Shirts',
                    'href'  => '#'
                ],
                [
                    'title' => 'Coats',
                    'href'  => '#'
                ],
                [
                    'title' => 'Blazers',
                    'href'  => '#'
                ]
            ]
        ],
        [
            'title' => 'Womens2',
            'childs'  => [
                [
                    'title' => 'Dresses',
                    'href'  => '#'
                ],
                [
                    'title' => 'Jumpsuits',
                    'href'  => '#'
                ],
                [
                    'title' => 'Shirts',
                    'href'  => '#'
                ],
                [
                    'title' => 'Coats',
                    'href'  => '#'
                ],
                [
                    'title' => 'Blazers',
                    'href'  => '#'
                ]
            ]
        ],
        [
            'title' => 'Womens3',
            'childs'  => [
                [
                    'title' => 'Dresses',
                    'href'  => '#'
                ],
                [
                    'title' => 'Jumpsuits',
                    'href'  => '#'
                ],
                [
                    'title' => 'Shirts',
                    'href'  => '#'
                ],
                [
                    'title' => 'Coats',
                    'href'  => '#'
                ],
                [
                    'title' => 'Blazers',
                    'href'  => '#'
                ]
            ]
        ]
    ]
];

$categories[] = [
    'title' => 'Contact',
    'href'  => '#contact'
];


?>
<!--вывод меню-->
<nav>
	<ul>
        <?php foreach ($categories as $category) { ?>
	        <li>
                <?php if ($category['childs']) { ?>
								<h2><?php echo $category['title']?></h2>
								<ul>
                                    <?php foreach ($category['childs'] as $childs) { ?>
									<li>
                                        <?php if ($childs['childs']) { ?>
                                            <h3><?php echo $childs['title']?></h3>
                                            <ul>
                                                <?php foreach ($childs['childs'] as $second_childs) { ?>
                                                    <a href="<?php echo $second_childs['href'];?>"><?php echo $second_childs['title'];?></a>
                                                <?php } ?>
                                            </ul>
                                        <?php } else { ?>
                                            <a href="<?php echo $childs['href'];?>"><?php echo $childs['title'];?></a>
                                        <?php } ?>
                                    </li>
                                    <?php } ?>
								</ul>
                <?php } else { ?>
                    <a href="<?php echo $category['href'];?>"><h2><?php echo $category['title'];?></h2></a>
                <?php } ?>
            </li>
        <?php } ?>
	</ul>
</nav>
<?php

//Продвинутый блок
//●	Выведите с помощью цикла for числа от 0 до 9, НЕ используя тело цикла. То есть выглядеть должно вот так:
//for(…){// здесь пусто}

echo '<br><br>Часть №4:<br><br>';

for ($i=0; $i<10;) echo $i++.'<br>';

//●	Повторите третье задание, но выводите на экран только города, начинающиеся с буквы «К».
echo '<br><br>Часть №5:<br><br>';

$k = 'К';
foreach ($regions as $key => $region){

    echo $key . ':<br>';
    $result = '';
    foreach ($region as $index => $city) {

        if ($city[0] == $k[0] && $city[1] == $k[1]) {

            $result .= $city . ', ';
        }
    }

    echo  trim($result, ', ') . '<br>';
}

//●	Объедините две ранее написанные функции в одну,
// которая получает строку на русском языке, производит транслитерацию и замену пробелов
// на подчеркивания (аналогичная задача решается при конструировании url-адресов на основе
// названия статьи в блогах).

echo '<br><br>Часть №6:<br><br>';

function gen_url($string){

    $latins_symbols = [
        'а'=> 'a',
        'б' => 'b',
        'в' => 'v',
        'г' => 'g',
        'д' => 'd',
        'е' => 'e',
        'ё' => 'e',
        'ж' => 'zh',
        'з' => 'z',
        'и' => 'i',
        'й' => 'y',
        'к' => 'k',
        'л' => 'l',
        'м' => 'm',
        'н' => 'n',
        'о' => 'o',
        'п' => 'p',
        'р' => 'r',
        'с' => 's',
        'т' => 't',
        'у' => 'u',
        'ф' => 'f',
        'х' => 'kh',
        'ц' => 'ts',
        'ч' => 'ch',
        'ш' => 'sh',
        'щ' => 'shch',
        'ъ' => '',
        'ы' => 'y',
        'ь' => '',
        'э' => 'e',
        'ю' => 'iu',
        'я' => 'ia',
        ' ' => '_'
    ];

    return strtr($string, $latins_symbols);
}

echo gen_url('привет мир') . '<br>';