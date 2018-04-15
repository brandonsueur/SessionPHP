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

namespace App;

use ArrayAccess;

class Session implements ArrayAccess {
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

    /**
     * Whether a offset exists
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     * @since 5.0.0
     */
    public function offsetExists($offset)
    {
        return $this->exists($offset);
    }

    /**
     * Offset to retrieve
     * @link http://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     * @return mixed Can return all value types.
     * @since 5.0.0
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * Offset to set
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     * @return void
     * @since 5.0.0
     */
    public function offsetSet($offset, $value)
    {

        $this->set($offset, $value);

    }

    /**
     * Offset to unset
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     * @return void
     * @since 5.0.0
     */
    public function offsetUnset($offset)
    {
        $this->remove($offset);
    }
}
