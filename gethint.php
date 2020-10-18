<?php
// Fill up array with names
$a[]="영화감상";
$a[]="음악듣기";
$a[]="독서";
$a[]="그림그리기";
$a[]="요리";
$a[]="사진촬영";
$a[]="산책";
$a[]="춤추기";
$a[]="만들기";
$a[]="종이접기";
$a[]="게임";
$a[]="운동";
$a[]="글쓰기";
$a[]="악기연주";
$a[]="쇼핑";
$a[]="낚시하기";
$a[]="뜨개질";

// get the q parameter from URL
$q=$_REQUEST["q"]; $hint="";

// lookup all hints from array if $q is different from "" 
if ($q !== "")
  { $q=strtolower($q); $len=strlen($q);
    foreach($a as $name)
    { if (stristr($q, substr($name,0,$len)))
      { if ($hint==="")
        { $hint=$name; }
        else
        { $hint .= ", $name"; }
      }
    }
  }

// Output "no suggestion" if no hint were found
// or output the correct values 
echo $hint==="" ? "해당 단어 없음" : $hint;
?>