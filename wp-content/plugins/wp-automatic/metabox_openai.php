<?php

// Globals
global $post;
global $wpdb;
global $camp_general;
global $post_id;
global $camp_options;
global $post_types;
global $camp_post_category;

?>

<div class="TTWForm-container" dir="ltr">
    <div class="TTWForm">
        <div class="panes">

            <p>Now you can use [gpt] shortcode on the post template above, here are examples:-<br>

            <ol>
                <li><strong>[gpt]Summarize this content to 100 words [matched_content][/gpt]</strong>

                    <p>This should summarize the content of the article and return only 100 words</p>

                </li>
                <li><strong>[gpt]Write an article about [original_title] in French[/gpt]</strong>

                    <p>This should write an article in French language about the title</p>


                </li>
                <li><strong>[gpt]rewrite this title [original_title][/gpt]</strong>

                    <p>This should rewrite the title</p>
                
                </li>
                <li><strong>[gpt]rewrite this content and keep HTML tags [matched_content][/gpt]</strong>

                    <p>This should rewrite the content and keep the HTML tags</p>

                 </li>



            </ol>

            </p>

            <!-- checkbox field to set the post status to pending if openai prompt failed -->
            <div class="field f_100">
                <div class="option clearfix">
                    <input name="camp_options[]" value="OPT_OPENAI_PENDING" type="checkbox">
                    <span class="option-title">
                        Set post status to pending if OpenAI prompt failed
                    </span>
                    <br>
                    <div class="description">Enable if you want the article post status to be set to pending if the gpt3 prompt failed for any reason</div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="field f_100">
                    <div class="option clearfix">
                        <input data-controls="wp_automatic_openai_advanced" name="camp_options[]" value="OPT_OPENAI_CUSTOM" type="checkbox">
                        <span class="option-title">
                            Modify OpenAI call parameters (advanced)
                        </span>
                    </div>
                    
                    <div id="wp_automatic_openai_advanced" class = "field f_100">

                        <!-- model selection field -->
                        <label>
                            Model
                        </label>
                        
                        <!-- model selection field gpt3.5-turbo, 	gpt-4, gpt-4-0314, gpt-4-32k, gpt-4-32k-0314, gpt-3.5-turbo, gpt-3.5-turbo-0301 -->
                        <select name="cg_openai_model">
                            <option value="gpt-3.5-turbo" <?php echo isset($camp_general['cg_openai_model']) && $camp_general['cg_openai_model'] == 'gpt-3.5-turbo' ? 'selected' : '' ?>>gpt-3.5-turbo (Stable version) (gpt-3.5-turbo-0613)</option>
                            <option value="gpt-3.5-turbo-16k" <?php echo isset($camp_general['cg_openai_model']) && $camp_general['cg_openai_model'] == 'gpt-3.5-turbo-16k' ? 'selected' : '' ?>>gpt-3.5-turbo-16k (16K token) (longer content size)</option>
                            <option value="gpt-3.5-turbo-0301" <?php echo isset($camp_general['cg_openai_model']) && $camp_general['cg_openai_model'] == 'gpt-3.5-turbo-0301' ? 'selected' : '' ?>>gpt-3.5-turbo-0301 (old)</option>
                            <option value="gpt-4" <?php echo isset($camp_general['cg_openai_model']) && $camp_general['cg_openai_model'] == 'gpt-4' ? 'selected' : '' ?>>gpt-4</option>
                            <option value="gpt-4-0314" <?php echo isset($camp_general['cg_openai_model']) && $camp_general['cg_openai_model'] == 'gpt-4-0314' ? 'selected' : '' ?>>gpt-4-0314</option>
                            <option value="gpt-4-32k" <?php echo isset($camp_general['cg_openai_model']) && $camp_general['cg_openai_model'] == 'gpt-4-32k' ? 'selected' : '' ?>>gpt-4-32k</option>
                            <option value="gpt-4-32k-0314" <?php echo isset($camp_general['cg_openai_model']) && $camp_general['cg_openai_model'] == 'gpt-4-32k-0314' ? 'selected' : '' ?>>gpt-4-32k-0314</option>
                        </select>
                        <div class="description">Model 3.5-turbo is the fastest, cheapest model, other models are not avialble for everyone they are in limited beta so if you did not apply on the waitlist and get access already, do not pick any of them.</div>

                        <br>

                        <!-- temprature field -->                        
                        <label for="field6">
                            Temperature (Optional)
                        </label>
                        <input name="cg_openai_temp" value="<?php echo isset($camp_general['cg_openai_temp']) ?  $camp_general['cg_openai_temp']: '' ?>" type="text">
                        <div class="description">What sampling temperature to use, between 0 and 2. Higher values like 0.8 will make the output more random, while lower values like 0.2 will make it more focused and deterministic. Defaults to 1</div>
                        
                        <br>

                        

                        <!-- top_p field -->
                        <label for="field6">
                            Top_p (Optional)
                        </label>
                        <input name="cg_openai_top_p" value="<?php echo isset($camp_general['cg_openai_top_p']) ?  $camp_general['cg_openai_top_p']: '' ?>" type="text">
                        <div class="description">An alternative to sampling with temperature, called nucleus sampling, where the model considers the results of the tokens with top_p probability mass. So 0.1 means only the tokens comprising the top 10% probability mass are considered.

We generally recommend altering this or temperature but not both. Defaults to 1.</div>

                        <br>
                        <!-- presence_penalty field -->
                        <label>
                            Presence_penalty (Optional)
                        </label>
                        <input name="cg_openai_presence_penalty" value="<?php echo isset($camp_general['cg_openai_presence_penalty']) ?  $camp_general['cg_openai_presence_penalty']: '' ?>" type="text">
                        <div class="description">Number between -2.0 and 2.0. Positive values penalize new tokens based on whether they appear in the text so far, increasing the model's likelihood to talk about new topics. Defaults to 0.</div>
                        <br>

                        <!-- frequency_penalty field -->
                        <label>
                            Frequency_penalty (Optional)
                        </label>
                        <input name="cg_openai_frequency_penalty" value="<?php echo isset($camp_general['cg_openai_frequency_penalty']) ?  $camp_general['cg_openai_frequency_penalty']: '' ?>" type="text">
                        <div class="description">Number between -2.0 and 2.0. Positive values penalize new tokens based on their existing frequency in the text so far, decreasing the model's likelihood to repeat the same line verbatim. Defaults to 0.</div>



                    </div>
                     
                
                <div class="clear"></div>
            </div>


        </div>
    </div>
</div>