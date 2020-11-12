<?php
          $questions = simplexml_load_file('../xml/Questions.xml');
          $cuantos = 0;
          foreach ($questions->xpath('//assessmentItem') as $question) {
            $cuantos = $cuantos + 1;
          }
          echo $cuantos;
?>