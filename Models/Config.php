<?php
/**
 * This class represents the configuration of the application.
 * It provides a static method to retrieve configuration values by key.
 *
 * @author Théo Cornu
 */
class Config {
    /**
     * The configuration array.
     *
     * @var array|null
     */
    private static $config;

    /**
     * Gets the configuration value for the given key.
     *
     * @param string $key The configuration key.
     *
     * @return mixed The configuration value.
     *
     * @throws Exception If the configuration key is not found.
     *
     * @author Théo Cornu
     */
    public static function get(string $key) {
        if (self::$config === null) {
            self::$config = parse_ini_file('dev.ini', true);
        }
        $keys = explode('.', $key);
        $value = self::$config;
        foreach ($keys as $k) {
            if (!isset($value[$k])) {
                throw new Exception("La clé de configuration '$key' est introuvable.");
            }
            $value = $value[$k];
        }
        return $value;
    }
}