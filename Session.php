<?php
/*
 * Requires PHP >= 7.0
 *
 * @license     http://creativecommons.org/licenses/MIT/ MIT
 * @category    Session
 * @author      Brandon Sueur <gynidark@gmail.com>
 * @link        https://github.com/brandonsueur/SessionPHP
 * @version     1.0
 * @since       1.0 (March 20, 2018)
 */

class Session{
    /**
     * Check if the session is started
     *
     * @return bool
     */
    public function check(){
        return !isset($_SESSION) ? session_start() : false;
    }

    /**
     * Retrieve the identifier if it exists otherwise it creates it.
     *
     * @return bool|string
     */
    public function getSessionId(){
        return !is_null(session_id()) ? session_id() : false;
    }

    /**
     * Regeneration of an id.
     *
     * @param bool $type
     * @return bool
     */
    public function regenerateId($type = true){
        return $type == true ? session_regenerate_id(true) : session_regenerate_id();
    }

    /**
     * Checks to see if a session property exists.
     *
     * @param $key
     * @return bool
     */
    public function exists($key){
        return array_key_exists($key, $_SESSION) ? true : false;
    }

    /**
     * Sets a session variable.
     *
     * @param $key
     * @param $value
     */
    public function set($key, $value){
        $_SESSION[$key] = $value;
    }

    /**
     * Gets a session variable by key.
     *
     * @param $key
     * @return bool
     */
    public function get($key){
        return isset($_SESSION[$key]) ? $_SESSION[$key] : false;
    }

    /**
     * Shows sessions.
     *
     * @return string
     */
    public function getAll(){
        return !empty($_SESSION) ? $_SESSION : 'Session vide';
    }


    /**
     * Removes a session key.
     *
     * @param $key
     */
    public function remove($key){
        unset($_SESSION[$key]);
    }

    /**
     * Delete all sessions.
     *
     * @param bool $type
     * @return bool|void
     */
    public function removeAll($type = false){
        return $type === false ? session_destroy() : session_unset();
    }
}
