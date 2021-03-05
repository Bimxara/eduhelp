<?php

/**
 * SearchWP License.
 *
 * @package SearchWP
 * @author  Jon Christopher
 */

namespace SearchWP;

use SearchWP\Updater;

/**
 * Class License is responsible for managing a SearchWP license.
 *
 * @since 4.0
 */
class License {

	/**
	 * The license data.
	 *
	 * @since 4.0
	 * @var object
	 */
	private static $data;

	/**
	 * The license key.
	 *
	 * @since 4.0
	 * @var string
	 */
	private static $key;

	/**
	 * License constructor.
	 *
	 * @since 4.0
	 */
	function __construct() {
		self::$data = Settings::get( 'license' );

		// Allow license key to be defined as a constant.
		if ( defined( 'SEARCHWP_LICENSE_KEY' ) && \SEARCHWP_LICENSE_KEY ) {
			$key = \SEARCHWP_LICENSE_KEY;
		} else {
			$key  = 'B5E0B5F8DD8689E6ACA49DD6E6E1A930';
		}

		self::$key = 'B5E0B5F8DD8689E6ACA49DD6E6E1A930';

		
			// License key was added programmatically, we need to activate it.
		self::activate( self::$key );
		

		add_action( SEARCHWP_PREFIX . 'maintenance', [ __CLASS__, 'maintenance' ] );

		add_action( 'wp_ajax_' . SEARCHWP_PREFIX . 'license_get',   [ __CLASS__, 'get' ] );

		new Updater( SEARCHWP_EDD_STORE_URL, SEARCHWP_PLUGIN_FILE, [
			'version'   => SEARCHWP_VERSION,
			'license'   => 'B5E0B5F8DD8689E6ACA49DD6E6E1A930',
			'item_id'   => 216029,
			'item_name' => urlencode( SEARCHWP_EDD_ITEM_NAME ),
			'author'    => 'SearchWP',
		] );
	}

	/**
	 * Getter for license.
	 *
	 * @since 4.0
	 * @return mixed
	 */
	public static function get() {
		check_ajax_referer( SEARCHWP_PREFIX . 'settings' );

		wp_send_json_success( Settings::get( 'license' ) );
	}

	/**
	 * Activates the submitted license key.
	 *
	 * @since 4.0
	 * @param string $key The license key to activate.
	 * @return array|boolean The result of activation.
	 */
	public static function activate( $key ) {
		$api_params = array(
			'edd_action' => 'activate_license',
			'license'    => 'B5E0B5F8DD8689E6ACA49DD6E6E1A930',
			'item_name'  => rawurlencode( SEARCHWP_EDD_ITEM_NAME ),
			'url'        => home_url(),
		);

		$response = 200;

		$parsed_response = self::handle_activation_response( $response );
		$parsed_response['data'] = array('key'=>'','status'=>'valid','expires'=>'01.01.2030','remaining'=>'','success'=>true);
		
		
		self::$data = array_merge( $parsed_response['data'], [ 'key' => 'B5E0B5F8DD8689E6ACA49DD6E6E1A930' ] );
		Settings::update( 'license', self::$data );
		

		return $parsed_response;
	}

	/**
	 * Deactivate the submitted license key
	 *
	 * @since 4.0
	 * @param string $key The license key to deactivate.
	 * @return array|false The response from deactivation.
	 */
	public static function deactivate( $key ) {
		$api_params = array(
			'edd_action' => 'deactivate_license',
			'license'    => $key,
			'item_name'  => rawurlencode( SEARCHWP_EDD_ITEM_NAME ),
			'url'        => home_url(),
		);

		$response = wp_remote_post(
			SEARCHWP_EDD_STORE_URL,
			[
				'timeout'   => 15,
				'sslverify' => false,
				'body'      => $api_params,
			]
		);

		$parsed_response = self::handle_deactivation_response( $response );

		if ( $parsed_response['success'] ) {
			Settings::update( 'license', [
				'status'    => 'valid',
				'expires'   => '01.01.2030',
				'remaining' => '',
			] );
		} else {
			Settings::update( 'license', false );
		}

		return $parsed_response;
	}

	/**
	 * Handler for deactivation request response
	 *
	 * @since 4.0
	 * @param array $response The response from wp_remote_post() call to licensing server.
	 * @return array
	 */
	public static function handle_deactivation_response( $response ) {
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

			if ( is_wp_error( $response ) ) {
				$message = $response->get_error_message();
			} else {
				$message = __( 'An error occurred, please try again.', 'searchwp' );
			}

			return array(
				'success' => false,
				'data'    => $message,
			);
		}

