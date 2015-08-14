<?php

		$defaults = array(
			'request' 			=> 'activation',
			'product_id' 		=> $this->product_id,
			'instance' 			=> $this->instance_id,
			'platform' 			=> $this->domain,
			'software_version' 	=> $this->software_version
			);

		$args = wp_parse_args( $defaults, $args );

		$target_url = esc_url_raw( $this->create_software_api_url( $args ) );

		$request = wp_remote_get( $target_url );

		if( is_wp_error( $request ) || wp_remote_retrieve_response_code( $request ) != 200 ) {
		// Request failed
			return false;
		}

		$response = wp_remote_retrieve_body( $request );

		return $response;


?>
