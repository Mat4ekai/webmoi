<?php

/**
 * Класс для формирования пользовательского интерфейса.
 *
 * @encoding UTF-8
 * @author   V.Ponomarev <sbnnlab@gmail.com>
 */
class Facade
{
    private $path;
    private $url;

    public static function Run($view, $data, $path, $url)
    {
        $response = self::Execute($view, $data, $path, $url);
        echo($response);
    }

    public static function Execute($view, $data, $path, $url, $method = 'Execute')
    {
        $view = empty($view) ? 'index' : $view;
        $instance = new Facade($path, $url);
        $result = $instance->doExecute($view, $data, $method);
        return $result;
    }

    public function __construct($path, $url)
    {
        $this->path = $path;
        $this->url = $url;
    }

    public function ExecView($view, $data, $method = 'Execute')
    {
        return Facade::Execute($view, $data, $this->getPath(), $this->getUrl(), $method);
    }

    public function GetView($view)
    {
        return $this->loadView($view);
    }

    protected function loadView($view)
    {
        $v_file = $this->path . "/public/" . strtolower(str_replace('.', '/', $view)) . ".php";
        $v_object = null;
        //LogWriter::Log(__METHOD__, LL_INFO, "Trying file " . $v_file);
        if (is_file($v_file)) {
            /** @noinspection PhpIncludeInspection */
            //LogWriter::Log(__METHOD__, LL_INFO, "File found. Including...");
            require_once($v_file);
            $v_class = strtolower(str_replace('.', '_', str_replace('/', '_', $view)) . "_" . "view");
            //LogWriter::Log(__METHOD__, LL_INFO, "File loaded. Check for class " . $v_class);
            if (strpos(strtolower(';' . implode(';', get_declared_classes()) . ";"), $v_class)) {
                //LogWriter::Log(__METHOD__, LL_INFO, "Class found. Creating instance...");
                $v_object = new $v_class();
                //LogWriter::Log(__METHOD__, LL_INFO, "Instance created.");
            }
        } else {
            //LogWriter::Log(__METHOD__, LL_INFO, "File not found");
        }
        return $v_object;
    }

    protected function prepareData($data)
    {
        if (is_array($data)) {
            $ret = array();
            foreach ($data as $k => $v) {
                $k = strval($k);
                $p = explode(".", $k);
                if (sizeof($p) == 1)
                    $ret[$p[0]] = $v;
                else {
                    $fk = $p[0];
                    unset($p[0]);
                    $sk = implode(".", $p);
                    if (!isset($ret[$fk]))
                        $ret[$fk] = array();
                    $ret[$fk] = $ret[$fk] + $this->prepareData(array($sk => $v));
                }
            }
            return $ret;
        } else {
            return $data;
        }
    }

    protected function doExecute($view, $data, $method)
    {
        LogWriter::Log(__METHOD__, LL_INFO, "Execute view: " . $view . "::" . $method);
        $v_object = $this->loadView($view);
        if (!is_object($v_object)) {
            $v_object = $this->loadView($view . ".index");
            if (!is_object($v_object)) {
                $vi = explode("_", str_replace('.', '_', str_replace('/', '_', $view)));
                $last = array_pop($vi);

                if (strval($last) == strval(intval($last))) {
                    $v_object = $this->loadView(implode(".", $vi) . ".id");
                    if(is_object($v_object))
                        $data['id'] = intval($last);
                }

                if(!is_object($v_object)) {
                    $v_object = $this->loadView(implode(".", $vi) . ".handler");
                    if(is_object($v_object))
                        $data['id'] = $last;
                }
            }
        }
        if (!is_object($v_object)) {
            LogWriter::Log(__METHOD__, LL_INFO, "Creating default view");
            $v_object = new FacadeDefaultView();
            $v_object->RequestedView = str_replace('.', '_', str_replace('/', '_', $view));
        }
        LogWriter::Log(__METHOD__, LL_INFO, "Executing method " . $method);
        return $v_object->$method($this, $this->prepareData($data));
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function ErrorPage(Exception $e) {
        if(PRODUCTION) {
            if(is_subclass_of($e, 'ClientException')) {
                $msg = $e->getMessage();
            } else {
                $msg = "При обработке запроса произошла непредвиденная ошибка сервера. Скорее всего, мы уже работаем над ее устранением. Повторите запрос через несколько минут";
            }
        } else {
            $msg = $e->getMessage()."<br/><pre>".$e->getTraceAsString()."</pre>";
        }
        $t = new Template($this, "error", null);
        $t->Set("message", $msg);
        return $t->Execute();
    }

    public function ErrorJson(Exception $e)
    {
        if(PRODUCTION) {
            if(is_subclass_of($e, 'ClientException')) {
                $msg = $e->getMessage();
            } else {
                $msg = "При обработке запроса произошла непредвиденная ошибка сервера. Скорее всего, мы уже работаем над ее устранением. Повторите запрос через несколько минут";
            }
        } else {
            $msg = $e->getMessage().PHP_EOL.$e->getTraceAsString();
        }
        return JsonResponse::Error($msg);
    }
}

class FacadeView
{
    protected function ProcessRequestAction(Facade $facade, $data, $default)
    {
        $action = Utils::Request("action", $default);
        if (!empty($action) && is_callable(array($this, $action))) {
            return call_user_func_array(array($this, $action), array($facade, $data));
        }
        return null;
    }

    public function RenderHead(Facade $facade, $data)
    {
        return $this->CreateTemplate($facade, $data)
            ->Execute();
    }

    public function RenderTail(Facade $facade, $data)
    {
        return $this->CreateTemplate($facade, $data)
            ->Execute();
    }

    public function Render(Facade $facade, $data)
    {
        if (Utils::ArrayGet("__component_part", $data) == "end") {
            return $this->RenderTail($facade, $data);
        } else {
            return $this->RenderHead($facade, $data);
        }
    }

    public function Execute(Facade $facade, $data)
    {
        return $this->ProcessRequestAction($facade, $data, "Render");
    }

    /**
     * @return Template
     */
    public function CreateTemplate(Facade $facade, $data, $template_name = null)
    {
        if ($template_name == null) {
            $name = strtolower(get_class($this));
            $items = explode("_", $name);
            $items[sizeof($items) - 1] = '';
            $template_name = trim(implode('.', $items), '.');
        }
        return new Template($facade, $template_name, $data);
    }
}

class FacadePage extends FacadeView
{

}

class FacadeDefaultView extends FacadeView
{
    public $RequestedView;

    public function Execute(Facade $facade, $data)
    {
        return $this->CreateTemplate($facade, $data, $this->RequestedView)->Execute();
    }
}
