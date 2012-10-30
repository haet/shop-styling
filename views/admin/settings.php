
    <style>
        .wp-editor-wrap{
            max-width:800px;
        }
    </style>
<div class=wrap>
    <h2><?php _e('Style your store','haetshopstyling'); ?></h2>
    <div id="" class="icon32"><img src="<?php echo HAET_SHOP_STYLING_URL;?>images/icon.png"><br></div>
    <h2 class="nav-tab-wrapper">
    <?php
        foreach( $tabs as $el => $name ){
            $class = ( $el == $tab ) ? ' nav-tab-active' : '';
            echo "<a class='nav-tab$class' href='?page=wp-e-commerce-shop-styling.php&tab=$el'>$name</a>";
        }
    ?>
    </h2>
    <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
        

<?php 
        switch ( $tab ){
            case 'invoicetemplate' :

                 
                global $wpdb;
                $sql = "SELECT id
                        FROM `".$wpdb->prefix."wpsc_purchase_logs` 
                        ORDER BY id DESC
                        LIMIT 1";                    
                $latest_purchase_id = $wpdb->get_var($sql);
                if($latest_purchase_id){
                    ?>
                    <h2><?php _e('preview invoice','haetshopstyling'); ?></h2>
                    <p>
                    <?php _e("This preview shows the invoice layout. It uses data from the latest purchase, but shipping or sum values maybe incorrect or empty.",'haetshopstyling'); ?>
                    </p>
                    <?php
                    echo '<a class="button" id="invoice-preview-link" href="?page=wp-e-commerce-shop-styling.php&tab=previewinvoice"> '.__("preview invoice",'haetshopstyling').'</a><br/><br/>';
                }
                ?>
                 
                <h2><?php _e('Invoice Template','haetshopstyling'); ?></h2>
                                
                 <?php 
                 
                 wp_editor(stripslashes(str_replace('\\&quot;','',$options['template'])),'haetshopstylingtemplate',array(
                        'media_buttons'=>true,
                        'tinymce' => array(
                                'theme_advanced_buttons3' => 'invoicefields',
                            )
                        )
                     );
                 ?>
                 <br/><h2><?php _e('Invoice Footer','haetshopstyling'); ?></h2>
                                
                 <?php 
                 
                 wp_editor(stripslashes(str_replace('\\&quot;','',$options['footer'])),'haetshopstylingfooter',array(
                        'media_buttons'=>true,
                        'textarea_rows'=>3,
                        'tinymce' => array(
                                'theme_advanced_buttons3' => 'invoicefields',
                                'remove_linebreaks' => false
                            )
                        )
                     );
                 ?>
                 
                 
<?php 
            break;
            case 'products':
?>
      
    <h2><?php _e('Products table','haetshopstyling'); ?></h2>   
    <table style="border:1px solid #ccc; border-collapse: collapse">
            <tbody>
                <tr valign="top">
                    <th></th>
                    <th><?php _e('Title','haetshopstyling'); ?></th>
                    <th><?php _e('Field','haetshopstyling'); ?></th>
                </tr>
                <?php for($col=1;$col<=10;$col++): ?>
                <tr valign="top">
                     <th><?php echo __('Column','haetshopstyling')." ".$col; ?></th>
                     <td><input type="text" class="" name="columntitle[<?php echo $col; ?>]" id="title_col1" value="<?php echo $options["columntitle"][$col];?>"></td>
                     <td><?php echo $this->productsFieldSelect('columnfield['.$col.']',$options["columnfield"][$col]); ?></td>
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>

<?php 
            break;
            case 'mailcontent' :
?>
               
                <h2><?php _e('Email Content - Payment Successful','haetshopstyling'); ?></h2>
                <table class="form-table">
                  <tbody>
                      <tr valign="top">
                          <th scope="row"><label for="haetshopstylingsubject_payment_successful"><?php _e('Email subject','haetshopstyling'); ?></label></th>
                          <td>
                              <input type="text" class="regular-text" id="haetshopstylingsubject_payment_successful" name="haetshopstylingsubject_payment_successful" value="<?php echo $options['subject_payment_successful']; ?>">
                          </td>
                      </tr>
                  </tbody>
                </table>               
                <?php 

                wp_editor(stripslashes(str_replace('\\&quot;','',$options['body_payment_successful'])),'haetshopstylingbody_payment_successful',array(
                    'media_buttons'=>false,
                    'tinymce' => array(
                            'theme_advanced_buttons3' => 'invoicefields',
                            'remove_linebreaks' => false
                        )
                    )
                    );
                ?>
                
                <hr/>
                
                <h2><?php _e('Email Content - Payment Incomplete (or manual payment)','haetshopstyling'); ?></h2>
                <table class="form-table">
                  <tbody>
                      <tr valign="top">
                          <th scope="row"><label for="haetshopstylingsubject_payment_incomplete"><?php _e('Email subject','haetshopstyling'); ?></label></th>
                          <td>
                              <input type="text" class="regular-text" id="haetshopstylingsubject_payment_incomplete" name="haetshopstylingsubject_payment_incomplete" value="<?php echo $options['subject_payment_incomplete']; ?>">
                          </td>
                      </tr>
                  </tbody>
                </table>               
                <?php 

                wp_editor(stripslashes(str_replace('\\&quot;','',$options['body_payment_incomplete'])),'haetshopstylingbody_payment_incomplete',array(
                    'media_buttons'=>false,
                    'tinymce' => array(
                            'theme_advanced_buttons3' => 'invoicefields',
                            'remove_linebreaks' => false
                        )
                    )
                    );
                ?>
              
                <hr/>
                
                <h2><?php _e('Email Content - Payment failed','haetshopstyling'); ?></h2>
                <table class="form-table">
                  <tbody>
                      <tr valign="top">
                          <th scope="row"><label for="haetshopstylingsubject_payment_failed"><?php _e('Email subject','haetshopstyling'); ?></label></th>
                          <td>
                              <input type="text" class="regular-text" id="haetshopstylingsubject_payment_failed" name="haetshopstylingsubject_payment_failed" value="<?php echo $options['subject_payment_failed']; ?>">
                          </td>
                      </tr>
                  </tbody>
                </table>               
                 <?php 
                 
                 wp_editor(stripslashes(str_replace('\\&quot;','',$options['body_payment_failed'])),'haetshopstylingbody_payment_failed',array(
                        'media_buttons'=>false,
                        'tinymce' => array(
                                'theme_advanced_buttons3' => 'invoicefields',
                                'remove_linebreaks' => false
                            )
                        )
                     );
                 ?>  
                
                <hr/>
                
                <h2><?php _e('Email Content - Track and Trace Email','haetshopstyling'); ?></h2>
                <table class="form-table">
                  <tbody>
                      <tr valign="top">
                          <th scope="row"><label for="haetshopstylingsubject_tracking"><?php _e('Email subject','haetshopstyling'); ?></label></th>
                          <td>
                              <input type="text" class="regular-text" id="haetshopstylingsubject_tracking" name="haetshopstylingsubject_tracking" value="<?php echo $options['subject_tracking']; ?>">
                          </td>
                      </tr>
                  </tbody>
                </table>               
                 <?php 
                 
                 wp_editor(stripslashes(str_replace('\\&quot;','',$options['body_tracking'])),'haetshopstylingbody_tracking',array(
                        'media_buttons'=>false,
                        'tinymce' => array(
                                'theme_advanced_buttons3' => 'invoicefields',
                                'remove_linebreaks' => false
                            )
                        )
                     );
                 ?>  
                 
<?php 
            break;
            case 'invoicecss':
?>

    <h2><?php _e('Style your invoice','haetshopstyling'); ?></h2>
    <textarea rows="30" cols="40" class="widefat" id="haetshopstylingcss" name="haetshopstylingcss" style="font-family:'Courier New'"><?php echo stripslashes(str_replace('\\&quot;','',$options['css'])); ?></textarea>

<?php 
            break;
            case 'previewinvoice':
?>

    <h3><?php _e('generating pdf invoice...','haetshopstyling'); ?></h3>
    <a href="#" onclick="window.history.back()"><?php _e('back','haetshopstyling'); ?></a>
    <?php 
        $this->previewInvoice(); 
        echo '<script>window.location.href="'.HAET_SHOP_STYLING_URL.'includes/download.php?filename=preview.pdf";</script>';
    ?>
    

<?php 
            break;            
            case 'mailtemplate':
?>

    <h2><?php _e('Global HTML Mail Template','haetshopstyling'); ?></h2>
    <textarea rows="30" cols="40" class="widefat" id="haetshopstylingmailtemplate" name="haetshopstylingmailtemplate" style="font-family:'Courier New'"><?php echo stripslashes(str_replace('\\&quot;','',$options['mailtemplate'])); ?></textarea>
    <br/><br/><a id="previewmail" class="button" href='#' ><?php _e('preview Email template','haetshopstyling'); ?></a><br/><br/>
    <iframe id="mailtemplatepreview" style="width:800px; height:480px; border:1px solid #ccc;" ></iframe>
    <p>
        <?php _e('you can find a few more templates here:','haetshopstyling'); ?>
        <a href="http://haet.at/wp-e-commerce-shop-styling/wp-shop-styling-mail-templates/" target="_blank">http://haet.at/wp-e-commerce-shop-styling/wp-shop-styling-mail-templates/</a>
    </p>
    <script>
        jQuery("#previewmail").click(function(){
            jQuery("#mailtemplatepreview").contents().find("html").html(jQuery("#haetshopstylingmailtemplate").val()); 
            return false;    
        });
    </script>
<?php 
            break;        
            case 'resultspage' :
?>
                <h2><?php _e('Results Page - payment successful','haetshopstyling'); ?></h2>
                                
                 <?php 
                 
                 wp_editor(stripslashes(str_replace('\\&quot;','',$options['resultspage_successful'])),'resultspage_successful',array(
                        'media_buttons'=>true,
                        'tinymce' => array(
                                'theme_advanced_buttons3' => 'invoicefields',
                            )
                        )
                     );
                 ?>
                 <h2><?php _e('Results Page - payment incomplete (or manual payment)','haetshopstyling'); ?></h2>
                                
                 <?php 
                 
                 wp_editor(stripslashes(str_replace('\\&quot;','',$options['resultspage_incomplete'])),'resultspage_incomplete',array(
                        'media_buttons'=>true,
                        'tinymce' => array(
                                'theme_advanced_buttons3' => 'invoicefields',
                            )
                        )
                     );
                 ?>
                 <h2><?php _e('Results Page - payment failed','haetshopstyling'); ?></h2>
                                
                 <?php 
                 
                 wp_editor(stripslashes(str_replace('\\&quot;','',$options['resultspage_failed'])),'resultspage_failed',array(
                        'media_buttons'=>true,
                        'tinymce' => array(
                                'theme_advanced_buttons3' => 'invoicefields',
                            )
                        )
                     );
                 ?>
<?php 
            break;        
            case 'settings':
?>

    <h2><?php _e('Customize your invoice','haetshopstyling'); ?></h2>
    <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row"><label for="haetshopstylingpaper"><?php _e('Paper','haetshopstyling'); ?></label></th>
                    <td>
                        <select  id="haetshopstylingpaper" name="haetshopstylingpaper">
                          <option value="a4" <?php echo ($options['paper']=="a4"?"selected":""); ?>>a4</option>
                          <option value="letter" <?php echo ($options['paper']=="letter"?"selected":""); ?>>letter</option>
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="haetshopstylingfilename"><?php _e('Filename','haetshopstyling'); ?></label></th>
                    <td>
                        <input type="text" class="regular-text" id="haetshopstylingpaper" name="haetshopstylingfilename" value="<?php echo $options['filename']; ?>">
                        <span class="description"><?php _e('&lt;filename&gt;&lt;invoicenumber&gt;.pdf','haetshopstyling'); ?></span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="haetshopstylingreplacependingemail"><?php _e('Replace "order pending" Email','haetshopstyling'); ?></label></th>
                    <td>
                        <select id="haetshopstylingreplacependingmail" name="haetshopstylingreplacependingmail" >
                          <option value="yes" <?php echo ($options['replacependingmail']=='yes'?'selected':''); ?> ><?php _e('yes','haetshopstyling'); ?></option>
                          <option value="no" <?php echo ($options['replacependingmail']=='no'?'selected':''); ?> ><?php _e('no','haetshopstyling'); ?></option>
                        </select>
                        <span class="description"><?php _e('replace the default email from wp e-commerce.','haetshopstyling'); ?></span>
                    </td>
                </tr>
            </tbody>
        </table>


<?php 
           break;
}//switch
            
?>
        <div class="submit">
            <input type="submit" name="update_haetshopstylingSettings" class="button-primary" value="<?php _e('Update Settings', 'haetshopstyling') ?>" />
        </div>
    </form>
</div>

