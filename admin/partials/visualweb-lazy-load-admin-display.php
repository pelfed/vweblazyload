<div class="wrap update-nag" style="width:90%">
    
    <div>
    <i style="font-size:150%">VisualWeb Lazy Load settings</i>
    <form method="post" name="vweb_lazyload_options" action="options.php">
    
	    <?php
	        //Grab all options
	        $options = get_option($this->plugin_name);

	        $lazy_jq_selector = $options['lazy_jq_selector'];
	        $lazy_jq_on = $options['lazy_jq_on'];
	        //var_dump($lazy_jq_on);
	    ?>
		<?php
	    	settings_fields($this->plugin_name);
	    	do_settings_sections($this->plugin_name);
		?>
		
		<p>Add your CSS Selector(s), ie <code>#myid img</code> or chain them ie <code>.myclass, #myid>img</code></p>
		<p>Lazy Load will then be added to your chosen selector(s) so long as they are images (&lt;img&gt; tag).</p>
        <!-- Optional title for quotes list -->
	<table class="form-table">
		<tbody>
		<tr>
			<th scope="row"><label for="<?php echo $this->plugin_name; ?>-lazy_jq_on">Turn Lazy Load on</label></th>
			<td>
				<input type="checkbox" id="<?php echo $this->plugin_name; ?>-lazy_jq_on" name="<?php echo $this->plugin_name; ?>[lazy_jq_on]" value="1" <?php checked($lazy_jq_on, 1); ?>/>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="<?php echo $this->plugin_name; ?>-lazy_jq_selector">Enter the JQuery selector(s) you want to use for Lazy Load</label></th>
			<td>
				<textarea style="width:90%;height:200px" id="<?php echo $this->plugin_name; ?>-lazy_jq_selector" name="<?php echo $this->plugin_name; ?>[lazy_jq_selector]"><?php echo $lazy_jq_selector; ?></textarea>
			</td>
		</tr>
		</tbody>
	</table>

        <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>

    </form>
    </div>
</div>

