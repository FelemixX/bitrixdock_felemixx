class XHProfiler
{
    public static function startProfiling()
    {
        include_once '/usr/local/lib/php/xhprof_lib/utils/xhprof_lib.php';
        include_once '/usr/local/lib/php/xhprof_lib/utils/xhprof_runs.php';
        xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);
//        register_shutdown_function([$this, 'saveProfile']);
    }

    public static function saveProfile()
    {
        $xhprofData = xhprof_disable();
        $runs = new XHProfRuns_Default();
        $runs->save_run($xhprofData, time() . '-0-' . date('d-m-Y H:i:s') . __NAMESPACE__);
    }
}
