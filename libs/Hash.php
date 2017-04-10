<?php


	/**
	* 
	*/
	class Hash
	{
		/**
		* @param string $algo Algoritam (md5, sha1, whirepool, itd...)
		* @param string $data Podatke koje koje sifruje
		* @param string $salt Salt (trebao bi biti isti u cijelom sistemu 'MISLIM' da bi trebap :D)
		* @return string I na kraju has/salt podaci
		*/
		public static function create($algo, $data, $salt) {
			$context = hash_init($algo, HASH_HMAC, $salt);
			hash_update($context, $data);

			return hash_final($context);
		}
	}