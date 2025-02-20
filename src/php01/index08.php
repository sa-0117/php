<?php

$people = [
    ["Taro", 25, "men"],
    ["Jiro", 20, "men"],
    ["Hanako", 16, "woman"],
];

foreach ($people as $person) {
    echo $person[0]. "(". $person[1]. "歳". $person[2]. ")". "<br />";
}

//「$people」配列に「"Taro", 25, "men"」「"Jiro", 20, "men"」「"Hanako", 16, "woman"」を代入
//foreachでループ開始
//1回目：foreach文冒頭で「$people」から「"Taro", 25, "men"」を取り出し「$person」に代入
//echo $person[0]. "(". $person[1]. "歳". $person[2]. ")". "<br />";で「Taro(25歳men)」を出力、改行する。
//2回目：1回目：foreach文冒頭で「$people」から「"Jiro", 20, "men"」を取り出し「$person」に代入
//echo $person[0]. "(". $person[1]. "歳". $person[2]. ")". "<br />";で「Jiro(20歳men)」を出力、改行する。
//3回目：上記と同様に行って終了。