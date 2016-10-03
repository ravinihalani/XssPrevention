<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of XssPrevention
 *
 * @author abhishekrao ravinihalani
 */
class XssPrevention {

    //put your code here



    function protectXSS($input) {
        return htmlentities($input);
    }

    function protectXSSBlackListTags($input) {

        //if ((strpos($input, '<style>') !== false)OR(strpos($input, '<div>') !== false) OR (strpos($input, '<script>') !== false)OR(strpos($input, '<a>') !== false)OR(strpos($input, '<h>') !== false)OR (strpos($input, '<body>') !== false))
        //{
        //		//echo 'true';
        //$input=strip_tags($input);
        //}

        /* $tags_to_strip = Array("style","div"  );
          foreach ($tags_to_strip as $tag)
          {
          $input = preg_replace("/<\\/?" . $tag . "(.|\\s)*?>/",$replace_with,$input);

          }


          // echo 'FALSE';
          return $input;

          } */

                $tags = array("<style>", "</style>", "<div>", "</div>", "<script>", "</script>", "<a>", "</a>", "</h>", "<h>", "<body>", "</body>", "<img>", "</img>", "<marquee>", "</marquee>", "<iframe>", "</iframe>", "<input>", "</input>", "<svg>", "</svg>", "<bgsound>", "</bgsound>", "<br>", "</br>", "<link>", "</link>", "<xss>", "</xss>", "<frameset>", "</frameset>", "<table>", "</table>", "<base>", "</base>", "<embed>", "</embed>", "<xml>", "</xml>", "<span>", "</span>");
        //$string = "<p><font>Hello World of PHP</font></p>";
        // <IMG SRC="javascript:alert('XSS');">
        $input = str_ireplace($tags, "", $input);

        return $input;
    }

    function protectXSSpurifier($input) {

        require_once './htmlpurifier-4.7.0-lite/library/HTMLPurifier.auto.php';


        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);
        //$clean_html = $purifier->purify($dirty_html);
        return ($purifier->purify($input));
    }

    function protectXSSWhiteListTags($input) {
        $tags = ["<b>", "</b>", "<blockquote>", "</blockquote>", "<br>", "</br>", "<center>", "</center>", "</cite>", "<cite>", "<code>", "</code>", "<col>", "</col>", "<colgroup>", "</colgroup>", "<dd>", "</dd>", "</dl>", "<dl>", "<dt>", "</dt>", "<em>", "</em>", "<font>", "</font>", "<hr>", "</hr>", "<i>", "</i>", "</li>", "<li>", "<ol>", "</ol>", "<p>", "</p>", "<pre>", "</pre>", "<q>", "</q>", "<small>", "</small>", "</span>", "<span>", "<strike>", "</strike>", "<strong>", "</strong>", "<style>", "</style>", "<sub>", "</sub>", "<sup>", "</sup>", "<table>", "</table>", "</tbody>", "<tbody>", "<td>", "</td>", "<tfoot>", "</tfoot>", "<th>", "</th>", "<thread>", "</thread>", "<tr>", "</tr>", "</u>", "<u>", "<ul>", "/ul"];
        $input = htmlentities($input);

        $arrlength = count($tags);

        $temp = 'false';



        for ($x = 0; $x < $arrlength; $x++) {
            //echo 'input';
            //echo $input;
            // echo 'tags[x]';
            // echo $tags[$x];
            echo strrchr(($input), ($tags[$x]));
        }

        //allow tags
        //$input = str_ireplace($tags, "", $input);
        return $temp;
    }

}
