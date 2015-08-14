<?php
			echo "<input id='api_key' name='" . $this->data_key . "[" . 'api_key' . "]' size='25' type='text' value='" . $this->options['api_key'] . "' />";
			if ( $this->options['api_key'] ) {
				echo "<span class='icon-pos'><img src='" . $this->plugin_url() . "pp-api/assets/images/complete.png' title='' style='padding-bottom: 4px; vertical-align: middle; margin-right:3px;' /></span>";
			} else {
				echo "<span class='icon-pos'><img src='" . $this->plugin_url() . "pp-api/assets/images/warn.png' title='' style='padding-bottom: 4px; vertical-align: middle; margin-right:3px;' /></span>";
			}

?>
