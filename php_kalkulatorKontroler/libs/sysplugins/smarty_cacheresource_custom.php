<?php
/**
 * Smarty Internal Plugin
 *
 * @package    Smarty
 * @subpackage Cacher
 */

/**
 * Cache Handler API
 *
 * @package    Smarty
 * @subpackage Cacher
 * @author     Rodney Rehm
 */
abstract class Smarty_CacheResource_Custom extends Smarty_CacheResource
{
    /**
     * fetch cached content and its modification time from data source
     *
     * @param string  $id         unique cache content identifier
     * @param string  $name       template name
     * @param string  $cache_id   cache id
     * @param string  $compile_id compile id
     * @param string  $content    cached content
     * @param integer $mtime      cache modification timestamp (epoch)
     *
     * @return void
     */
    abstract protected function fetch($id, $name, $cache_id, $compile_id, &$content, &$mtime);

    /**
     * Fetch cached content's modification timestamp from data source
     * {@internal implementing this method is optional.
     *  Only implement it if modification times can be accessed faster than loading the complete cached content.}}
     *
     * @param string $id         unique cache content identifier
     * @param string $name       template name
     * @param string $cache_id   cache id
     * @param string $compile_id compile id
     *
     * @return integer|boolean timestamp (epoch) the template was modified, or false if not found
     */
    protected function fetchTimestamp($id, $name, $cache_id, $compile_id)
    {
        return false;
    }

    /**
     * Save content to cache
     *
     * @param string       $id         unique cache content identifier
     * @param string       $name       template name
     * @param string       $cache_id   cache id
     * @param string       $compile_id compile id
     * @param integer|null $exp_time   seconds till expiration or null
     * @param string       $content    content to cache
     *
     * @return boolean      success
     */
    abstract protected function save($id, $name, $cache_id, $compile_id, $exp_time, $content);

    /**
     * Delete content from cache
     *
     * @param string|null  $name       template name
     * @param string|null  $cache_id   cache id
     * @param string|null  $compile_id compile id
     * @param integer|null $exp_time   seconds till expiration time in seconds or null
     *
     * @return integer      number of deleted caches
     */
    abstract protected function delete($name, $cache_id, $compile_id, $exp_time);

    /**
     * populate Cached Object with meta data from Resource
     *
     * @param Smarty_Template_Cached   $cached    cached object
     * @param Smarty_Internal_Template $_template template object
     *
     * @return void
     */
    public function populate(Smarty_Template_Cached $cached, Smarty_Internal_Template $_template)
    {
        $_cache_id = isset($cached->cache_id) ? preg_replace('![^\w\|]+!', '_', $cached->cache_id) : null;
        $_compile_id = isset($cached->compile_id) ? preg_replace('![^\w]+!', '_', $cached->compile_id) : null;
        $path = $cached->source->uid . $_cache_id . $_compile_id;
        $cached->filepath = sha1($path);
        if ($_template->smarty->cache_locking) {
            $cached->lock_id = sha1('lock.' . $path);
        }
        $this->populateTimestamp($cached);
    }

    /**
     * populate Cached Object with timestamp and exists from Resource
     *
     * @param Smarty_Template_Cached $cached
     *
     * @return void
     */
    public function populateTimestamp(Smarty_Template_Cached $cached)
    {
        $mtime =
            $this->fetchTimestamp($cached->filepath, $cached->source->name, $cached->cache_id, $cached->compile_id);
        if ($mtime !== null) {
            $cached->timestamp = $mtime;
            $cached->exists = !!$cached->timestamp;
            return;
        }
        $timestamp = null;
        $this->fetch(
            $cached->filepath,
            $cached->source->name,
            $cached->cache_id,
            $cached->compile_id,
            $cached->content,
            $timestamp
        );
        $cached->timestamp = isset($timestamp) ? $timestamp : false;
        $cached->exists = !!$cached->timestamp;
    }

    /**
     * Read the cached template and process the header
     *
     * @param \Smarty_Internal_Template   $_smarty_tpl do not change variable name, is used by compiled template
     * @param Smarty_Template_Cached|null $cached      cached object
     * @param boolean                     $update      flag if called because cache update
     *
     * @return boolean                 true or false if the cached content does not exist
     */
    public function process(
        Smarty_Internal_Template $_smarty_tpl,
        ?Smarty_Template_Cached $cached = null,
        $update = false
    ) {
        if (!$cached) {
            $cached = $_smarty_tpl->cached;
        }
        $content = $cached->content ? $cached->content : null;
        $timestamp = $cached->timestamp ? $cached->timestamp : null;
        if ($content === null || !$timestamp) {
            $this->fetch(
                $_smarty_tpl->cached->filepath,
                $_smarty_tpl->source->name,
                $_smarty_tpl->cache_id,
                $_smarty_tpl->compile_id,
                $content,
                $timestamp
            );
        }
        if (isset($content)) {
            eval('?>' . $content);
            $cached->content = null;
            return true;
        }
        return false;
    }

