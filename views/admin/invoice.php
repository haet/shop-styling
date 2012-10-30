<?php

	
    
    $body=  stripslashes(str_replace('\\&quot;','',$options['template'])) ;
    $footer=  stripslashes(str_replace('\\&quot;','',$options['footer'])) ;

    
    
    foreach ($params AS $param){
        $body = str_replace('{'.$param["unique_name"].'}', $param['value'], $body);
        $footer = str_replace('{'.$param["unique_name"].'}', $param['value'], $footer);
    }
    
    
    $html='<html><head>
            <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
            <style type="text/css">
                '.stripslashes($options['css']).'
            </style>
            </head>
            <body>
                <table id="content-table" width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td id="invoice-content">
                            '.$body.'
                        </td>
                    </tr>
                    <tr>
                        <td id="invoice-footer">
                            '.$footer.'
                        </td>
                    </tr>
                </table>
            </body>
          </html>';
    
    
   