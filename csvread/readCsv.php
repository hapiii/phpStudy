<?php

    $filePath = '英语预售名单.csv';
     //打开文件
    $handle = fopen($filePath, "r");
        

     while (!feof($handle)) {  //是否已到达文件末尾
          $data[] = fgetcsv($handle);
     }
      //$data = eval('return ' . iconv('gb2312', 'utf-8', var_export($data, true)) . ';');
     //$data = eval('return ' . iconv('gbk', 'utf-8', var_export($data, true)) . ';');

    foreach ($data as $key => $value) {
        if (!$value) {
            unset($data[$key]);  //销毁变量

        }else{

            foreach ($value as $dicKey => $dicValue)   {
                  if (!$dicValue){
                      unset($value[$dicKey]);
                  }else{
                      echo  $value[$dicKey];
                       //print_r($value[$dicKey]);
                  }
                    echo '----';
            }
              echo '<br>';
        }
    }
    fclose($handle);



