<?php

class Tokens {

    protected $meta;
	protected $user_id;

	public function __construct($meta, $user_id ) {
    	$this->meta    = $meta;
		$this->user_id = $user_id;
	}

	private function hash_token( $token ) {
        return hash( 'sha256', $token );
	}

	public function get( $token ) {
		$verifier = $this->hash_token( $token );
		return $this->get_session( $verifier );
	}

	public function verify( $token ) {
		$verifier = $this->hash_token( $token );
		return (bool) $this->get_session( $verifier );
	}

	public function create( $expiration ) {
		$session = array();
		$session['expiration'] = $expiration;

		// IP address.
		if ( !empty( $_SERVER['REMOTE_ADDR'] ) ) {
			$session['ip'] = $_SERVER['REMOTE_ADDR'];
		}

		// User-agent.
		if ( ! empty( $_SERVER['HTTP_USER_AGENT'] ) ) {
			$session['ua'] = wp_unslash( $_SERVER['HTTP_USER_AGENT'] );
		}

		// Timestamp
		$session['login'] = time();

		$token = wp_generate_password( 43, false, false );

		$this->update( $token, $session );

		return $token;
	}

	public function update( $token, $session ) {
		$verifier = $this->hash_token( $token );
		$this->update_session( $verifier, $session );
	}

	public function destroy( $token ) {
		$verifier = $this->hash_token( $token );
		$this->update_session( $verifier, null );
	}

	public function destroy_others( $token_to_keep ) {
		$verifier = $this->hash_token( $token_to_keep );
		$session = $this->get_session( $verifier );
		if ( $session ) {
			$this->destroy_other_sessions( $verifier );
		} else {
			$this->destroy_all_sessions();
		}
	}

	protected function is_still_valid( $session ) {
		return $session['expiration'] >= time();
	}

	public function destroy_all() {
		$this->destroy_all_sessions();
	}

	/**
	 * Destroy all session tokens for all users.
	 *
	 * @since 4.0.0
	 * @access public
	 * @static
	 */
	public static function destroy_all_for_all_users() {
		$this->drop_sessions();
	}

	public function get_all() {
		return array_values( $this->get_sessions() );
	}

	protected function get_sessions() {
		$sessions = $this->meta->get( $this->user_id, 'session_tokens', true );

		if ( ! is_array( $sessions ) ) {
			return array();
		}

		$sessions = array_map( array( $this, 'prepare_session' ), $sessions );
		return array_filter( $sessions, array( $this, 'is_still_valid' ) );
	}

	protected function prepare_session( $session ) {
		if ( is_int( $session ) ) {
			return array( 'expiration' => $session );
		}

		return $session;
	}

	protected function get_session( $verifier ) {
		$sessions = $this->get_sessions();

		if ( isset( $sessions[ $verifier ] ) ) {
			return $sessions[ $verifier ];
		}

		return null;
	}

	protected function update_session( $verifier, $session = null ) {
		$sessions = $this->get_sessions();

		if ( $session ) {
			$sessions[ $verifier ] = $session;
		} else {
			unset( $sessions[ $verifier ] );
		}

		$this->update_sessions( $sessions );
	}

	protected function update_sessions( $sessions ) {
		if ( $sessions ) {
			$this->meta->update( $this->user_id, 'session_tokens', $sessions );
		} else {
			$this->meta->delete( $this->user_id, 'session_tokens' );
		}
	}

	protected function destroy_other_sessions( $verifier ) {
		$session = $this->get_session( $verifier );
		$this->update_sessions( array( $verifier => $session ) );
	}

	protected function destroy_all_sessions() {
		$this->update_sessions( array() );
	}

	public static function drop_sessions() {
		delete_metadata( 'user', 0, 'session_tokens', false, true );
	}
}
