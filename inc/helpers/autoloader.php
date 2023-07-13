<?php
/**
 * Autoloader file for theme.
 *
 * @package Digital Navas
 */

namespace DIGITALNAVAS_THEME\Inc\Helpers;

/**
 * Auto loader function.
 *
 * @param string $resource Source namespace.
 *
 * @return void
 */
function autoloader($resource = '') {
    $resource_path  = false;
    $namespace_root = 'DIGITALNAVAS_THEME\\';
    $resource       = trim($resource, '\\');

    if (empty($resource) || strpos($resource, '\\') === false || strpos($resource, $namespace_root) !== 0) {
        // Not our namespace, bail out.
        return;
    }

    // Remove our root namespace.
    $resource = str_replace($namespace_root, '', $resource);

    $path = explode(
        '\\',
        str_replace('_', '-', strtolower($resource))
    );

    /**
     * Time to determine which type of resource path it is,
     * so that we can deduce the correct file path for it.
     */
    if (empty($path[0]) || empty($path[1])) {
        return;
    }

    $directory = '';
    $file_name = '';

    if ('inc' === $path[0]) {
        switch ($path[1]) {
            case 'traits':
                $directory = 'traits';
                $file_name = sprintf('trait-%s', trim(strtolower($path[2])));
                break;

            case 'widgets':
            case 'blocks':
                if (!empty($path[2])) {
                    $directory = sprintf('classes/%s', $path[1]);
                    $file_name = sprintf('class-%s', trim(strtolower($path[2])));
                    break;
                }
            default:
                $directory = 'classes';
                $file_name = sprintf('class-%s', trim(strtolower($path[1])));
                break;
        }

        $resource_path = sprintf('%s/inc/%s/%s.php', untrailingslashit(DIGITALNAVAS_DIR_PATH), $directory, $file_name);
    }

    if (!empty($resource_path) && file_exists($resource_path)) {
        require_once $resource_path;
    }
}

spl_autoload_register('\DIGITALNAVAS_THEME\Inc\Helpers\autoloader');
