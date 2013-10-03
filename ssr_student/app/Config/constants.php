<?php

$USERTYPE = array(
    '1' => '管理者',
    '2' => '修了生',
    '3' => '在学生',
    '4' => '非学生',
);


$GENDER = array(
    '0' => '男性',
    '1' => '女性',
);

$GRADE = array(
    "0" => "学部１年生",
    "1" => "学部２年生",
    "2" => "学部３年生",
    "3" => "学部４年生",
    "4" => "修士課程１年生",
    "5" => "修士課程２年生",
    "6" => "博士課程",
    "7" => "その他"
);

$DEPARTMENT = array(
    "0" => "基幹理工学部",
    "1" => "創造理工学部",
    "2" => "先進理工学部",
    "3" => "基幹理工学研究科",
    "4" => "創造理工学研究科",
    "5" => "先進理工学研究科",
);

$MAJOR = array(
    "0" => "情報理工学科",
    "1" => "数学科",
    "2" => "機械航空学科",
    "3" => "情報理工学専攻",
    "4" => "数学専攻",
    "5" => "機械航空学専攻",
);

$BUSINESSTYPE = array(
    "0" => "金融業",
    "1" => "建設業",
    "2" => "情報通信業",
);

$CERTIFICATION_TYPE = array(
    "0" => "学士",
    "1" => "博士前期",
    "2" => "博士後期",
);

$CERTIFICATION_NUMBER = array(
    "1" => "1",
    "2" => "2",
    "3" => "3",
    "4" => "4",
    "5" => "5",
    "6" => "6",
    "7" => "7",
    "8" => "8",
    "9" => "9",
    "10" => "10",

);

$this->set(compact('USERTYPE','GENDER','GRADE','DEPARTMENT','MAJOR','BUSINESSTYPE','CERTIFICATION_TYPE','CERTIFICATION_NUMBER'));