    /**
     * Write the rendered template output to cache
     *
     * @param Smarty_Internal_Template $_template template object
     * @param string                   $content   content to cache
     *
     * @return boolean                  success
     */
    public function writeCachedContent(Smarty_Internal_Template $_template, $content)
    {
        return $this->save(
            $_template->cached->filepath,
            $_template->source->name,
            $_template->cache_id,
            $_template->compile_id,
            $_template->cache_lifetime,
            $content
        );
    }

    /**
     * Read cached template from cache
     *
     * @param Smarty_Internal_Template $_template template object
     *
     * @return string|boolean  content
     */
    public function readCachedContent(Smarty_Internal_Template $_template)
    {
        $content = $_template->cached->content ? $_template->cached->content : null;
        $timestamp = null;
        if ($content === null) {
            $timestamp = null;
            $this->fetch(
                $_template->cached->filepath,
                $_template->source->name,
                $_template->cache_id,
                $_template->compile_id,
                $content,
                $timestamp
            );
        }
        if (isset($content)) {
            return $content;
        }
        return false;
    }

    /**
     * Empty cache
     *
     * @param Smarty  $smarty   Smarty object
     * @param integer $exp_time expiration time (number of seconds, not timestamp)
     *
     * @return integer number of cache files deleted
     */
    public function clearAll(Smarty $smarty, $exp_time = null)
    {
        return $this->delete(null, null, null, $exp_time);
    }

    /**
     * Empty cache for a specific template
     *
     * @param Smarty  $smarty        Smarty object
     * @param string  $resource_name template name
     * @param string  $cache_id      cache id
     * @param string  $compile_id    compile id
     * @param integer $exp_time      expiration time (number of seconds, not timestamp)
     *
     * @return int number of cache files deleted
     * @throws \SmartyException
     */
    public function clear(Smarty $smarty, $resource_name, $cache_id, $compile_id, $exp_time)
    {
        $cache_name = null;
        if (isset($resource_name)) {
            $source = Smarty_Template_Source::load(null, $smarty, $resource_name);
            if ($source->exists) {
                $cache_name = $source->name;
            } else {
                return 0;
            }
        }
        return $this->delete($cache_name, $cache_id, $compile_id, $exp_time);
    }

    /**
     * Check is cache is locked for this template
     *
     * @param Smarty                 $smarty Smarty object
     * @param Smarty_Template_Cached $cached cached object
     *
     * @return boolean               true or false if cache is locked
     */
    public function hasLock(Smarty $smarty, Smarty_Template_Cached $cached)
    {
        $id = $cached->lock_id;
        $name = $cached->source->name . '.lock';
        $mtime = $this->fetchTimestamp($id, $name, $cached->cache_id, $cached->compile_id);
        if ($mtime === null) {
            $this->fetch($id, $name, $cached->cache_id, $cached->compile_id, $content, $mtime);
        }
        return $mtime && ($t = time()) - $mtime < $smarty->locking_timeout;
    }

    /**
     * Lock cache for this template
     *
     * @param Smarty                 $smarty Smarty object
     * @param Smarty_Template_Cached $cached cached object
     *
     * @return bool|void
     */
    public function acquireLock(Smarty $smarty, Smarty_Template_Cached $cached)
    {
        $cached->is_locked = true;
        $id = $cached->lock_id;
        $name = $cached->source->name . '.lock';
        $this->save($id, $name, $cached->cache_id, $cached->compile_id, $smarty->locking_timeout, '');
    }

    /**
     * Unlock cache for this template
     *
     * @param Smarty                 $smarty Smarty object
     * @param Smarty_Template_Cached $cached cached object
     *
     * @return bool|void
     */
    public function releaseLock(Smarty $smarty, Smarty_Template_Cached $cached)
    {
        $cached->is_locked = false;
        $name = $cached->source->name . '.lock';
        $this->delete($name, $cached->cache_id, $cached->compile_id, null);
    }
}