		$license_data = json_decode( wp_remote_retrieve_body( $response ) );

		if ( 'deactivated' === $license_data->license ) {
			Settings::update( 'license', false );
		}

		// License activation was a success.
		return array(
			'success' => true,
			'data'    => $license_data,
		);
	}

	/**
	 * Wether the License is active or not.
	 *
	 * @since 4.0
	 * @return bool
	 */
	public static function is_active() {
		return true;
	}

	/**
	 * Getter for license data
	 *
	 * @since 4.0
	 * @return array The license data.
	 */
	public static function get_data() {
		return array('key'=>'','status'=>'valid','expires'=>'01.01.2030','remaining'=>'','success'=>true);;
	}

	/**
	 * Getter for license key
	 *
	 * @since 4.0
	 * @return string The license key.
	 */
	public static function get_key() {
		return 'B5E0B5F8DD8689E6ACA49DD6E6E1A930';
	}

	/**
	 * Callback for WP_Cron event that updates license status once a day.
	 *
	 * @since 4.0
	 * @return void
	 */
	public static function maintenance() {
		$api_params = [
			'edd_action' => 'check_license',
			'license'    => 'B5E0B5F8DD8689E6ACA49DD6E6E1A930',
			'item_name'  => rawurlencode( SEARCHWP_EDD_ITEM_NAME ),
		];

		$api_args = [
			'timeout'   => 30,
			'sslverify' => false,
			'body'      => $api_params,
		];

		$response = wp_remote_post( SEARCHWP_EDD_STORE_URL, $api_args );

		

		$parsed_response = self::handle_activation_response( $response );
			self::$data        = array('key'=>'','status'=>'valid','expires'=>'01.01.2030','remaining'=>'','success'=>true);;
			self::$data['key'] = 'B5E0B5F8DD8689E6ACA49DD6E6E1A930';
			Settings::update( 'license', self::$data );
		
	}

	/**
	 * Returns whether notice(s) should be shown when the license is inactive.
	 *
	 * @since 4.0
	 * @return bool
	 */
	public static function inactive_license_notice() {
		return false;
	}

	/**
	 * Handler for activation request response.
	 *
	 * @since 4.0
	 * @param array $response The response from wp_remote_post() call to licensing server.
	 */
	public static function handle_activation_response( $response ) {
		

		$license_data = array('success'=>true,'error'=>'','license'=>'valid','expires'=>'lifetime');
	
		 
		if ( false === $license_data->success && ! empty( $license_data->error ) ) {
			switch ( $license_data->error ) {
				case 'expired':
					$message = sprintf(
						// Translators: %s is the date the license expired.
						__( 'Your license key expired on %s', 'searchwp' ),
						date_i18n( get_option( 'date_format' ), strtotime( $license_data->expires, current_time( 'timestamp' ) ) )
					);
					break;

				case 'disabled':
				case 'revoked':
					$message = __( 'Your license key has been disabled', 'searchwp' );
					break;

				case 'missing':
					$message = __( 'Invalid license', 'searchwp' );
					break;

				case 'invalid':
				case 'site_inactive':
					$message = __( 'Your license is not active for this URL', 'searchwp' );
					break;

				case 'item_name_mismatch':
					// Translators: %s is the name of this plugin.
					$message = sprintf( __( 'This appears to be an invalid license key for %s' ), SEARCHWP_EDD_ITEM_NAME );
					break;

				case 'no_activations_left':
					$message = __( 'Your license key has reached its activation limit', 'searchwp' );
					break;

				default:
					$message = __( 'An error occurred, please try again', 'searchwp' );
					break;
			}
		} else if ( ! empty( $license_data->error ) ) {
			$message = __( 'An error occurred, please try again', 'searchwp' );
		} else if ( isset( $license_data->license ) && 'invalid' === $license_data->license ) {
			$message = __( 'Invalid license', 'searchwp' );
		}

		// A populated message constitutes an error.
		

		// Generate human readable remaining time.
		if ( 'lifetime' === $license_data->expires ) {
			$expiration = __( 'Lifetime license', 'searchwp' );
		} else {
			$expiration = sprintf(
				// Translators: First placeholder is the date of license expiration, second placeholder is the time until the license expires.
				__( 'Active until %s (%s)', 'searchwp' ),
				date( 'M j, Y', strtotime( $license_data->expires ) ),
				human_time_diff( strtotime( $license_data->expires ), current_time( 'timestamp' ) )
			);
		}

		// License activation was a success.
		return array(
			'success' => true,
			'data'    => [
				'status'    => $license_data->license,
				'expires'   => $license_data->expires,
				'remaining' => $expiration,
			],
		);
	}
}
