<?php
          global $wpdb;
          $querystr = "SELECT SUM(mc_gross) FROM " . $wpdb->prefix . "paypal_transactions";
          $pageposts = $wpdb->get_results($querystr, ARRAY_A);
          $transaction_sum = $pageposts[0] ["SUM(mc_gross)"];        
          $transaction_sum = round($transaction_sum,0);
          $transaction_sum_str =(string)$transaction_sum;
          $transaction_array = str_split($transaction_sum_str);


          $currency  = get_option(THEME_NAME.'_currency');
          switch ($currency) {
            case 'AUD':
                $currency_symbol = '$';
                break;
            case 'CAD':
                $currency_symbol = '$';
                break;
            case 'EUR':
                $currency_symbol = '€';
                break;
            case 'GBP':
                $currency_symbol = '£';
                break;
            case 'JPY':
                $currency_symbol = '¥';
                break;
            case 'USD':
                $currency_symbol = '$';
                break;
            case 'NZD':
                $currency_symbol = '$';
                break;
            case 'CHF':
                $currency_symbol = '';
                break;
            case 'HKD':
                $currency_symbol = '';
                break;
            default:
                $currency_symbol = '';
        }
 
      ?>
<!---
            <div class="home-money-button left">

                <div class="home-money left">
                    
                    <ul>
                        <li class="home-money-one"><?php _e('You’ve Helped Raise…', tk_theme_name); ?></li>
                        <li><?php echo $currency_symbol; ?><div class="home-money-border left"></div></li>

                        <?php
                        $transactionlenght = strlen($transaction_sum_str);                      
                           if ($transactionlenght == 1) { ?>
                              <li>0<div class="home-money-border left"></div></li>
                              <li>0<div class="home-money-border left"></div></li>
                              <li>0<div class="home-money-border left"></div></li>
                              <li>0<div class="home-money-border left"></div></li>
                       <?php  }

                       elseif ($transactionlenght == 2) { ?>
                              <li>0<div class="home-money-border left"></div></li>                                
                              <li>0<div class="home-money-border left"></div></li>
                              <li>0<div class="home-money-border left"></div></li>
                       <?php  } 

                              elseif ($transactionlenght == 3) { ?>
                              <li>0<div class="home-money-border left"></div></li>
                              <li>0<div class="home-money-border left"></div></li>                              
                       <?php  }

                                   elseif ($transactionlenght == 4) { ?>
                              <li>0<div class="home-money-border left"></div></li>                              
                       <?php  } 
                             else { ?>
                            
                       <?php  } ?>
                      
                        <?php foreach ($transaction_array as $transaction) {  ?>                        
                        <li><?php if(empty($transaction)){ echo "0"; } else { echo $transaction;} ?><div class="home-money-border left"></div></li>                        
                        <?php } ?>
                    </ul>
                    
                </div><!--/home-money-->

                     <!--/LINK GENERATOR-->

                  <?php
                        $paypal_redirect   = '';
                        $paypal_email 	   = get_option(THEME_NAME.'_paypal_email');
                        $currency 		   = get_option(THEME_NAME.'_currency');
                        $notify_url 	   = home_url() .'/?paypal=1';
                        $return 		   = get_option(THEME_NAME.'_return_url');
                        $product_cost      = get_option(THEME_NAME.'_product_cost');
                        $product_name      = get_option(THEME_NAME.'_product_name');
                        $item_number       = '';
                        $subscription_key  = urlencode(strtolower(md5(uniqid())));
                        $item_name         = urlencode(''.$product_name.'');
                        $sandbox 		   = get_option(THEME_NAME.'_paypal_sandbox');

                        if($sandbox == '1'){
                            $sendbox_addon = 'sandbox.';
                        }else{
                            $sendbox_addon = '';
                        }

                        $custom_secret = md5(date('Y-m-d H:i:s').''.rand(1,10).''.rand(1,100).''.rand(1,1000).''.rand(1,10000));
                        $paypal_redirect  .= 'https://www.'.$sendbox_addon.'paypal.com/webscr?cmd=_xclick';
                        $paypal_redirect  .= '&business='.$paypal_email.'&item_name='.$item_name.'&no_shipping=1&no_note=1&item_number='.$subscription_key.'&currency_code='.$currency.'&charset=UTF-8&return='.urlencode($return).'&notify_url='.urlencode($notify_url).'&rm=2&custom='.$custom_secret.'&amount='.$product_cost;

                     ?>

                <div class="home-button left">
                    <a href="<?php echo $paypal_redirect; ?>">
                        <div class="home-button-left left"></div>
                        <div class="home-button-center left"><?php _e('Donate', tk_theme_name); ?></div>
                        <div class="home-button-right left"></div>
                    </a>
                </div>

            </div><!--/home-money-button-->
                 <div class="other-content">
                    	 <?php
					/* Run the loop to output the page.
					 * If you want to overload this in a child theme then include a file
					 * called loop-page.php and that will be used instead.
					 */
					//get_template_part( 'loop', 'page' );
					 wp_reset_query();
						if ( have_posts() ) : while ( have_posts() ) : the_post();
						the_content();
						 endwhile;
						else:
						endif;
					wp_reset_query();
					?>
				
                  </div>
            </div>