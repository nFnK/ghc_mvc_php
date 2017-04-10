<?php

class Session
{
	public static function exists($key) {
			return (isset($_SESSION[$key])) ? true : false;
	}
	
	public static function init()
    {
        @session_start();
    }
    
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    
    public static function get($key)
    {
        if (isset($_SESSION[$key]))
        return $_SESSION[$key];
    }
    
    public static function destroy()
    {
        //unset($_SESSION);
        session_destroy();
    }

    public static function delete($key) {
			if(self::exists($key)) {
				unset($_SESSION[$key]);
			}
		}

    public static function flash($key, $string = ''){
			if(self::exists($key)) {
				$session = self::get($key);
				self::delete($key);
				return $session;
			} else {
				self::set($key, $string);
			}
		}

}