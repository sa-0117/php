<?php

require_once('config/occupations.php');
//"職業は、{$occupation}です。"の部分で
//occupations.phpファイルにある配列を使用している
//そのためindex.phpファイルには外部ファイルを読み込むrequire_onceを使用
require_once('config/events.php');

echo "プレイヤー名を入力してください。" .PHP_EOL;
echo ">>";
$name = trim(fgets(STDIN));

while(empty($name)) {
    echo "" .PHP_EOL;
    echo "入力されていません。" .PHP_EOL;
    echo "再度入力してください。" .PHP_EOL;
    echo ">>";
    $name = trim(fgets(STDIN));
}

echo "" .PHP_EOL;
echo "あなたの名前は、{$name}ですね。" .PHP_EOL;
echo "それでは、人生ゲームのスタートです。大富豪を目指して頑張りましょう。" .PHP_EOL;
echo "まず職業を決めましょう。" .PHP_EOL;
echo "Enterを押して職業を決めてください。" .PHP_EOL;
fgets(STDIN);

$job_num = mt_rand(0 , 3);
//mt-rand関数…ランダムな整数を生成する
//変数「$job_num」と設定してランダムに数字がでるよう代入
$occupation = $occupations[$job_num]['occupation'];
//$occupations.phpで職業配列を作成している
//職業配列の2つのデータを別々に変数として設定
//$occupationは$occupationsの職業配列の中の'occupation'
//その中でランダムに職業を選択したいので[$job_num]を連想配列に設定
//特定の文字を生成させるためには配列の変数に[]でキーを指定
$income = $occupations[$job_num]['income'];
//$occupationの変数と同様。
$asset = $income;//資産の合計を格納する変数。$incomeを代入


echo "職業は、{$occupation}です。" .PHP_EOL;
echo "資産は、{$asset}です。" . PHP_EOL;

$car = 0;
$pc = 0 ;
$house = 0 ; //イベントで購入したものの情報を保存するために、それぞれの変数を定義する。

for($event_count = 1; $event_count <= 10; $event_count++) //処理の回数を数える構文
{ if($event_count === 4 || $event_count ===8 ){
    echo "" . PHP_EOL;
    echo "給料日になりました。" . PHP_EOL;
    echo "{$income}万円の給料をもらう。" . PHP_EOL;
    $asset = $asset + $income;
    echo "資産が{$asset}万円になりました。" . PHP_EOL;
    }

    if($asset >= 2000) { //発生するイベントのプログラム
        echo "" . PHP_EOL;
        echo "{$asset}万円貯まった。何かやってみようかな？" . PHP_EOL;
        echo "1: 車を買う。" . PHP_EOL;
        echo "2: パソコンを買う。" . PHP_EOL;
        echo "3: 家を買う。" .PHP_EOL;
        echo "数字を入力してください。" . PHP_EOL;
        echo ">>";

        $choice = trim(fgets(STDIN));//どの数値が入力されたかの判断する処理
        
        //数値が入力されなかった時の処理プログラム
        while(!is_numeric($choice)) {
            echo "" . PHP_EOL;
            echo "数字が入力されていません。" . PHP_EOL;
            echo "再度入力してください。" . PHP_EOL;
            echo ">>";
            $choice = trim(fgets(STDIN));
        //is_numeric…変数の値が数値か文字列型の数字かどうかをチェックできる関数
        }

        switch ($choice) {//入力した値に基づいて実行する処理プログラム
            case 1:
                echo "車を購入する。1000万円はらう。" . PHP_EOL;
                $asset = $asset - 1000;
                $car = $car +1 ;
                break;

            case 2:
                echo "パソコンを購入する。100万円はらう。" . PHP_EOL;
                $asset = $asset - 100;
                $pc = $pc + 1;
                break;

            case 3:
                echo "全資産で家を購入する。" . PHP_EOL;
                $asset = 0;
                $house = $house + 1;
                break;

            default:
                echo "全資産で家を購入する。" . PHP_EOL;
                $asset = 0;
                $house = $house + 1;
                break;
        }
     }


   echo "" . PHP_EOL;
   echo "{$event_count}回目のイベントです。" . PHP_EOL;
   echo "Enterを押してルーレットを回してください。" . PHP_EOL;
   fgets(STDIN);

   $event_num = mt_rand(0 , 9);
   $event = $events[$event_num]['event']; //イベントの取得
   $profit = $events[$event_num]['profit']; //利益の取得
   $asset = $asset + $profit;
    echo $event . PHP_EOL;
    echo "資産が{$asset}万円になりました。" . PHP_EOL;
};

    echo PHP_EOL;
    echo "{$name}さんの資産が確定しました。" . PHP_EOL;
    echo PHP_EOL;
    echo "資産:{$asset}万円" .PHP_EOL;
    echo "車:{$car}台" .PHP_EOL;
    echo "パソコン:{$pc}台" .PHP_EOL;
    echo "家:{$house}軒" .PHP_EOL;

    echo PHP_EOL;

if ($asset >= 1500) {
    echo "{$name}さんは大富豪です。よく頑張りました。" . PHP_EOL;
} elseif($asset < 1500 && $asset >= 0) {
    echo "{$name}さんは平民です。来世は大富豪になりましょう。" . PHP_EOL;
} else {
    echo "{$name}さんは大貧民です。頑張って借金を返済しましょう。" . PHP_EOL;
}